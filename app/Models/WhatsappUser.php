<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappUser extends Model
{
    protected $table = 'whatsapp_users';

    public $timestamps = true; // has created_at and updated_at

    protected $fillable = [
        'phone_number',
        'wa_name',
        'profile_pic_url',
        'last_message_at',
    ];

    protected $casts = [
        'last_message_at' => 'datetime',
    ];

    // Relationships
    public function messages()
    {
        return $this->hasMany(WhatsappMessage::class, 'user_id');
    }

    /**
     * Check if free-text messages are allowed (within 24h window)
     */
    public function getIn24hWindowAttribute(): string
    {
        // $u->in_24h_window
        
        if (! $this->last_message_at) {
            return false;
        }

        return $this->last_message_at->diffInHours(now()) <= 24
            ? true
            : false;
    }
}
