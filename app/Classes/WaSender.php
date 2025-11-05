<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\WhatsappUser;
use App\Models\WhatsappMessage;

class WaSender
{
    protected string $access_token;
    protected string $phone_number_id;
    protected string $api_version;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->access_token = config('services.whatsapp.access_token');
        $this->phone_number_id = config('services.whatsapp.phone_number_id');
        $this->api_version = config('services.whatsapp.api_version', 'v24.0');
    }

    public function send_text($user, $to, $text)
    {
        $url = "https://graph.facebook.com/{$this->api_version}/{$this->phone_number_id}/messages";

        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => [
                'body' => $text,
            ],
        ];

        $response = Http::withToken($this->access_token)
            ->post($url, $payload);

        if ($response->failed()) {
            Log::error('Failed to send WhatsApp message', [
                'to' => $to,
                'response' => $response->json(),
            ]);
            return response()->json([
                'success' => false,
                'error' => $response->json(),
            ], $response->status());
        }

        // Save to database
        if ($response->successful()) {
            $data = $response->json();

            WhatsappMessage::create([
                'user_id' => $user->id,
                'wa_message_id' => $data['messages'][0]['id'] ?? null,
                'direction' => 'outbound',
                'message_type' => 'text',
                'message_content' => $text,
                'message_payload' => $payload,
                'timestamp' => now(),
                'in_24h_window' => true,
            ]);
        }

        return $response;
    }

    public function send_template($user, $to, $template_name, $language, $variables = [])
    {
        $url = "https://graph.facebook.com/{$this->api_version}/{$this->phone_number_id}/messages";

        // Build components dynamically
        $components = [];
        $parameters = [];

        if (!empty($variables)) {
            foreach ($variables as $key => $value) {
                $parameters[] = ['type' => 'text', 'text' => (string) $value];
            }

            $components[] = [
                'type' => 'body',
                'parameters' => $parameters,
            ];
        }

        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => $template_name,
                'language' => ['code' => $language],
                'components' => $components,
            ],
        ];

        $template_text = $this->render_template_body($template_name, $variables);

        $response = Http::withToken($this->access_token)->post($url, $payload);

        Log::info('whatsapp template message sent', [
            'payload' => $payload,
            'response' => $response->json(),
        ]);

        // Save to database
        if ($response->successful()) {
            $data = $response->json();

            WhatsappMessage::create([
                'user_id' => $user->id,
                'wa_message_id' => $data['messages'][0]['id'] ?? null,
                'direction' => 'outbound',
                'message_type' => 'template',
                'message_content' => $template_text,
                'message_payload' => $payload,
                'timestamp' => now(),
                'in_24h_window' => true,
            ]);
        } else {
            Log::error('Failed to send WhatsApp template', [
                'response' => $response->json(),
            ]);
        }

        return $response;
    }

    protected function render_template_body($template_name, $variables)
    {
        // Try to fetch the stored template body (if available)
        $template = \App\Models\WhatsappTemplate::where('name', $template_name)->first();

        if ($template && !empty($template->body_text)) {
            $text = $template->body_text;
        } else {
            // Fallback placeholder if template not stored locally
            $text = 'Template: ' . $template_name;
        }

        // Replace numbered placeholders {{1}}, {{2}}, etc.
        foreach ($variables as $i => $value) {
            $placeholder = '{{' . ($i + 1) . '}}';
            $text = str_replace($placeholder, $value, $text);
        }

        return $text;
    }

    public function send_location($user, $to, $lat, $lng, $location_name = null, $address = null)
    {
        $url = "https://graph.facebook.com/{$this->api_version}/{$this->phone_number_id}/messages";

        $payload = [
            'messaging_product' => 'whatsapp',
            "recipient_type" => "individual",
            'to' => $to,
            'type' => 'location',
            'location' => [
                "latitude" => $lat,
                "longitude" => $lng
            ],
        ];

        if (!is_null($location_name)) {
            $payload["location"]["name"] = $location_name;
        }
        if (!is_null($address)) {
            $payload["location"]["address"] = $address;
        }


        $response = Http::withToken($this->access_token)->post($url, $payload);

        Log::info('whatsapp location message sent', [
            'payload' => $payload,
            'response' => $response->json(),
        ]);

        // Save to database
        if ($response->successful()) {
            $data = $response->json();

            WhatsappMessage::create([
                'user_id' => $user->id,
                'wa_message_id' => $data['messages'][0]['id'] ?? null,
                'direction' => 'outbound',
                'message_type' => 'location',
                'message_content' => $lat ."\n". $lng ."\n". $location_name ."\n". $address,
                'message_payload' => $payload,
                'timestamp' => now(),
                'in_24h_window' => true,
            ]);
        } else {
            Log::error('Failed to send WhatsApp location', [
                'response' => $response->json(),
            ]);
        }

        return $response;
    }
}
