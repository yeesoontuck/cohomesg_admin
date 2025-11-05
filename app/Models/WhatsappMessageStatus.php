<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappMessageStatus extends Model
{
    protected $table = 'whatsapp_message_statuses';

    public $timestamps = false; // explicit timestamps not used

    protected $fillable = [
        'message_id',
        'status',
        'status_timestamp',
        'error_code',
        'error_message',
    ];

    protected $casts = [
        'status_timestamp' => 'datetime',
    ];

    // Relationships
    public function message()
    {
        return $this->belongsTo(WhatsappMessage::class, 'message_id');
    }
}
