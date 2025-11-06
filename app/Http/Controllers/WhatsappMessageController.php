<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\WhatsappUser;
use App\Models\WhatsappMessage;

use App\Classes\WaSender;

class WhatsappMessageController extends Controller
{
    public function index()
    {
        // list all conversations (Users)
    }

    public function show(WhatsappUser $user)
    {
        $messages = WhatsappMessage::where('user_id', $user->id)
            ->orderBy('timestamp', 'asc')
            ->get();
            
        return view('whatsapp', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    /**
     * Send an outbound WhatsApp text message via Meta Graph API
     */
    public function send_text(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|string',
            'text' => 'required|string',
        ]);

        $to = $validated['to'];
        $text = $validated['text'];
        $user = WhatsappUser::firstOrCreate(['phone_number' => $to]);

        $result = (new WaSender())->send_text($user, $to, $text);

        return redirect()->to(route('whatsapp.show', [$user]) . '#whatsapp-form');
    }

    public function send_template(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|string',
            'template_name' => 'required|string',
            'language' => 'required|string',
            'variables' => 'nullable|array',
        ]);


        $to = $validated['to'];
        $templateName = $validated['template_name'];
        $language = $validated['language'];
        $variables = $validated['variables'] ?? [];

        $user = WhatsappUser::firstOrCreate(['phone_number' => $to]);

        $result = (new WaSender())->send_template($user, $to, $templateName, $language, $variables);

        return $result;
    }

    public function send_invoice_rental_template(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|string',
            'invoice_id' => 'required',
        ]);


        $to = $validated['to'];
        $invoice_id = $validated['invoice_id'];

        $user = WhatsappUser::firstOrCreate(['phone_number' => $to]);

        $result = (new WaSender())->send_invoice_rental_template($user, $to, $invoice_id);

        return $result;
    }

    public function send_location(Request $request)
    {
        $validated = $request->validate([
            'to' => 'required|string',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'location_name' => 'string',
            'address' => 'string',
        ]);

        // notes:  if location_name and address are given, Google Maps on the user's phone will ignore the coordinates and just use the name/address to show the location.
        // omit location_name and address to make the pin show the exact coordinates instead.


        $to = $validated['to'];
        $lat = $validated['lat'];
        $lng = $validated['lng'];
        $location_name = $validated['location_name'] ?? null;
        $address = $validated['address'] ?? null;

        $user = WhatsappUser::firstOrCreate(['phone_number' => $to]);

        $result = (new WaSender())->send_location($user, $to, $lat, $lng, $location_name, $address);

        return $result;
    }

    public function latest(WhatsappUser $user)
    {
        $messages = WhatsappMessage::where('user_id', $user->id)
            ->orderBy('timestamp', 'asc')
            ->get();
            
        return view('whatsapp_messages_partial', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function load_media(Request $request)
    {
        $path = storage_path('app/private/' . $request->file);

        if (!file_exists($path)) {
            abort(404);
        }

        // Optional: authorization checks here

        return response()->file($path);
    }

}
