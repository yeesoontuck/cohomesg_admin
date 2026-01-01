@props([
    'text' => '',
    'position' => 'top',
    'underline' => false,
    'cursor' => '',
])

@php
    // Mapping positions to Tailwind classes
    $positions = [
        'top'    => '-top-10 left-1/2 -translate-x-1/2 before:top-full before:left-1/2 before:-translate-x-1/2 before:border-t-gray-600 dark:before:border-t-gray-300',
        'bottom' => '-bottom-10 left-1/2 -translate-x-1/2 before:bottom-full before:left-1/2 before:-translate-x-1/2 before:border-b-gray-600 dark:before:border-b-gray-300',
        'left'   => 'top-1/2 -translate-y-1/2 right-[calc(100%+8px)] before:top-1/2 before:left-full before:-translate-y-1/2 before:border-l-gray-600 dark:before:border-l-gray-300',
        'right'  => 'top-1/2 -translate-y-1/2 left-[calc(100%+8px)] before:top-1/2 before:right-full before:-translate-y-1/2 before:border-r-gray-600 dark:before:border-r-gray-300',
    ];

    $positionClasses = $positions[$position] ?? $positions['top'];

    $underline_classes = $underline ? ' underline underline-offset-2 decoration-dashed decoration-1' : '';

    $cursor_class = ' ' . $cursor ?: '';
@endphp

<div {{ $attributes->merge(['class' => 'group relative inline-block' . $underline_classes . $cursor_class]) }}>
    {{ $slot }}

    <span 
        class="pointer-events-none absolute {{ $positionClasses }} whitespace-nowrap rounded bg-gray-600 dark:bg-gray-300 px-2 py-1 text-xs text-gray-200 dark:text-gray-800 opacity-0 transition-opacity duration-300 group-hover:opacity-100 z-50
               before:absolute before:border-4 before:border-transparent"
    >
        {{ $text ?: $tooltipContent }}
    </span>
</div>