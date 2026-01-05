<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <h3 class="text-lg mb-4">New Property</h3>

        <div class="overflow-hidden w-full overflow-x-auto">

            <form x-target.push="main" action="{{ route('properties.store') }}" method="POST"
                class="p-8 overflow-hidden w-full max-w-4xl overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                @csrf

                <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="estate_name" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Estate Name</label>
                        <input id="estate_name" type="text" name="estate_name"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            value="{{ old('estate_name') }}" placeholder="Changi Court" required>
                        @error('estate_name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="property_name" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Property Name</label>
                        <input id="property_name" type="text" name="property_name"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            value="{{ old('property_name') }}" placeholder="Changi Court 02-07" required>
                        @error('property_name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </p>
                    </div>
                </div>

                <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                    <div class="relative mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="District" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">District</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="District" name="district_id" required
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="" disabled selected>- select -</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" @selected(old('district_id') == $district->id)>
                                    {{ 'D' . $district->id . ' ' . $district->district_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Property Type" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Property Type</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="Property Type" name="property_type" required
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="" disabled selected>- select -</option>
                            @foreach ($property_types as $property_type)
                                <option value="{{ $property_type }}" @selected(old('property_type') == $property_type)>
                                    {{ Str::ucwords($property_type) }}
                                </option>
                            @endforeach
                        </select>
                        @error('property_type')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 flex w-full max-w-4xl flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="address" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Address</label>
                    <input id="address" type="text" name="address"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        value="{{ old('address') }}" required maxlength="255">
                    </p>
                </div>

                <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="latitude" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Latitude</label>
                        <input id="latitude" type="text" name="latitude"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            value="{{ old('latitude') }}" placeholder="1.30606445378835300" required>
                        </p>
                    </div>
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="longitude" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Longitude</label>
                        <input id="longitude" type="text" name="longitude"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            value="{{ old('longitude') }}" placeholder="103.89582956700919000" required>
                        </p>
                    </div>
                </div>

                <div class="mb-4 flex w-full max-w-4xl flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="map_embed" class="w-fit pl-0.5 text-sm">
                        Map Embed URL
                        <a href="{{ route('help.properties.map_url') }}" target="_blank" class="bg-primary text-on-primary rounded-full px-2 py-1">?</a>
                    </label>
                    <textarea id="map_embed" name="map_embed" rows="5"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"></textarea>
                </div>

                {{-- <div class="max-w-4xl flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="room_number" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Web Site Sort Order</label>
                        <p
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            {{ $property->sort_order }}
                        </p>
                    </div>
                    <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="slug" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">URL Slug</label>
                        <input id="slug" type="text" name="slug"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            value="{{ old('slug', $property->slug) }}" required>
                        </p>
                    </div>
                </div> --}}

                <button type="submit" class="btn-primary">Save</button>

                <a x-target.push="main" href="{{ route('properties.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
            </form>
        </div>
    </main>
</x-app>
