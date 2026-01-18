<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('name')->get();

        return view('tenants.index')->with(compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Gate::authorize('create', Tenant::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'fin' => 'required|string|max:255|unique:tenants',
            'passport_number' => 'required|string|max:255|unique:tenants',
            'passport_expiry' => 'required|date',
            'work_permit_expiry' => 'required|date',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
        ], [
            'fin.unique' => 'This FIN already exists.',
            'passport_number.unique' => 'This Passport Number already exists.',
        ]);

        $tenant = new Tenant();
        $tenant->name = $validated['name'];
        $tenant->fin = $validated['fin'];
        $tenant->passport_number = $validated['passport_number'];
        $tenant->passport_expiry = $validated['passport_expiry'];
        $tenant->work_permit_expiry = $validated['work_permit_expiry'];
        $tenant->email = $validated['email'];
        $tenant->phone = $validated['phone'];
        $tenant->save();

        return to_route('tenants.index')->with('toast', [
            'type' => 'success',
            'message' => 'Tenant created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        // Gate::authorize('update', Tenant::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'fin' => [
                'required',
                'string',
                'max:255',
                Rule::unique('tenants')->ignore($tenant)
            ],
            'passport_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('tenants')->ignore($tenant)
            ],
            'passport_expiry' => 'required|date',
            'work_permit_expiry' => 'required|date',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
        ], [
            'fin.unique' => 'This FIN already exists.',
            'passport_number.unique' => 'This Passport Number already exists.',
        ]);

        $tenant->name = $validated['name'];
        $tenant->fin = $validated['fin'];
        $tenant->passport_number = $validated['passport_number'];
        $tenant->passport_expiry = $validated['passport_expiry'];
        $tenant->work_permit_expiry = $validated['work_permit_expiry'];
        $tenant->email = $validated['email'];
        $tenant->phone = $validated['phone'];
        $tenant->save();

        return to_route('tenants.index')->with('toast', [
            'type' => 'success',
            'message' => 'Tenant updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        // Gate::authorize('delete', Tenant::class);
        
        // any on-going or future tenancy agreements
        $today = Carbon::today();
        $tenant->loadCount(['tenancy_agreements' => function (Builder $query) use ($today) {
            $query->where(function (Builder $subQuery) use ($today) {
                $subQuery->where('start_date', '>=', $today) // Future
                        ->orWhere('end_date', '>=', $today); // On-going
            });
        }]);

        if ($tenant->tenancy_agreements_count) {
            return to_route('tenants.edit', $tenant)->with('toast', [
                'type' => 'danger',
                'message' => 'This Tenant has on-going or future tenancy agreements.'
            ]);
        }

        $tenant->delete();

        return to_route('tenants.index')->with('toast', [
            'type' => 'warning',
            'message' => 'Tenant deleted successfully.'
        ]);
    }
}
