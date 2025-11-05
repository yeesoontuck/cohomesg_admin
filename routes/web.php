<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/licence', function () {
    return view('licence');
})->name('licence');

Route::get('/test', function () {
    $properties = App\Models\Property::all();
        return view('test', [
                'properties' => $properties
            ]);
    })->name('test');

// Authenticated routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/users', function () {
        return view('home');
    })->name('users');
    Route::get('/products', function () {
        return view('home');
    })->name('products');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/whatsapp/{user}/show', [App\Http\Controllers\WhatsappMessageController::class, 'show'])->name('whatsapp.show');
    Route::get('/whatsapp/{user}/latest', [App\Http\Controllers\WhatsappMessageController::class, 'latest'])->name('whatsapp.latest');
    Route::get('/whatsapp/media', [App\Http\Controllers\WhatsappMessageController::class, 'load_media'])->name('media.show');

    Route::resource('properties', App\Http\Controllers\PropertyController::class);

    Route::get('openai', [App\Http\Controllers\OpenaiController::class, 'index'])->name('openai.index');
    Route::get('openai/inquiry', [App\Http\Controllers\OpenaiController::class, 'inquiry'])->name('openai.inquiry');

});