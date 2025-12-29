<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internal Server Error - 500</title>
    
    @vite(['resources/css/app.css'])

</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center p-8 bg-white shadow-xl rounded-lg border border-gray-200 flex flex-col gap-4">
        <h1 class="text-6xl font-bold text-danger mb-4">500</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Internal Server Error</h2>
        <p class="text-xl font-semibold text-gray-600 mb-6">
            Sorry...<br />
            It's not you.<br />
            It's us.<br />
        </p>

        <small>We're experiencing an internal server problem.</small>

        <a href="{{ url('/') }}" class="inline-block px-6 py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700 transition">
            Go Back Home
        </a>
    </div>
</body>
</html>