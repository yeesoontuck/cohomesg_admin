<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::orderBy('id')->get();

        return view('districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('districts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        return view('districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
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
        $district->delete();

        return redirect()->route('districts.index')->with('toast', [
            'type' => 'warning',
            'message' => 'District deleted successfully.'
        ]);
    }
}
