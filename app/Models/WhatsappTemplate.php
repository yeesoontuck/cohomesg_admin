<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappTemplate extends Model
{
    protected $table = 'whatsapp_templates';

    public $timestamps = false; // only has last_updated_at

    protected $fillable = [
        'name',
        'language',
        'category',
        'status',
        'reason',
        'last_updated_at',
    ];

    protected $casts = [
        'last_updated_at' => 'datetime',
    ];
}
