<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PostalLatLon extends Model
{
    protected $table = 'postal_lat_lon';

    /**
     * Scope a query to perform FULLTEXT search on street_name, with LIKE fallback.
     */
    public function scopeSearchStreet(Builder $query, string $term): Builder
    {
        // Trim and sanitize the input term
        $term = trim($term);
        if ($term === '') {
            return $query;
        }

        // Use fulltext search first
        $fulltextQuery = static::selectRaw(
            "*, MATCH(street_name) AGAINST(? IN NATURAL LANGUAGE MODE) AS relevance",
            [$term]
        )->whereRaw("MATCH(street_name) AGAINST(? IN NATURAL LANGUAGE MODE)", [$term])
         ->orderByDesc('relevance');

        // Run the query once to test if FULLTEXT found any results
        $results = $fulltextQuery->limit(5)->get();

        if ($results->isNotEmpty()) {
            // Return the original fulltext builder (so caller can chain paginate(), etc.)
            return $query->whereRaw("MATCH(street_name) AGAINST(? IN NATURAL LANGUAGE MODE)", [$term])
                         ->selectRaw("*, MATCH(street_name) AGAINST(? IN NATURAL LANGUAGE MODE) AS relevance", [$term])
                         ->orderByDesc('relevance');
        }

        // Fallback to slower LIKE match (case-insensitive)
        return $query->where('street_name', 'LIKE', "%{$term}%");
    }
}
