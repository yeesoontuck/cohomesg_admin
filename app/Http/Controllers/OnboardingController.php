<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class OnboardingController extends Controller
{
    public function password()
    {
        return view('onboarding.password');
    }

    public function set_password(Request $request)
    {
        $validated = $request->validate([
            'new_password' => ['required', 'string',  Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        
        $user = auth()->user();
        $user->password = Hash::make($validated['new_password']);
        $user->password_setup_at = now();
        $user->save();

        return redirect()->route('home')->with('toast', [
            'type' => 'success',
            'message' => 'Password set successfully. Welcome aboard!'
        ]);
    }
}
