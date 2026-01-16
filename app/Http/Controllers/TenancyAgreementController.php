<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentContent;
use App\Models\DocumentVariable;
use App\Models\Room;
use App\Models\TenancyAgreement;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Psy\Util\Str;

class TenancyAgreementController extends Controller
{
    public function pdf(TenancyAgreement $tenancy_agreement)
    {
        $tenancy_agreement->load('room.room_detail', 'room.property');

        // return view('pdf.tenancy_agreement', compact('tenancy_agreement'));
       
        $pdf = Pdf::loadView('pdf.tenancy_agreement', compact('tenancy_agreement'));

        $pdf->getCanvas()->get_cpdf()->setEncryption(null, "adminpassword", ['print']);
        return $pdf->stream('document.pdf');
    }

    public function index()
    {
        $documents = Document::orderBy('name')->get();
        return view('pdf.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation with custom error messages
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'name.required' => 'The document name is required.',
            'content.required' => 'The document content cannot be blank.',
        ]);

        Document::create([
            'template' => 'tenancy_agreement',
            'name' => $validated['name'],
            'contents' => $validated['content'],
        ]);

        return redirect()->route('documents.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $document->load('variables');

        // '[price_month]','[utilities]'
        $variable_string = '';
        foreach($document->variables as $variable) {
            $variable->placeholder = '\'[' . $variable->variable . ']\'';
            $variable_string .= $variable->placeholder . ',';
        }

        return view('pdf.edit', compact('document', 'variable_string'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        // validation with custom error messages
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'name.required' => 'The document name is required.',
            'content.required' => 'The document content cannot be blank.',
        ]);

        $document->name = $validated['name'];
        $document->contents = $validated['content'];
        $document->save();

        return redirect()->route('documents.edit', $document)->with('toast', [
            'type' => 'success',
            'message' => 'Document updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
