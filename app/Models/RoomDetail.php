<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    protected function casts(): array
    {
        return [
            'details' => 'array',
        ];
    }

    // one to one relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
