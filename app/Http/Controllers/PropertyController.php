<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\District;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('viewAny', Property::class);

        $properties = Property::with(['district', 'rooms'])->orderBy('sort_order')->get();

        return view('properties.index', compact('properties'));
    }

    public function sort(Request $request)
    {
        // array:1 [ // app/Http/Controllers/PropertyController.php:28
        //     "order" => array:7 [
        //         0 => array:2 [
        //         "id" => "7"
        //         "sort_order" => 1
        //         ]
        //         1 => array:2 [
        //         "id" => "2"
        //         "sort_order" => 2
        //         ]
        //         2 => array:2 [
        //         "id" => "1"
        //         "sort_order" => 3
        //         ]
        //         3 => array:2 [
        //         "id" => "4"
        //         "sort_order" => 4
        //         ]
        //         4 => array:2 [
        //         "id" => "5"
        //         "sort_order" => 5
        //         ]
        //         5 => array:2 [
        //         "id" => "3"
        //         "sort_order" => 6
        //         ]
        //         6 => array:2 [
        //         "id" => "6"
        //         "sort_order" => 7
        //         ]
        //     ]
        // ]
        $validated = $request->validate([
            'order' => 'required|array',
            // 'order.*' => 'numeric',
        ]);
        
        foreach ($validated['order'] as $index => $property) {
            Property::where('id', $property['id'])->update(['sort_order' => $index + 1]);
        }

        return response()->json(['message' => 'Properties sorted successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        Gate::authorize('create', Property::class);

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
        Gate::authorize('create', Property::class);

        $validated = $request->validate([
            'estate_name' => 'required|string|max:255',
            'property_name' => 'required|string|max:255|unique:properties,property_name',
            'district_id' => 'required|numeric',
            'property_type' => 'required|string|max:50',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'map_embed' => 'nullable|string',
        ], [
            'property_name.unique' => 'This property name already exists.',
        ]);

        $max_sort_order = Property::max('sort_order') ?? 0;

        $property = new Property();
        $property->estate_name = $validated['estate_name'];
        $property->property_name = $validated['property_name'];
        $property->district_id = $validated['district_id'];
        $property->property_type = $validated['property_type'];
        $property->address = $validated['address'];

        $property->amenities = [
            'wi-fi' => $request->has('wi-fi'),
            'cleaning' => $request->has('cleaning'),
            'microwave' => $request->has('microwave'),
            'induction' => $request->has('induction'),
            'washer' => $request->has('washer'),
            'dryer' => $request->has('dryer'),
            'refrigerator' => $request->has('refrigerator'),
        ];
        
        $property->latitude = $validated['latitude'];
        $property->longitude = $validated['longitude'];
        $property->sort_order = $max_sort_order + 1;
        $property->map_embed = $validated['map_embed'];
        $property->save();

        return to_route('properties.show', $property)->with('toast', [
            'type' => 'success',
            'message' => 'Property created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        Gate::authorize('view', $property);
        
        $property->load('district');

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        Gate::authorize('update', $property);

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
        Gate::authorize('update', $property);

        $validated = $request->validate([
            'estate_name' => 'required|string|max:255',
            'property_name' => 'required|string|max:255|unique:properties,property_name,' . $property->id,
            'district_id' => 'required|numeric',
            'property_type' => 'required|string|max:50',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'map_embed' => 'nullable|string',
            // 'slug' => 'required|string|max:255|unique:properties,slug,' . $property->id,
        ]);

        $property->estate_name = $validated['estate_name'];
        $property->property_name = $validated['property_name'];
        $property->district_id = $validated['district_id'];
        $property->property_type = $validated['property_type'];
        $property->address = $validated['address'];

        $property->amenities = [
            'wi-fi' => $request->has('wi-fi'),
            'cleaning' => $request->has('cleaning'),
            'microwave' => $request->has('microwave'),
            'induction' => $request->has('induction'),
            'washer' => $request->has('washer'),
            'dryer' => $request->has('dryer'),
            'refrigerator' => $request->has('refrigerator'),
        ];
        
        $property->latitude = $validated['latitude'];
        $property->longitude = $validated['longitude'];
        $property->map_embed = $validated['map_embed'];
        $property->save();

        return to_route('properties.show', $property)->with('toast', [
            'type' => 'success',
            'message' => 'Property updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property) 
    {
        Gate::authorize('delete', $property);

        DB::beginTransaction();
        try {
            // delete rooms and room details
            $property->rooms()->each(function ($room) {
                $room->room_detail()->each(function ($detail) {
                    $detail->delete();
                });
                $room->delete();
            });
    
            $property->delete();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('toast', [
                'type' => 'danger',
                'message' => 'Error deleting property: ' . $th->getMessage()
            ]);
        }

        
        return to_route('properties.index')->with('toast', [
            'type' => 'warning',
            'message' => 'Property deleted successfully.'
        ]);
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
