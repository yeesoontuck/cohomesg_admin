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
        $tenancy_agreement->load('room.room_detail', 'room.property');

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

    public function index()
    {
        $tenancy_agreements = TenancyAgreement::with('room.property')
        ->with('tenant')
        ->orderBy('start_date', 'desc')->get();

        return view('tenancy_agreements.index', compact('tenancy_agreements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $variables = [
            'admin_fee_waived',
            'admin_fee',
            'agreement_date',
            'aircon_cleaning_fee',
            'clear_out_fee',
            'deposit_received_date',
            'deposit',
            'occupiers',
            'payment_mode_id',
            'price_month',
            'terminate_notice_operator',
            'terminate_notice_tenant',
        ];

        $tenants = [
            'name',
            'fin',
            'passport_number',
            'passport_expiry',
            'work_permit_expiry',
            'email',
            'phone',
        ];

        $properties = Property::with(['rooms' => function ($query) {
            $query->orderBy('room_number');
        }])
        ->orderBy('property_name')
        ->get();

        $tenants = Tenant::orderBy('name')->get();

        return view('tenancy_agreements.create', compact('properties', 'tenants', 'variables'));

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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
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
        ], [  ]);

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
        $tenancy_agreement->load('variables');

        // '[price_month]','[utilities]'
        $variable_string = '';
        foreach($tenancy_agreement->variables as $variable) {
            $variable->placeholder = '\'[' . $variable->variable . ']\'';
            $variable_string .= $variable->placeholder . ',';
        }

        return view('pdf.edit', compact('document', 'variable_string'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TenancyAgreement $tenancy_agreement)
    {
        // validation with custom error messages
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'name.required' => 'The document name is required.',
            'content.required' => 'The document content cannot be blank.',
        ]);

        $tenancy_agreement->name = $validated['name'];
        $tenancy_agreement->contents = $validated['content'];
        $tenancy_agreement->save();

        return redirect()->route('documents.edit', $tenancy_agreement)->with('toast', [
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
