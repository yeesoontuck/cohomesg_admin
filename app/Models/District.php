<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['id', 'district_name', 'districts_full'];

    public function properties()
    {
        return $this->hasMany(Property::class, 'district_id');
    }
}
