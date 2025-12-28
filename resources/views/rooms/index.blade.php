<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Rooms</h1>
            <a x-target.push="main" href="{{ route('rooms.create', $property) }}"
                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                        clip-rule="evenodd" />
                </svg>
                New Room
            </a>
        </div>
        <h3 class="text-lg mb-4">
            <a x-target.push="main" href="{{ route('properties.index') }}" class="inline-block btn-info text-xs py-1 px-2 mr-2">&lt; Back</a>
            {{ $property->property_name }} - {{ $property->district->district_name }} (D{{ $property->district->id }})
        </h3>

        @if(session('success'))
        <x-toast>{{ session('success') }}</x-toast>
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
                                    @if ($room->room_detail->details['wi-fi'])
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                                            </path>
                                        </svg>
                                    @endif
                                    @if ($room->room_detail->details['aircon'])
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z">
                                            </path>
                                        </svg>
                                    @endif
                                    @if ($room->room_detail->details['window'])
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M0 93.7l183.6-25.3v177.4H0V93.7zm0 324.6l183.6 25.3V268.4H0v149.9zm203.8 28L448 480V268.4H203.8v177.9zm0-380.6v180.1H448V32L203.8 65.7z">
                                            </path>
                                        </svg>
                                    @endif
                                    @if ($room->room_detail->details['cleaning'])
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 115.82 191.25" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                d="M82.27,117.85c5.66,21.64,14.23,40.13,31.7,54.72-2.46,2.77-5.09,5.61-8.37,7.42-12.53,6.95-7.98-4.72-16.6-8.98l-.07,15.71-20.11,2.76-11.15-24.77-3.24,25.13-25-3.11,3.13-12.56c-8.13-2.67-7.92,9.38-11.23,9.61-3.82.26-20.04-7.85-20.02-11.21,17.7-14.22,24.95-33.92,34.34-53.65l46.6-1.08Z" />
                                            <path
                                                d="M65.29,85.88c.42.98,15.62,9.18,16.32,9.94,2.07,2.26-.17,11.26.52,15.27h-46.43c-8.79-16.19,16.14-23.43,16.14-25.22V5.5l7.07-4.67,6.37,4.67v80.38Z" />
                                        </svg>
                                    @endif
                                    @if ($room->room_detail->details['furnishings'])
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-4 h-4" viewBox="0 0 448 512">
                                            <path
                                                d="M248 48V256h48V58.7c23.9 13.8 40 39.7 40 69.3V256h48V128C384 57.3 326.7 0 256 0H192C121.3 0 64 57.3 64 128V256h48V128c0-29.6 16.1-55.5 40-69.3V256h48V48h48zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32V384H352v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288H48z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4">
                                {{ $room->price_month }}<br />
                            </td>
                            <td class="p-4">{{ $room->utilities }}</td>
                            <td class="p-4">
                                <a x-target.push="main" href="{{ route('rooms.edit', [$property, $room]) }}"
                                    class="inline-block btn-primary px-2 py-1 text-xs">
                                    Details
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
</x-app>
