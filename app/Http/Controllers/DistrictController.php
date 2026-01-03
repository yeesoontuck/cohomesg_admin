<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', District::class);

        $districts = District::orderBy('id')->get();

        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', District::class);

        // next id
        $next_id = District::max('id') + 1;

        return view('districts.create', compact('next_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', District::class);
        
        // validation
        $validated = $request->validate([
            'id' => 'required|integer|unique:districts,id',
            'district_name' => 'required|string|max:255',
            'districts_full' => 'required|string|max:255',
        ]);

        // create new district
        District::create($validated);

        return redirect()->route('districts.index')->with('toast', [
            'type' => 'success',
            'message' => 'District created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        Gate::authorize('update', $district);
        
        return view('districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        Gate::authorize('update', $district);
        
        // validation
        $validated = $request->validate([
            'id' => 'required|integer|unique:districts,id,' . $district->id,
            'district_name' => 'required|string|max:255',
            'districts_full' => 'required|string|max:255',
        ]);

        // update district
        $district->update($validated);

        return redirect()->route('districts.index')->with('toast', [
            'type' => 'success',
            'message' => 'District updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        Gate::authorize('delete', $district);

        // check if district is associated with any properties
        if ($district->properties()->count() > 0) {
            return redirect()->route('districts.index')->with('toast', [
                'type' => 'danger',
                'message' => 'Cannot delete district ' . $district->id . '. It is associated with existing Properties.'
            ]);
        }

        $district->delete();

        return redirect()->route('districts.index')->with('toast', [
            'type' => 'warning',
            'message' => 'District deleted successfully.'
        ]);
    }
}
