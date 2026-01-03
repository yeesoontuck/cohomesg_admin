<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Audit::class);

        $audits = Audit::with('user')->orderBy('created_at', 'desc')->get();
        return view('audits.index', compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($model, $id)
    {
        Gate::authorize('viewAny', Audit::class);

        $model_class = '\\App\\Models\\' . ucfirst($model);

        // does model_class exist?
        if (!class_exists($model_class)) {
            abort(404);
        }

        $model_row = $model_class::findOrFail($id);
        $audits = $model_row->audits()->with('user')->orderBy('created_at', 'desc')->limit(20)->get();
// foreach($audits as $audit)
// {
//     dump($audit->old_values);
// }
// exit;
        return view('audits.show', compact('model', 'audits'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audit $audit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audit $audit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        //
    }
}
