<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
 
class ProfileController extends Controller
{
    public function my_profile()
    {
        $user = auth()->user();
        $user->load('role');

        return view('profile.my_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('profile.my_profile')->with('toast', [
            'type' => 'success',
            'message' => 'Profile updated successfully.'
        ]);
    }

    public function password()
    {
        $user = auth()->user();
        $user->load('role');

        return view('profile.password', compact('user'));
    }

    public function update_password(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string',  Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        // if (!Hash::check($validated['current_password'], $user->password)) {
        //     return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        // }
        if (!Hash::check($validated['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Current password is incorrect.'],
            ]);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return to_route('profile.update_password')->with('toast', [
            'type' => 'success',
            'message' => 'Password updated successfully.'
        ]);
    }

    public function two_factor()
    {
        $user = auth()->user();
        $user->load('role');

        return view('profile.two-factor', compact('user'));
    }
}
