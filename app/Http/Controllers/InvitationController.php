<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use App\Notifications\InviteUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:invitations,email'
        ],[
            'email.unique' => 'An invitation has already been sent to this email address.'
        ]);

        // 1. Persist the invitation intent
        $invitation = Invitation::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email']
            ]
        );

        $expiration = now()->addHours(24);

        // 2. Generate the temporary signed URL (valid for 24 hours)
        $inviteUrl = URL::temporarySignedRoute(
            'invitations.accept', 
            $expiration,
            ['email' => $request->email]
        );

        // 3. Send Notification
        Notification::route('mail', $request->email)
            ->notify(new InviteUserNotification($inviteUrl, $expiration));

        return to_route('invitations.index')->with('toast', [
            'type' => 'success',
            'message' => 'User invitation sent successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }

    public function accept(Request $request, $email)
    {
        $invitation = Invitation::where('email', $email)
            ->whereNull('used_at')
            ->first();

        if (!$invitation) {
            // abort(403, 'This invitation link has already been used or is invalid.');
            throw new \Illuminate\Routing\Exceptions\InvalidSignatureException();
        }

        // Mark as used immediately to satisfy "one-time use"
        $invitation->update(['used_at' => now()]);

        // Create the user shell
        $user = User::create(
            [
                'name' => $invitation->name,
                'email' => $invitation->email,
                'password' => bcrypt(str()->random(32))
            ]
        );

        auth()->login($user);

        // return redirect()->route('onboarding.password');
    }
}
