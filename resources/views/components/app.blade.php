<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" :class="{ 'dark': darkMode }" x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body x-cloak>
    <x-sidebar>
        {{ $slot }}
    </x-sidebar>

    @if(! \App::environment('production'))
    <div class="absolute top-5 left-10 md:left-56 z-199 text-red-500 bg-red-100 px-3 py-0.5 rounded-sm border border-red-500 dark:text-red-200 dark:bg-red-900 dark:border-red-200">
        Demo
    </div>
    @endif

    @stack('scripts')
</body>

</html>
