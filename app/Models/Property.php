<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
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