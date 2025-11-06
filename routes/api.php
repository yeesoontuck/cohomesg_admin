<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappWebhookController;
use App\Http\Controllers\WhatsappMessageController;
use App\Http\Controllers\PropertyController;

Route::get('/whatsapp/webhook', [WhatsappWebhookController::class, 'verify']);
Route::post('/whatsapp/webhook', [WhatsappWebhookController::class, 'handle']);

Route::post('/whatsapp/send', [WhatsappMessageController::class, 'send_text'])->name('whatsapp.send');
Route::post('/whatsapp/send_template', [WhatsappMessageController::class, 'send_template'])->name('whatsapp.send_template');
Route::post('/whatsapp/send_invoice_rental_template', [WhatsappMessageController::class, 'send_invoice_rental_template'])->name('whatsapp.send_invoice_rental_template');
Route::post('/whatsapp/send_location', [WhatsappMessageController::class, 'send_location'])->name('whatsapp.send_location');

Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');