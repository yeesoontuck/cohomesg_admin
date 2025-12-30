<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Role::class);

        $roles = Role::orderBy('key')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Role::class);

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Role::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'key' => 'required|string|max:50|unique:roles,key',
            'description' => 'nullable|string',
        ]);

        $role = new Role();
        $role->name = $validated['name'];
        $role->key = $validated['key'];
        $role->description = $validated['description'] ?? null;
        $role->save();

        return to_route('roles.index')->with('toast', [
            'type' => 'success',
            'message' => 'Role created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        Gate::authorize('view', $role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('update', $role);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('update', $role);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'key' => 'required|string|max:50|unique:roles,key,' . $role->id,
            'description' => 'nullable|string',
        ]);

        $role->update($validated);

        return to_route('roles.index')->with('toast', [
            'type' => 'success',
            'message' => 'Role updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('delete', $role);
    }


    public function permissions(Role $role)
    {
        Gate::authorize('update', $role);

        $permissions = Permission::orderBy('key')->get();

        $role_mapped_permissions = $role->permissions->pluck('key', 'id')->toArray();

        return view('roles.permissions', compact('role', 'role_mapped_permissions', 'permissions'));
    }

    public function sync_permissions(Request $request, Role $role)
    {
        Gate::authorize('update', $role);

        /*
            {
            "1": "on",
            "2": "on",
            "3": "on",
            "4": "on",
            "5": "on",
            "6": "on",
            "7": "on",
            "8": "on",
            "13": "on",
            "_token": "YguCGnOZzCgwbWQzrwneGg8rAbe4F6S8IA8g6t10",
            "_method": "PUT"
            }
        */
        
        $permission_ids = array_keys($request->except(['_token', '_method']));

        $role->syncPermissions($permission_ids);

        return to_route('roles.index')->with('toast', [
            'type' => 'success',
            'message' => 'Permissions updated successfully.'
        ]);
    }
}
