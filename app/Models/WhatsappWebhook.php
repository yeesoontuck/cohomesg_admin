<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappWebhook extends Model
{
    protected $table = 'whatsapp_webhooks';

    public $timestamps = false; // no created_at / updated_at

    protected $fillable = [
        'event_type',
        'object_type',
        'raw_payload',
        'received_at',
        'processed',
    ];

    protected $casts = [
        'raw_payload' => 'array',
        'received_at' => 'datetime',
    ];
}
