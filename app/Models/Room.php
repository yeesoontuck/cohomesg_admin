<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use OwenIt\Auditing\Contracts\Auditable;

class Room extends Model implements Auditable
{
    use SoftDeletes;
    use HasSlug;
    use \OwenIt\Auditing\Auditable;
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['property_id', 'room_number'])
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function room_detail()
    {
        return $this->hasOne(RoomDetail::class);
    }
}
