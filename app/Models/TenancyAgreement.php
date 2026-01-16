<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenancyAgreement extends Model
{
    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
