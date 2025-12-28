<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <h3 class="text-lg mb-4">Property</h3>

        @if(session('success'))
        <x-toast>{{ session('success') }}</x-toast>
        @endif

        <div class="overflow-hidden w-full overflow-x-auto">

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

            <a x-target.push="main" href="{{ route('properties.edit', $property) }}" class="inline-block btn-info">Edit</a>

            <a x-target.push="main" href="{{ route('properties.index') }}" class="inline-block btn-outline-inverse">Back</a>

        </div>
    </main>
</x-app>
