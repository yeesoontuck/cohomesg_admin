<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <h3 class="text-lg mb-4">Property</h3>

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div x-data="{ open: false, deleteUrl: '' }" class="overflow-hidden w-full overflow-x-auto">

            <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Estate Name</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->estate_name }}
                    </p>
                </div>
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Property Name</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->property_name }}
                    </p>
                </div>
            </div>

            <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">District</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        D{{ $property->district->id }} {{ $property->district->district_name }}
                    </p>
                </div>
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Property Type</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ Str::ucwords($property->property_type) }}
                    </p>
                </div>
            </div>

            <div class="mb-4 flex w-full max-w-4xl flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="room_number" class="w-fit pl-0.5 text-sm">Address</label>
                <p
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    {{ $property->address }}
                </p>
            </div>

            <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Latitude</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->latitude }}
                    </p>
                </div>
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Longitude</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->longitude }}
                    </p>
                </div>
            </div>

            <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">Web Site Sort Order</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->sort_order }}
                    </p>
                </div>
                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="room_number" class="w-fit pl-0.5 text-sm">URL Slug</label>
                    <p
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                        {{ $property->slug }}
                    </p>
                </div>
            </div>

            {{-- 
        "property_amenities": "[\"Communal kitchen with cooking equipment\", \"Laundry facilities\"]", --}}

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <a x-target.push="main" href="{{ route('properties.edit', $property) }}"
                        class="inline-block btn-info">Edit</a>
                    <a x-target.push="main" href="{{ route('properties.index') }}"
                        class="inline-block btn-outline-inverse">Back</a>
                </div>

                <button type="button" @click="open = true; deleteUrl = '{{ route('properties.destroy', $property) }}'"
                    class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
            </div>


            {{-- delete confirmation modal --}}
            <div x-show="open" class="z-200 fixed inset-0 flex items-center justify-center bg-black/50"
                x-transition.opacity.duration.300ms x-cloak>
                <div class="bg-surface dark:bg-surface-dark p-12 rounded-lg shadow-lg flex flex-col items-center gap-4">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12 text-danger">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                    <h2 class="text-md font-semibold text-center">Are you sure?</h2>

                    <p>This will also delete all rooms in this property.</p>

                    <form x-target.push="main" id="delete_form" :action="deleteUrl" method="POST">
                        @csrf
                        @method('delete')

                        <div class="flex justify-end gap-2">
                            <button type="button" @click="open = false" class="btn-outline-inverse">Cancel</button>
                            <button type="submit" class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</x-app>
