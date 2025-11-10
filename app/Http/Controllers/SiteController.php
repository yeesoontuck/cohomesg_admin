<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Room;

class SiteController extends Controller
{
    public function index(Request $request, ?Property $property = null)
    {
        $properties = Property::orderBy('sort_order')->get();

        if (! $property) $property = Property::where('sort_order', 1)->first();

        $rooms = Room::with('property')
        ->where('property_id', $property->id)
        ->orderBy('room_number')
        ->take(3)
        ->get();

        return view('site.index', [
            'properties' => $properties,
            'current_property' => $property,
            'rooms' => $rooms
        ]);
    }

    public function whatiscoliving()
    {
        return view('site.what-is-co-living');
    }

    public function aboutus()
    {
        return view('site.about-us');
    }
    
    public function room(Room $room)
    {
        return view('site.about-us', compact('room'));
    }

    public function expats()
    {
        return view('site.expats');
    }

    public function students()
    {
        return view('site.students');
    }

    public function perks()
    {
        return view('site.perks');
    }
    
}
