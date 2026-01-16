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
        // We tell the package which fields to use
        ->generateSlugsFrom(function(Room $model) {
            // Access the parent property name and the room number
            return "{$model->property->property_name} {$model->room_number}";
            })
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255)
            ->usingSeparator('-'); // Results in property-name-room-number
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

    public function tenancy_agreements()
    {
        return $this->hasMany(TenancyAgreement::class);
    }
}
