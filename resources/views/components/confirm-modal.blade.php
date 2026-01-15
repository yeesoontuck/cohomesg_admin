@props([
    'method' => 'post',
    'message',
])

{{-- confirmation modal --}}
<div x-show="open" class="z-200 fixed inset-0 flex items-center justify-center bg-black/50"
    x-transition.opacity.duration.300ms x-cloak>
    <div class="bg-surface dark:bg-surface-dark p-12 rounded-lg shadow-lg flex flex-col items-center gap-4">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-12 text-amber-500">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
        </svg>


        <h2 class="text-md font-semibold text-center">Are you sure?</h2>

        <p>{{ $message }}</p>

        <form :action="actionUrl" method="POST">
            @csrf
            @method($method)

            <div class="flex justify-end gap-2">
                <button type="button" @click="open = false; actionUrl = ''" class="btn-outline-inverse">Go
                    back</button>
                <button type="submit" class="btn-outline-danger bg-red-100 dark:bg-red-950">Proceed</button>
            </div>
        </form>
    </div>
</div>
