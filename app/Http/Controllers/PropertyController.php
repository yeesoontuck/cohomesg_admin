<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Property::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return $property;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        
    }

    /**
     * Search properties
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'price_minimum' => 'nullable|numeric|min:0',
            'price_maximum' => 'nullable|numeric|min:0',
            'property_type' => 'nullable|string',
            'room_type' => 'nullable|string'
        ]);

        // $max_distance_km = $request->input('max_distance_km', 20); // default 20 km

        $query = Property::query();

        // filters — only apply if present
        if (!empty($validated['price_minimum']) && !empty($validated['price_maximum'])) {
            $query->whereBetween('price_month', [
                $validated['price_minimum'],
                $validated['price_maximum']
            ]);
        } elseif (!empty($validated['price_minimum'])) {
            $query->where('price_month', '>=', $validated['price_minimum']);
        } elseif (!empty($validated['price_maximum'])) {
            $query->where('price_month', '<=', $validated['price_maximum']);
        }

        // Optional filters
        if (!empty($validated['property_type'])) {
            $query->where('property_type', $validated['property_type']);
        }

        if (!empty($validated['room_type'])) {
            $query->where('room_type', $validated['room_type']);
        }

        // Execute query
        $properties = $query->with('district')->get();

        return response()->json($properties);
    }
}
