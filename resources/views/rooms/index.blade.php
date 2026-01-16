<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Rooms</h1>

            @can('create', $property)
                <a x-target.push="main" href="{{ route('rooms.create', $property) }}"
                    class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    New Room
                </a>
            @endcan
        </div>
        <h3 class="text-lg mb-4">
            <a x-target.push="main" href="{{ route('properties.index') }}"
                class="inline-block btn-info text-xs py-1 px-2 mr-2">&lt; Back</a>
            {{ $property->property_name }} - {{ $property->district->district_name }} (D{{ $property->district->id }})
        </h3>

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div
            class="overflow-hidden w-full overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead
                    class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4">Room Number</th>
                        <th scope="col" class="p-4">Room Type</th>
                        <th scope="col" class="p-4">Bed</th>
                        <th scope="col" class="p-4">Amenities</th>
                        <th scope="col" class="p-4">Price</th>
                        <th scope="col" class="p-4">Utilities</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline dark:divide-outline-dark">

                    @if ($rooms->isEmpty())
                        <tr>
                            <td colspan="7" class="p-4 text-center">-- empty --</td>
                        </tr>
                    @endif

                    @foreach ($rooms as $room)
                        <tr>
                            <td class="p-4">
                                {{ $room->room_number }}
                            </td>
                            <td class="p-4">
                                {{ Str::ucwords($room->room_detail->details['room']) }}<br />
                            </td>
                            <td class="p-4">
                                {{ Str::ucwords($room->room_detail->details['bed']) }}<br />
                            </td>
                            <td class="p-4">
                                <div class="flex gap-1 text-gray-500 dark:text-slate-300">
                                    @if ($room->room_detail->details['aircon'])
                                        <x-tooltip text="Aircon" cursor="cursor-help">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z">
                                                </path>
                                            </svg>
                                        </x-tooltip>
                                    @endif
                                    @if ($room->room_detail->details['window'])
                                        <x-tooltip text="Window" cursor="cursor-help">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M0 93.7l183.6-25.3v177.4H0V93.7zm0 324.6l183.6 25.3V268.4H0v149.9zm203.8 28L448 480V268.4H203.8v177.9zm0-380.6v180.1H448V32L203.8 65.7z">
                                                </path>
                                            </svg>
                                        </x-tooltip>
                                    @endif
                                    @if ($room->room_detail->details['furnishings'])
                                        <x-tooltip text="Table & Chair" cursor="cursor-help">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M248 48V256h48V58.7c23.9 13.8 40 39.7 40 69.3V256h48V128C384 57.3 326.7 0 256 0H192C121.3 0 64 57.3 64 128V256h48V128c0-29.6 16.1-55.5 40-69.3V256h48V48h48zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32V384H352v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288H48z">
                                                </path>
                                            </svg>
                                        </x-tooltip>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4">
                                {{ $room->price_month }}<br />
                            </td>
                            <td class="p-4">{{ $room->utilities }}</td>
                            <td class="p-4">
                                @can('update', $property)
                                    <a x-target.push="main" href="{{ route('rooms.edit', [$property, $room]) }}"
                                        class="inline-block btn-primary px-2 py-1 text-xs">
                                        Details
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
</x-app>
