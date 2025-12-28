<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomDetail extends Model
{
    use SoftDeletes;
    
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
