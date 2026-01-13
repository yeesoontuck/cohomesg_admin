<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) return $next($request);

        // Stage 1: Force Password
        if (is_null($user->password_setup_at)) {
            if (!$request->is('onboarding/password*')) {
                return redirect()->route('onboarding.password');
            }
        } 
        
        // Stage 2: Force 2FA
        // elseif (is_null($user->two_factor_confirmed_at)) {
        //     if (!$request->is('onboarding/2fa*')) {
        //         return redirect()->route('onboarding.2fa');
        //     }
        // }

        // Escape Logic: If finished, don't allow access to onboarding
        if ($request->is('onboarding*')) {
            return to_route('home');
        }

        return $next($request);
    }
}
