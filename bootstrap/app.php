<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        
        // Intercept the Invalid Signature Exception
        $exceptions->render(function (InvalidSignatureException $e, Request $request) {
            return response()->view('errors.invitation-invalid', [
                'message' => 'This invitation link has expired or is invalid. Please contact your administrator for a new one.'
            ], 403);
        });

    })->create();
