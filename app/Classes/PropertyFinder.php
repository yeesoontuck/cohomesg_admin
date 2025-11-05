<?php

namespace App\Classes;

use App\Models\PostalLatLon;
use App\Models\Property;

use Illuminate\Support\Facades\Log;

class PropertyFinder
{
    /**
     * Find rental properties near a postal code.
     *
     * @param string|int $postalCode
     * @param int $maxDistanceKm
     * @return array
     */
    public static function findPropertyNearPostalCode($postalCode, $maxDistanceKm = 10): array
    {
        Log::channel('tools')->info('Calling findPropertyNearPostalCode with args: ' . json_encode([$postalCode, $maxDistanceKm]));

        $postal = PostalLatLon::where('postal_code', $postalCode)->first();

        if (!$postal) {
            return [
                'success' => false,
                'message' => "Postal code {$postalCode} not found.",
            ];
        }

        $properties = Property::isNear(
            (float) $postal->latitude,
            (float) $postal->longitude,
            $maxDistanceKm
        )->get([
            'id',
            'property_type',
            'room_type',
            'price_month',
            'utilities',
            'address',
            'latitude',
            'longitude',
            'distance',
        ]);

        if ($properties->isEmpty()) {
            return [
                'success' => true,
                'postal_code' => $postalCode,
                'message' => "No properties found within {$maxDistanceKm} km.",
                'results' => [],
            ];
        }

        return [
            'success' => true,
            'postal_code' => $postalCode,
            'latitude' => $postal->latitude,
            'longitude' => $postal->longitude,
            'results' => $properties->map(fn ($p) => [
                'id' => $p->id,
                'property_type' => $p->property_type,
                'room_type' => $p->room_type,
                'monthly_rent' => (float) $p->price_month,
                'utilities' => (float) $p->utilities,
                'address' => $p->address,
                'distance_km' => round($p->distance, 2),
            ])->toArray(),
        ];
    }

    // search by street name, get the first postal code and call findPropertyNearPostalCode
    public static function findPropertyNearStreetName(string $streetName, int $maxDistanceKm = 10): array
    {
        Log::channel('tools')->info('Calling findPropertyNearStreetName with args: ' . json_encode([$streetName, $maxDistanceKm]));

        $postal = PostalLatLon::searchStreet($streetName)->first();

        if (!$postal) {
            return [
                'success' => false,
                'message' => "No postal code found matching street name '{$streetName}'.",
            ];
        }

        Log::channel('tools')->info('Calling findPropertyNearPostalCode with args: ' . json_encode([$postal->postal_code, $maxDistanceKm]));

        return self::findPropertyNearPostalCode($postal->postal_code, $maxDistanceKm);
    }

    public static function search($price_minimum = 0, $price_maximum = 3000, $property_type = 'condominium', $room_type = 'standard room'): string
    {
        Log::channel('tools')->info('Calling search with args: ' . json_encode([$price_minimum, $price_maximum, $property_type, $room_type]));

        // Search properties
        $properties = Property::with('district')
            ->whereBetween('price_month', [
                $price_minimum,
                $price_maximum
            ])
            ->where('property_type', $property_type)
            ->where('room_type', $room_type)
            ->get();

        return $properties;
    }
}
