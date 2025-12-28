<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Edit Room</h1>
        </div>
        <h3 class="text-lg mb-4">{{ $property->property_name }}</h3>

        <div class="overflow-hidden w-full overflow-x-auto">
            <form x-target="main" action="{{ route('rooms.update', [$property, $room]) }}" method="POST"
                class="p-8 overflow-hidden w-full max-w-4xl overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                @csrf
                @method('PUT')

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="room_number" class="w-fit pl-0.5 text-sm">Room Number</label>
                        <input id="room_number" type="text" min="1" step="1"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="room_number" value="{{ $room->room_number }}" required />
                        @error('room_number')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="slug" class="w-fit pl-0.5 text-sm">URL Slug</label>
                        <input id="slug" type="text" min="1" step="1"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="slug" value="{{ $room->slug }}" required />
                        @error('slug')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div
                        class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Room Type" class="w-fit pl-0.5 text-sm">Room Type</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="Room Type" name="room_type"
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            @foreach ($room_types as $value => $text)
                                <option value="{{ $value }}" @selected($room->room_detail->details['room'] == $value)>{{ $text }}
                                </option>
                            @endforeach
                        </select>
                        @error('room_type')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div
                        class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Bed Type" class="w-fit pl-0.5 text-sm">Bed Type</label>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="absolute pointer-events-none right-4 top-8 size-5">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                        <select id="Bed Type" name="bed_type"
                            class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            @foreach ($bed_types as $value => $text)
                                <option value="{{ $value }}" @selected($room->room_detail->details['bed'] == $value)>{{ $text }}
                                </option>
                            @endforeach
                        </select>
                        @error('bed_type')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="my-4 grid grid-cols-3 lg:grid-cols-5 gap-4">
                    <label for="Wi-fi" class="inline-flex items-center gap-3">
                        <input id="Wi-fi" type="checkbox" name="wi-fi" class="peer sr-only" role="switch"
                            @checked(old('wi-fi', $room->room_detail->details['wi-fi'])) />
                        <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
                            aria-hidden="true"></div>
                        <span
                            class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
                            Wi-fi
                        </span>
                    </label>
                    <label for="Aircon" class="inline-flex items-center gap-3">
                        <input id="Aircon" type="checkbox" name="aircon" class="peer sr-only" role="switch"
                            @checked(old('aircon', $room->room_detail->details['aircon'])) />
                        <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
                            aria-hidden="true"></div>
                        <span
                            class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
                            Aircon
                        </span>
                    </label>
                    <label for="Window" class="inline-flex items-center gap-3">
                        <input id="Window" type="checkbox" name="window" class="peer sr-only" role="switch"
                            @checked(old('window', $room->room_detail->details['window'])) />
                        <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
                            aria-hidden="true"></div>
                        <span
                            class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
                            Window
                        </span>
                    </label>
                    <label for="Cleaning" class="inline-flex items-center gap-3">
                        <input id="Cleaning" type="checkbox" name="cleaning" class="peer sr-only" role="switch"
                            @checked(old('cleaning', $room->room_detail->details['cleaning'])) />
                        <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
                            aria-hidden="true"></div>
                        <span
                            class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
                            Cleaning
                        </span>
                    </label>
                    <label for="Furnishings" class="inline-flex items-center gap-3">
                        <input id="Furnishings" type="checkbox" name="furnishings" class="peer sr-only"
                            role="switch" @checked(old('furnishings', $room->room_detail->details['furnishings'])) />
                        <div class="relative h-6 w-11 after:h-5 after:w-5 peer-checked:after:translate-x-5 rounded-full border border-outline bg-surface-alt after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:rounded-full after:bg-on-surface after:transition-all after:content-[''] peer-checked:bg-success peer-checked:after:bg-on-primary peer-focus:outline-2 peer-focus:outline-offset-2 peer-focus:outline-outline-strong peer-focus:peer-checked:outline-primary peer-active:outline-offset-0 peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:border-outline-dark dark:bg-surface-dark-alt dark:after:bg-on-surface-dark dark:peer-checked:bg-success-dark dark:peer-checked:after:bg-on-primary-dark dark:peer-focus:outline-outline-dark-strong dark:peer-focus:peer-checked:outline-primary-dark"
                            aria-hidden="true"></div>
                        <span
                            class="trancking-wide text-sm font-medium text-on-surface peer-checked:text-on-surface-strong peer-disabled:cursor-not-allowed peer-disabled:opacity-70 dark:text-on-surface-dark dark:peer-checked:text-on-surface-dark-strong">
                            Furnishings
                        </span>
                    </label>
                </div>

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Price" class="w-fit pl-0.5 text-sm">Price</label>
                        <input id="Price" type="number" step="0.01"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="price_month" value="{{ $room->price_month }}" required />
                        @error('price_month')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                        <label for="Utilities" class="w-fit pl-0.5 text-sm">Utilities</label>
                        <input id="Utilities" type="number" step="0.01"
                            class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                            name="utilities" value="{{ $room->utilities }}" required />
                        @error('utilities')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="flex gap-2">
                        <button type="submit" class="btn-primary">Update</button>
                        <a x-target.push="main" href="{{ route('rooms.index', $property) }}" class="inline-block btn-outline-inverse">Cancel</a>
                    </div>

                    <button form="delete_form" x-target.push="main" class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                </div>
            </form>
            
            <form x-target.push="main" id="delete_form" @submit="confirm('Are you sure?') || $event.preventDefault()" action="{{ route('rooms.delete', [$property, $room]) }}" method="POST">
                @csrf
                @method('delete')
            </form>



        </div>
    </main>
</x-app>
