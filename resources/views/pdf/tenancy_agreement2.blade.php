<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenancy Agreement</title>

    {{-- dompdf cannot load stylesheets --}}
    {{-- <link rel="stylesheet" href="/quill.snow.css"> --}}

    <style>
        @page {
            margin-left: 2.5cm;
            margin-right: 2cm;
            margin-bottom: 0.5cm;
        }

        body {
            font-family: times, serif;
            font-size: 10pt;
            line-height: 1.2rem;
        }

        /* styles to make Quill.js content display correctly */
        #quill_contents p {}

        #quill_contents strong {}

        #quill_contents em {}

        #quill_contents u {}

        #quill_contents s {}

        #quill_contents h1 {}

        #quill_contents h2 {}

        #quill_contents .ql-align-center {
            text-align: center;
        }

        #quill_contents .ql-align-right {
            text-align: right;}

        #quill_contents .ql-align-justify {
            text-align: justify;
        }

        #quill_contents li[data-list="bullet"] {
            list-style-type: disc !important;
            padding-left:0px;
        }

    </style>
</head>

<body>
    <div>
        @php
            // base64 encode image and set as src for image
            $imagePath = public_path('cropped-cohome-logo-270x270.png');
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
        @endphp
        <img src="{{ $imageSrc }}" alt="" style="width: 1.5cm; float: left;">

        <div style="font-size: 14pt; font-weight: bold; margin-top: 0.5cm; text-align: center;">
            {{ $document->name }}</div>

        <div id="quill_contents" style="margin-top: 1rem;">
        {!! $html !!}
        </div>
    </div>
</body>

</html>
