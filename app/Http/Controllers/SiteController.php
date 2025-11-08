<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class SiteController extends Controller
{
    public function index()
    {
        $properties = Property::with('district')->where('address', 'like', '486 Sims Ave%')
        ->take(3)->get();

        return view('site.index', compact('properties'));
    }

    public function whatiscoliving()
    {
        return view('site.what-is-co-living');
    }

    public function aboutus()
    {
        return view('site.about-us');
    }

    public function room(Property $property)
    {
        return view('site.about-us', compact('property'));
    }
}
