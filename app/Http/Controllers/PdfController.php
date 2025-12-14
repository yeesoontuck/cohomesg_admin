<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    /*
    NOTES:
    
    Do not use @vite(['resources/css/app.css', 'resources/js/app.js'])      'font_display' is not a recognized CSS property.
    ---------------------------------
    When using custom fonts, do not stream() after save()
    Unfixed issue. https://github.com/barryvdh/laravel-dompdf/issues/968
    ---------------------------------
    @php
    // base64 encode image and set as src for image
    $imagePath = public_path('cropped-cohome-logo-270x270.png');
    $imageData = base64_encode(file_get_contents($imagePath));
    $imageSrc = 'data:image/png;base64,' . $imageData;
    @endphp
    <img src="{{ $imageSrc }}" alt="">
    ---------------------------------
    config/dompdf.php
        'enable_remote' => true,   // to enable loading of remote assets like fonts, images, css
                                   // not needed if using base64 encoded images
    ---------------------------------

    */
    public function test()
    {
        // if storage/pdf does not exist, create it
        if (! Storage::exists('pdf')) {
            Storage::makeDirectory('pdf');
            /* 
                /storage/app/private/pdf   
            */
        }

        // $districts = District::all();
        // $pdf = Pdf::loadView('pdf.licence_pdf', compact('districts'));

        $pdf = Pdf::loadView('pdf.tenancy_agreement');

        // $pdf->setWarnings(true);

        // return $pdf->download('licence.pdf');
        return $pdf->stream('tenancy_agreement.pdf');
        // $pdf->save(storage_path('app/private/pdf/licence.pdf'));
    }

    public function tenancy_agreement($room_id)
    {
        $room = Room::where('id', $room_id)->with('property')->first();

        $tenant = (object)['name' => 'John Doe', 'fin' => 'T12345678'];

        $data = [
            'room' => $room,
            'tenant' => $tenant,
        ];
        $pdf = Pdf::loadView('pdf.tenancy_agreement', $data);

        return $pdf->stream('tenancy_agreement.pdf');
    }

    // public function downloadPrivateFile($filename)
    // {
    //     // Check if the user is authorized to access this file first
        
    //     $path = storage_path('app/' . $filename);

    //     if (file_exists($path)) {
    //         return response()->download($path); // Forces a download
    //         // return Storage::download($filename); // An alternative using the Storage facade
    //     }
        
    //     abort(404);
    // }
}
