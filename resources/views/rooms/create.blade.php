<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">New Room</h1>
        </div>
        <h3 class="text-lg mb-4">{{ $property->property_name }}</h3>

        <div class="overflow-hidden w-full overflow-x-auto">
            <form x-target="main" action="{{ route('rooms.store', $property) }}" method="POST"
                class="p-8 overflow-hidden w-full max-w-4xl overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                @csrf

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="room_number" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Room Number</label>
                        <input id="room_number" type="text" min="1" step="1"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="room_number" value="{{ old('room_number') }}" required />
                        @error('room_number')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div
                        class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Room Type" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Room Type</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="Room Type" name="room_type" required
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="" disabled selected>- select -</option>
                            @foreach ($room_types as $value => $text)
                                <option value="{{ $value }}" @selected(old('room') == $value)>{{ $text }}
                                </option>
                            @endforeach
                        </select>
                        @error('room_type')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div
                        class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Bed Type" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Bed Type</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="Bed Type" name="bed_type" required
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            <option value="" disabled selected>- select -</option>
                            @foreach ($bed_types as $value => $text)
                                <option value="{{ $value }}" @selected(old('bed') == $value)>{{ $text }}
                                </option>
                            @endforeach
                        </select>
                        @error('bed_type')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="my-4 grid grid-cols-1 lg:grid-cols-4 gap-4">
                    <x-amenity name="aircon" label="Aircon" />
                    <x-amenity name="window" label="Window" />
                    <x-amenity name="furnishings" label="Table & Chair" />
                </div>

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Price" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Price</label>
                        <input id="Price" type="number" step="0.01"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="price_month" value="{{ old('price_month') }}" required />
                        @error('price_month')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Utilities" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Utilities</label>
                        <input id="Utilities" type="number" step="0.01"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="utilities" value="{{ old('utilities') }}" required />
                        @error('utilities')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn-primary">Save</button>

                <a x-target.push="main" href="{{ route('rooms.index', $property) }}" class="inline-block btn-outline-inverse">Cancel</a>
            </form>




        </div>
    </main>
</x-app>
