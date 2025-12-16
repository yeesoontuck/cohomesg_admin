<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>

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
            list-style-type: disc;
        }

    </style>
</head>

<body>
    <div id="quill_contents">
        {!! $html !!}
    </div>
</body>

</html>
