<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappMessage extends Model
{
    protected $table = 'whatsapp_messages';

    public $timestamps = false; // timestamp handled manually

    const CREATED_AT = 'timestamp';
    
    protected $fillable = [
        'wa_message_id',
        'user_id',
        'direction',
        'message_type',
        'message_content',
        'message_payload',
        'mime_type',
        'media_path',
        'timestamp',
        'in_24h_window',
    ];


    protected $casts = [
        'message_payload' => 'array',
        'timestamp' => 'datetime',
        'in_24h_window' => 'boolean',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(WhatsappUser::class, 'user_id');
    }

    public function statuses()
    {
        return $this->hasMany(WhatsappMessageStatus::class, 'message_id');
    }
}
