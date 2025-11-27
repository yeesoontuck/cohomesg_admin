<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Room extends Model
{
    use HasSlug;
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['property_id', 'room_number'])
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
