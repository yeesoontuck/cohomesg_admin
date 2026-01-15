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

            <label class="block mt-8 w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Property Amenities</label>
            <div class="mt-2 mb-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-amenity name="wi-fi" label="High Speed Wi-Fi" :status="$property->amenities['wi-fi']" :disabled="true" />
                <x-amenity name="cleaning" label="Cleaning" :status="$property->amenities['cleaning']" :disabled="true" />
                <x-amenity name="microwave" label="Microwave" :status="$property->amenities['microwave']" :disabled="true" />
                <x-amenity name="induction" label="Induction Cooker" :status="$property->amenities['induction']" :disabled="true" />
                <x-amenity name="washer" label="Washer" :status="$property->amenities['washer']" :disabled="true" />
                <x-amenity name="dryer" label="Dryer" :status="$property->amenities['dryer']" :disabled="true" />
                <x-amenity name="refrigerator" label="Refrigerator" :status="$property->amenities['refrigerator']" :disabled="true" />
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

            <div class="mb-4 flex w-full max-w-4xl flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="room_number" class="w-fit pl-0.5 text-sm">Map Embed URL</label>
                <textarea rows="5"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">{{ $property->map_embed }}</textarea>

                @if ($property->map_embed)
                    {!! $property->map_embed !!}
                @endif

            </div>

            {{-- 
        "property_amenities": "[\"Communal kitchen with cooking equipment\", \"Laundry facilities\"]", --}}

            <div class="flex justify-between">
                <div class="flex gap-2">
                    @can('update', $property)
                        <a x-target.push="main" href="{{ route('properties.edit', $property) }}"
                            class="inline-block btn-info">Edit</a>
                    @endcan
                    <a x-target.push="main" href="{{ route('properties.index') }}"
                        class="inline-block btn-outline-inverse">Back</a>
                </div>

                @can('delete', $property)
                    <button type="button"
                        @click="open = true; deleteUrl = '{{ route('properties.destroy', $property) }}'"
                        class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                @endcan
            </div>


            {{-- delete confirmation modal --}}
            <x-confirm-modal method="delete" message="This will also delete all rooms in this property." />

            <div class="mt-8">
                <a href="{{ route('audits.show', ['property', $property]) }}" class="text-xs link-underline">Activity
                    Log ({{ $property->audits()->count() }})</a>
            </div>
        </div>

    </main>
</x-app>
