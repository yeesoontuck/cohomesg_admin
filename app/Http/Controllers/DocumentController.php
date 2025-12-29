<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentContent;
use App\Models\DocumentVariable;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Psy\Util\Str;

class DocumentController extends Controller
{
    public function pdf(Document $document)
    {
        $html = $document->contents;

        $data = [
            'price_month' => '1,600.00',
            'utilities' => '80.00',
            'property_name' => 'Serenity Park',
            'room' => 'Room 2'
        ];

        // replace {{key}} in $html with $data['key']
        foreach ($data as $key => $value) {
            $html = str_replace('[' . $key . ']', '<strong>'.$value.'</strong>', $html);
        }

        // return view('pdf.tenancy_agreement2', compact('html'));
       
        // $pdf = Pdf::loadHtml($html);
        $pdf = Pdf::loadView('pdf.tenancy_agreement2', compact('document', 'html'));
        // $pdf = Pdf::loadView('pdf.blank_pdf', compact('html'));
        // $pdf->setWarnings(true);
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
        $variables = DocumentVariable::where('template', 'tenancy_agreement')->get();

        // '[price_month]','[utilities]'
        $variable_string = '';
        foreach($variables as $variable) {
            $variable->placeholder = '\'[' . $variable->variable . ']\'';
            $variable_string .= $variable->placeholder . ',';
        }

        return view('pdf.create', compact('variables', 'variable_string'));
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
