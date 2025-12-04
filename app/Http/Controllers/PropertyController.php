<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    private $property_types = [
        'condominium',
        'shophouse',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with(['district', 'rooms'])->orderBy('sort_order')->get();

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $districts = District::orderBy('id')->get();

        return view('properties.create')
            ->with('districts', $districts)
            ->with('property_types', $this->property_types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'estate_name' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'district_id' => 'required|numeric',
            'property_type' => 'required|string|max:50',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $max_sort_order = Property::max('sort_order') ?? 0;

        $property = new Property();
        $property->estate_name = $validated['estate_name'];
        $property->property_name = $validated['property_name'];
        $property->district_id = $validated['district_id'];
        $property->property_type = $validated['property_type'];
        $property->address = $validated['address'];
        $property->latitude = $validated['latitude'];
        $property->longitude = $validated['longitude'];
        $property->sort_order = $max_sort_order + 1;
        $property->save();

        return redirect()->route('properties.show', $property)->with('success', 'Property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property->load('district');

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $districts = District::orderBy('id')->get();

        return view('properties.edit')->with('districts', $districts)
            ->with('property', $property)
            ->with('property_types', $this->property_types);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'estate_name' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'district_id' => 'required|numeric',
            'property_type' => 'required|string|max:50',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            // 'slug' => 'required|string|max:255|unique:properties,slug,' . $property->id,
        ]);

        $property->estate_name = $validated['estate_name'];
        $property->property_name = $validated['property_name'];
        $property->district_id = $validated['district_id'];
        $property->property_type = $validated['property_type'];
        $property->address = $validated['address'];
        $property->latitude = $validated['latitude'];
        $property->longitude = $validated['longitude'];
        $property->save();

        return redirect()->route('properties.show', $property)->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property) {}

    /**
     * Search properties
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'price_minimum' => 'nullable|numeric|min:0',
            'price_maximum' => 'nullable|numeric|min:0',
            'property_type' => 'nullable|string',
            'room_type' => 'nullable|string',
        ]);

        // $max_distance_km = $request->input('max_distance_km', 20); // default 20 km

        $query = Property::query();

        // filters — only apply if present
        if (! empty($validated['price_minimum']) && ! empty($validated['price_maximum'])) {
            $query->whereBetween('price_month', [
                $validated['price_minimum'],
                $validated['price_maximum'],
            ]);
        } elseif (! empty($validated['price_minimum'])) {
            $query->where('price_month', '>=', $validated['price_minimum']);
        } elseif (! empty($validated['price_maximum'])) {
            $query->where('price_month', '<=', $validated['price_maximum']);
        }

        // Optional filters
        if (! empty($validated['property_type'])) {
            $query->where('property_type', $validated['property_type']);
        }

        if (! empty($validated['room_type'])) {
            $query->where('room_type', $validated['room_type']);
        }

        // Execute query
        $properties = $query->with('district')->get();

        return response()->json($properties);
    }
}
