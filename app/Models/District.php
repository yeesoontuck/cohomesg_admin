<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class District extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = ['id', 'district_name', 'districts_full'];

    public function properties()
    {
        return $this->hasMany(Property::class, 'district_id');
    }
}
