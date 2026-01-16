<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use OwenIt\Auditing\Contracts\Auditable;

class Property extends Model implements Auditable
{
    use SoftDeletes;
    use HasSlug;
    use \OwenIt\Auditing\Auditable;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('property_name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255);
    }

    protected static function booted()
    {
        // When a Property is updated, update slugs for related Rooms if property_name changed
        // https://dev.to/itxshakil/laravel-eloquent-when-to-use-boot-vs-booted-the-final-word-3jde
        static::updated(function ($property) {
            if ($property->isDirty('property_name')) {
                foreach ($property->rooms as $room) {
                    $room->generateSlug(); // Forces a refresh
                    $room->save();
                }
            }
        });
    }

    protected function casts(): array
    {
        return [
            'amenities' => 'array',
        ];
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // relation to District
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function scopeIsNear(Builder $query, float $lat, float $lon, int $maxDistanceKm)
    {
        // App\Models\Property::isNear(1.4021002647730074, 103.75400093235983, 20)->get();

        $earthRadius = 6371; // Earth's mean radius in kilometers

        // Approximate latitude/longitude degrees for the distance
        $maxLat = $lat + rad2deg($maxDistanceKm / $earthRadius);
        $minLat = $lat - rad2deg($maxDistanceKm / $earthRadius);
        $maxLon = $lon + rad2deg($maxDistanceKm / $earthRadius / cos(deg2rad($lat)));
        $minLon = $lon - rad2deg($maxDistanceKm / $earthRadius / cos(deg2rad($lat)));

        // Filter by bounding box first
        $query->whereBetween('latitude', [$minLat, $maxLat])
            ->whereBetween('longitude', [$minLon, $maxLon]);

        // SQL using the Haversine formula
        $haversine = "(
            $earthRadius * acos(
                cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + 
                sin(radians(?)) * sin(radians(latitude))
            )
        )";

        $bindings = [$lat, $lon, $lat]; // Bind parameters for safety

        return $query
            ->selectRaw("*, {$haversine} AS distance", $bindings)
            ->having('distance', '<=', $maxDistanceKm)
            ->orderBy('distance', 'asc');
    }
}