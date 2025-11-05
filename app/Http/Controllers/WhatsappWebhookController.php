<?php

namespace App\Http\Controllers;

use App\Models\WhatsappMessage;
use App\Models\WhatsappMessageStatus;
use App\Models\WhatsappUser;
use App\Models\WhatsappWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Classes\WaSender;
use App\Classes\WaOpenAI;

class WhatsappWebhookController extends Controller
{
    /**
     * Verification callback (for Meta webhook setup)
     */
    public function verify(Request $request)
    {
        $verifyToken = config('services.whatsapp.verify_token');

        if ($request->hub_mode === 'subscribe' && $request->hub_verify_token === $verifyToken) {
            return response($request->hub_challenge, 200);
        }

        return response('Verification failed', 403);
    }

    /**
     * Verify that the webhook payload came from Meta
     */
    protected function verifySignature(Request $request): bool
    {
        $signature = $request->header('X-Hub-Signature-256');

        if (! $signature || ! str_starts_with($signature, 'sha256=')) {
            return false;
        }

        $signatureHash = substr($signature, 7);
        $appSecret = config('services.whatsapp.app_secret');
        $payload = $request->getContent();

        $calculatedHash = hash_hmac('sha256', $payload, $appSecret);

        return hash_equals($calculatedHash, $signatureHash);
    }

    /**
     * Handle incoming webhook events from WhatsApp Cloud API
     */
    public function handle(Request $request)
    {
        if (! $this->verifySignature($request)) {
            Log::warning('Rejected invalid WhatsApp webhook', [
                'ip' => $request->ip(),
                'payload' => $request->getContent(),
            ]);

            return response('Invalid signature', 403);
        }

        $payload = $request->all();

        // Log to database (for debugging/tracking)
        $webhook = WhatsappWebhook::create([
            'event_type' => $payload['entry'][0]['changes'][0]['field'] ?? 'unknown',
            'object_type' => $payload['object'] ?? null,
            'raw_payload' => $payload,
            'received_at' => now(),
            'processed' => false,
        ]);

        try {
            $this->processPayload($payload);
            $webhook->processed = true;
            $webhook->save();
        } catch (\Exception $e) {
            Log::error('Webhook processing failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        return response('EVENT_RECEIVED', 200);
    }

    /**
     * Process the webhook payload by type
     */
    protected function processPayload(array $payload)
    {
        if (! isset($payload['entry'][0]['changes'][0]['value'])) {
            return;
        }

        $value = $payload['entry'][0]['changes'][0]['value'];

        // Handle messages
        if (isset($value['messages'])) {
            foreach ($value['messages'] as $msg) {
                $from = $msg['from'];
                $waid = $msg['id'];
                $type = $msg['type'];
                $content = $this->extractMessageContent($msg);

                $user = WhatsappUser::firstOrCreate(
                    ['phone_number' => $from],
                    ['wa_name' => $value['contacts'][0]['profile']['name'] ?? null]
                );

                $message = WhatsappMessage::updateOrCreate(
                    ['wa_message_id' => $waid],
                    [
                        'user_id' => $user->id,
                        'direction' => 'inbound',
                        'message_type' => $type,
                        'message_content' => $content,
                        'message_payload' => $msg,
                        'timestamp' => now(),
                        'in_24h_window' => true,
                    ]
                );

                if(in_array($type, ['image', 'audio', 'video', 'document', 'sticker'], true) && isset($msg[$type]['id'])) {
                    $this->handle_media_message($msg, $message);
                }

                $user->update(['last_message_at' => now()]);

                // Mark the message as read immediately
                $this->markMessageAsRead($waid);

                // send to LLM for processing
                $this->send_to_llm($message);
            }
        }

        // Handle statuses
        if (isset($value['statuses'])) {
            foreach ($value['statuses'] as $status) {
                $waMessageId = $status['id'];
                $message = WhatsappMessage::where('wa_message_id', $waMessageId)->first();

                if ($message) {
                    WhatsappMessageStatus::create([
                        'message_id' => $message->id,
                        'status' => $status['status'],
                        'status_timestamp' => now(),
                        'error_code' => $status['errors'][0]['code'] ?? null,
                        'error_message' => $status['errors'][0]['title'] ?? null,
                    ]);
                }
            }
        }
    }

    /**
     * Extract message content based on message type
     */
    protected function extractMessageContent(array $msg)
    {
        $type = $msg['type'];

        return match ($type) {
            'text' => $msg['text']['body'] ?? null,
            'image' => $msg['image']['caption'] ?? '[image]',
            'audio' => '[audio message]',
            'video' => $msg['video']['caption'] ?? '[video]',
            'document' => $msg['document']['filename'] ?? '[document]',
            'location' => json_encode($msg['location']),
            'button' => $msg['button']['text'] ?? '[button reply]',
            'interactive' => $msg['interactive']['button_reply']['title']
                ?? $msg['interactive']['list_reply']['title']
                ?? '[interactive reply]',
            default => '[unknown type]',
        };
    }

    protected function markMessageAsRead(string $waMessageId)
    {
        $accessToken = config('services.whatsapp.access_token');
        $phoneNumberId = config('services.whatsapp.phone_number_id');
        $apiVersion = config('services.whatsapp.api_version');

        $url = "https://graph.facebook.com/{$apiVersion}/{$phoneNumberId}/messages";

        $payload = [
            'messaging_product' => 'whatsapp',
            'status' => 'read',
            'message_id' => $waMessageId,
            'typing_indicator' => [
                'type' => 'text'
            ]
        ];

        $response = Http::withToken($accessToken)
            ->post($url, $payload);

        if ($response->failed()) {
            Log::error('Failed to mark WhatsApp message as read', [
                'wa_message_id' => $waMessageId,
                'response' => $response->json(),
            ]);
        }

        return $response->successful();
    }

    /**
     * Handle and store any type of WhatsApp media message.
     */
    protected function handle_media_message(array $msg, WhatsappMessage $message): void
    {
        // Detect which media type exists in the message payload
        $media_types = ['image', 'audio', 'video', 'document', 'sticker'];
        $media_key = collect($media_types)->first(fn($type) => isset($msg[$type]));

        if (!$media_key) {
            Log::warning('Unknown media type in message', ['message' => $msg]);
            return;
        }

        $media_id = $msg[$media_key]['id'];
        $mime_type = $msg[$media_key]['mime_type'] ?? 'application/octet-stream';

        $extension_map = [
            'audio/ogg' => 'ogg',
            'audio/mpeg' => 'mp3',
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'video/mp4' => 'mp4',
            'application/pdf' => 'pdf',
        ];

        $clean_mime = explode(';', $mime_type)[0];
        $extension = $extension_map[$clean_mime] ?? explode('/', $clean_mime)[1] ?? 'bin';

        $access_token = config('services.whatsapp.access_token');
        $api_version = config('services.whatsapp.api_version');

        try {
            // Step 1: Get the media download URL
            $media_response = Http::withToken($access_token)
                ->get("https://graph.facebook.com/{$api_version}/{$media_id}")
                ->throw()
                ->json();

            $download_url = $media_response['url'];

            // Step 2: Download the media file
            $file_response = Http::withToken($access_token)->get($download_url);

            if ($file_response->failed()) {
                Log::warning("Failed to download WhatsApp media {$media_id}", [
                    'response' => $file_response->json(),
                ]);
                return;
            }

            $file_data = $file_response->body();

            // Step 3: Build storage path
            $user_folder = "whatsapp/{$message->user->phone_number}";
            $filename = now()->format('Ymd_His') . "_{$media_id}.{$extension}";
            $path = "{$user_folder}/{$filename}";

            // Step 4: Save file (in storage/app/private/)
            Storage::put($path, $file_data);

            // Step 5: Update message record
            $message->update([
                'mime_type'  => $mime_type,
                'media_path' => $path,
            ]);

            Log::info("Saved WhatsApp {$media_key} message", [
                'message_id' => $message->wa_message_id,
                'path'       => $path,
                'mime_type'  => $mime_type,
            ]);

        } catch (\Exception $e) {
            Log::error('Error handling WhatsApp media', [
                'error'   => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'payload' => $msg,
            ]);
        }
    }

    public function send_to_llm(WhatsappMessage $message)
    {
        // === Python version ===
        // $response = Http::post('http://127.0.0.1:8000/process_query', [
        //     'user_id' => $message->user_id,
        //     'user_message' => $message->message_content,
        //     'recent_messages' => [],
        //     'recent_messages' => $message->user->messages()->latest()->take(5)->get(['direction','message_content'])->map(function($m){
        //         return [
        //             'role' => $m->direction === 'inbound' ? 'user' : 'assistant',
        //             'content' => $m->message_content
        //         ];
        //     })->toArray(),
        // ]);

        // $reply = $response->json()['text'];
        // === Python version ===

        
        
        
        // === PHP version ===
        $recent_messages = $message->user->messages()->latest()->take(5)->get(['direction','message_content'])->map(function($m){
            return [
                'role' => $m->direction === 'inbound' ? 'user' : 'assistant',
                'content' => $m->message_content
            ];
        })->toArray();
        
        // Log::info($recent_messages);
        
        $reply = (new WaOpenAI())->chat($message->message_content, $recent_messages);
        // === PHP version ===
        
        
        // Send back to user via WhatsApp Cloud API
        (new WaSender())->send_text($message->user, $message->user->phone_number, $reply);
        return $reply;
    }
}
