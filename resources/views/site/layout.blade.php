<!DOCTYPE html>
<html class="scroll-smooth" lang="en" x-data x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://cohomesg.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Co-living Rooms for Rent in Singapore | CohomeSG" />
    <meta property="og:description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta property="og:url" content="https://cohomesg.com/" />
    <meta property="og:site_name" content="Cohome - Co-living Rooms for Rent in Singapore" />
    <meta property="og:updated_time" content="2025-11-07T08:22:00+00:00" />
    <meta property="article:published_time" content="2025-09-06T11:14:16+00:00" />
    <meta property="article:modified_time" content="2025-11-07T08:22:00+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Co-living Rooms for Rent in Singapore | CohomeSG" />
    <meta name="twitter:description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="admin" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="Less than a minute" />

    <link rel="apple-touch-icon" sizes="180x180" href="/web/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/web/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/web/favicon-16x16.png">
    <link rel="manifest" href="/web/site.webmanifest">

    <title>Co-living Rooms for Rent in Singapore | CohomeSG</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @yield('head')

    @vite(['resources/css/web.css', 'resources/js/app.js'])
</head>

<body>
    {{-- top banner --}}
    @include('site.banner')


    {{-- navbar --}}
    @include('site.navbar')


    @yield('content')

    @include('site.whatsapp-button')

    {{-- footer --}}
    @include('site.footer')

    @yield('script')
</body>

</html>