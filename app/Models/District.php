<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id', 'district_name', 'districts_full'];

    public function properties()
    {
        return $this->hasMany(Property::class, 'district_id');
    }
}
