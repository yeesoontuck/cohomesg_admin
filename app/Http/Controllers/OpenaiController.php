<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\WaOpenAI;

class OpenaiController extends Controller
{
    /*
     * https://github.com/openai-php/laravel
     * composer require openai-php/laravel
     * php artisan openai:install
     * config/openai.php
     */

    public function __construct()
    {
        // 
    }

    public function index(Request $request)
    {
        return (new WaOpenAI())->chat();
    }

    public function inquiry(Request $request)
    {
        $message = $request->input('message');

        return (new WaOpenAI())->chat($message);
    }
}
