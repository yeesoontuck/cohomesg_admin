<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-transition.opacity.duration.300ms
    x-init="setTimeout(() => show = false, 3500)"
    class="fixed top-20 right-4 z-200"
>
    <div class="rounded-xl px-6 py-4 shadow-lg text-white font-medium
                bg-success/80 backdrop-blur-sm">
        {{ $slot }}
    </div>
</div>
