@props([
    'type' => 'success'
])

@php
// https://tailwindcss.com/docs/detecting-classes-in-source-files#dynamic-class-names
// cannot use 'bg-'.$type.'/80'
switch ($type) {
    case 'success':
        $type_class = 'bg-success/80';
        break;
    case 'info':
        $type_class = 'bg-info/80';
        break;
    case 'warning':
        $type_class = 'bg-warning/80';
        break;
    case 'danger':
        $type_class = 'bg-danger/80';
        break;
}    
@endphp



<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-transition.opacity.duration.300ms
    x-init="setTimeout(() => show = false, 3500)"
    class="fixed top-20 right-4 z-200"
>
    <div class="rounded-xl px-6 py-4 shadow-lg text-white font-medium backdrop-blur-sm {{ $type_class }}">
        {{ $slot }}
    </div>
</div>
