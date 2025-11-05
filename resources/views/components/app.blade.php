<!DOCTYPE html>
<html lang="en"
    x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
    :class="{ 'dark': darkMode }"
    x-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-sidebar>
        {{ $slot }}
    </x-sidebar>
</body>
</html>