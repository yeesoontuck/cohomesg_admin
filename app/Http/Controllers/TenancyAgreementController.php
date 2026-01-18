<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\TenancyAgreement;
use App\Models\Tenant;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class TenancyAgreementController extends Controller
{
    public function pdf(TenancyAgreement $tenancy_agreement)
    {
        $tenancy_agreement->load([
            'room.room_detail',
            'room.property',
            'tenant' => function ($query) {
                $query->withTrashed();
            }]
        );

        // term of tenancy
        $start = $tenancy_agreement->start_date;    // Carbon
        $end = $tenancy_agreement->end_date;    // Carbon
        $diff = $start->diff($end->copy()->addDay());
        $parts = [];
        if ($diff->y > 0) $parts[] = $diff->y . ' ' . str('Year')->plural($diff->y);
        if ($diff->m > 0) $parts[] = $diff->m . ' ' . str('Month')->plural($diff->m);
        if ($diff->d > 0) $parts[] = $diff->d . ' ' . str('Day')->plural($diff->d);
        $term_of_tenancy = empty($parts) ? '0 Days' : implode(', ', $parts);
        $tenancy_agreement->term_of_tenancy = $term_of_tenancy;


        // return view('pdf.tenancy_agreement', compact('tenancy_agreement'));
       
        $pdf = Pdf::loadView('tenancy_agreements.pdf', compact('tenancy_agreement'));

        $pdf->getCanvas()->get_cpdf()->setEncryption(null, "adminpassword", ['print', 'copy']);
        return $pdf->stream('document.pdf');
    }

    public function index(Request $request)
    {
        $query = TenancyAgreement::with([
            'room.property',
            'tenant' => function ($query) {
                $query->withTrashed();
            }
        ])
        ->orderBy('start_date', 'desc');
        
        $query->when($request->filled('tenant_id'), function ($q) use ($request) {
            return $q->where('tenant_id', $request->tenant_id);
        } );

        $tenancy_agreements = $query->get();

        $tenant = $request->filled('tenant_id') 
            ? Tenant::findOrFail($request->tenant_id)
            : null;
            
        return view('tenancy_agreements.index', compact('tenancy_agreements', 'tenant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $properties = Property::with(['rooms' => function ($query) {
            $query->orderBy('room_number');
        }])
        ->orderBy('property_name')
        ->get();

        $tenants = Tenant::orderBy('name')->get();

        return view('tenancy_agreements.create', compact('properties', 'tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // "room_id" => "17"
        // "agreement_date" => "2026-01-08"
        // "tenant_id" => "1"
        // "start_date" => "2026-01-08"
        // "end_date" => "2026-07-07"
        
        
        // validation with custom error messages
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'admin_fee_waived' => 'nullable',
            'admin_fee' => '',
            'agreement_date' => 'required|date',
            'aircon_cleaning_fee' => '',
            'clear_out_fee' => '',
            'deposit_received_date' => 'nullable|date',
            'deposit' => '',
            'occupiers' => 'nullable|array',
            'payment_mode_id' => 'required',
            'price_month' => '',
            'terminate_notice_operator' => '',
            'terminate_notice_tenant' => '',
        ], [ 
            'start_date.before_or_equal' => 'Start date cannot be later than End date',
            'end_date.after_or_equal' => 'End date cannnot be earlier than Start date',
         ]);

        // read Room details
        $room = Room::findOrFail($validated['room_id']);

        $tenancy_agreement = new TenancyAgreement;
        $tenancy_agreement->room_id = $validated['room_id'];
        $tenancy_agreement->data = [
            'agreement_date' => $validated['agreement_date'],
            'price_month' => $room->price_month,
            'deposit' => $validated['deposit'],
            'deposit_received_date' => $validated['deposit_received_date'] ??  null,
            'payment_mode_id' => $validated['payment_mode_id'],
            'admin_fee' => $validated['admin_fee'],
            'admin_fee_waived' => $request->has('admin_fee_waived'),
            'clear_out_fee' => $validated['clear_out_fee'],
            'aircon_cleaning_fee' => $validated['aircon_cleaning_fee'],
            'terminate_notice_operator' => $validated['terminate_notice_operator'],
            'terminate_notice_tenant' => $validated['terminate_notice_tenant'],
        ];
        $tenancy_agreement->tenant_id = $validated['tenant_id'];
        $tenancy_agreement->start_date = $validated['start_date'];
        $tenancy_agreement->end_date = $validated['end_date'];

        $tenancy_agreement->save();

        return redirect()->route('tenancy_agreements.index')->with('toast', [
            'type' => 'success',
            'message' => 'Document created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TenancyAgreement $tenancy_agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TenancyAgreement $tenancy_agreement)
    {
        // if ended, cannot edit
        if ($tenancy_agreement->current_status == 'ended') {
            return back()->with('toast', [
                'type' => 'danger',
                'message' => 'This Tenancy Agreement cannot be edited.'
            ]);
        }

        $tenancy_agreement->load('room', 'tenant');

        $properties = Property::with(['rooms' => function ($query) {
            $query->orderBy('room_number');
        }])
        ->orderBy('property_name')
        ->get();

        $tenants = Tenant::orderBy('name')->get();

        return view('tenancy_agreements.edit', compact('tenancy_agreement', 'properties', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TenancyAgreement $tenancy_agreement)
    {
        // if ended, cannot edit
        if ($tenancy_agreement->current_status == 'ended') {
            return back()->with('toast', [
                'type' => 'danger',
                'message' => 'This Tenancy Agreement cannot be edited.'
            ]);
        }

        // validation with custom error messages
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'admin_fee_waived' => 'nullable',
            'admin_fee' => '',
            'agreement_date' => 'required|date',
            'aircon_cleaning_fee' => '',
            'clear_out_fee' => '',
            'deposit_received_date' => 'nullable|date',
            'deposit' => '',
            'occupiers' => 'nullable|array',
            'payment_mode_id' => 'required',
            'price_month' => '',
            'terminate_notice_operator' => '',
            'terminate_notice_tenant' => '',
        ], [ 
            'start_date.before_or_equal' => 'Start date cannot be later than End date',
            'end_date.after_or_equal' => 'End date cannnot be earlier than Start date',
        ]);

        // read Room details
        $room = Room::findOrFail($validated['room_id']);

        $tenancy_agreement->room_id = $validated['room_id'];
        $tenancy_agreement->data = [
            'agreement_date' => $validated['agreement_date'],
            'price_month' => $room->price_month,
            'deposit' => $validated['deposit'],
            'deposit_received_date' => $validated['deposit_received_date'] ??  null,
            'payment_mode_id' => $validated['payment_mode_id'],
            'admin_fee' => $validated['admin_fee'],
            'admin_fee_waived' => $request->has('admin_fee_waived'),
            'clear_out_fee' => $validated['clear_out_fee'],
            'aircon_cleaning_fee' => $validated['aircon_cleaning_fee'],
            'terminate_notice_operator' => $validated['terminate_notice_operator'],
            'terminate_notice_tenant' => $validated['terminate_notice_tenant'],
        ];
        $tenancy_agreement->tenant_id = $validated['tenant_id'];
        $tenancy_agreement->start_date = $validated['start_date'];
        $tenancy_agreement->end_date = $validated['end_date'];

        $tenancy_agreement->save();

        return redirect()->route('tenancy_agreements.index')->with('toast', [
            'type' => 'success',
            'message' => 'Document updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TenancyAgreement $tenancy_agreement)
    {
        //
    }
}
