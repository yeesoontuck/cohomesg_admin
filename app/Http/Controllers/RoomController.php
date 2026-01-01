<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\RoomDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    private $room_types = [
        'budget single' => 'Budget Single Room',
        'master' => 'Master Room',
        'premium large' => 'Premium Large Room',
        'premium single' => 'Premium Single Room',
        'standard' => 'Standard Room',
        'twin sharing' => 'Twin Sharing Room',
    ];

    private $bed_types = [
        'single' => 'Single Bed',
        'queen' => 'Queen Bed',
        'king' => 'King Bed',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Property $property)
    {
        Gate::authorize('viewAny', Property::class);

        $property->load('district');
        $rooms = Room::with('room_detail')->where('property_id', $property->id)->orderBy('room_number')->get();
        
        return view('rooms.index', compact('property', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Property $property)
    {
        Gate::authorize('create', Property::class);

        return view('rooms.create')->with([
            'property' => $property,
            'room_types' => $this->room_types,
            'bed_types' => $this->bed_types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Property $property)
    {
        Gate::authorize('create', Property::class);
        
        $validated = $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|in:' . implode(',', array_keys($this->room_types)),
            'bed_type' => 'required|string|in:' . implode(',', array_keys($this->bed_types)),
            'price_month' => 'required|numeric|min:0',
            'utilities' => 'required|numeric|min:0',
        ]);

        $room = new Room();
        $room->property_id = $property->id;
        $room->room_number = $validated['room_number'];
        $room->price_month = $validated['price_month'];
        $room->utilities = $validated['utilities'];
        $room->save();

        $room_detail = new RoomDetail();
        $room_detail->room_id = $room->id;
        $room_detail->details = [
            'room' => $validated['room_type'],
            'bed' => $validated['bed_type'],
            'wi-fi' => $request->has('wi-fi'),
            'aircon' => $request->has('aircon'),
            'window' => $request->has('window'),
            'cleaning' => $request->has('cleaning'),
            'furnishings' => $request->has('furnishings'),
        ];
        $room_detail->save();


        return to_route('rooms.index', $property)->with('toast', [
            'type' => 'success',
            'message' => 'Room created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property, Room $room)
    {
        Gate::authorize('update', Property::class);
        
        $room->load('room_detail');

        return view('rooms.edit')->with([
            'property' => $property,
            'room' => $room,
            'room_types' => $this->room_types,
            'bed_types' => $this->bed_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property, Room $room)
    {
        Gate::authorize('update', Property::class);
        
        $validated = $request->validate([
            'room_number' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:rooms,slug,' . $room->id,
            'room_type' => 'required|string|in:' . implode(',', array_keys($this->room_types)),
            'bed_type' => 'required|string|in:' . implode(',', array_keys($this->bed_types)),
            'price_month' => 'required|numeric|min:0',
            'utilities' => 'required|numeric|min:0',
        ]);

        $room_detail = $room->room_detail;
        $room_detail->details = [
            'room' => $validated['room_type'],
            'bed' => $validated['bed_type'],
            'wi-fi' => $request->has('wi-fi'),
            'aircon' => $request->has('aircon'),
            'window' => $request->has('window'),
            'cleaning' => $request->has('cleaning'),
            'furnishings' => $request->has('furnishings'),
        ];
        $room_detail->save();

        $room->room_number = $validated['room_number'];
        $room->slug = $validated['slug'];
        $room->price_month = $validated['price_month'];
        $room->utilities = $validated['utilities'];
        $room->save();

        return to_route('rooms.index', $property)->with('toast', [
            'type' => 'success',
            'message' => 'Room updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property, Room $room)
    {
        Gate::authorize('delete', Property::class);
        
        $room->delete();

        return to_route('rooms.index', $property)->with('toast', [
            'type' => 'warning',
            'message' => 'Room deleted successfully.'
        ]);
    }


    public function audit_history(Property $property, Room $room)
    {
        // Gate::authorize('viewAny', Property::class);

        $audits = $room->audits()->with('user')->orderBy('created_at', 'desc')->get();

        return view('rooms.audit_history', compact('property', 'room', 'audits'));
    }
}
