@extends('site.layout')

@section('content')
    {{-- image slider --}}
    <div class="relative h-[370px] overflow-hidden" x-data="{
        slides: [
            { text: 'More than a room. Welcome to a lifestyle.', imgSrc: '/web/images/CE6EE739-5BBB-4729-82F6-B2483BD989F0-1024x768.jpg' },
            { text: 'Fully furnished. Just bring your luggage.', imgSrc: '/web/images/8E592C1E-4025-4691-946E-2041E4135276-1024x768.jpg' },
            { text: 'Say hello to co-living that feels like home', imgSrc: '/web/images/1814B0B5-EF70-45B7-91AA-C52D547B2127-1024x768.jpg' }
        ],
        currentIndex: 0,
        interval: 5000
    }" x-init="setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
    }, interval);">
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 overflow-hidden" x-show="currentIndex === index"
                x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000 absolute inset-0"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <h1 class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-[40px] font-bold text-center w-full drop-shadow-md/50"
                    x-text="slide.text">
                </h1>

                <div class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 flex gap-6">
                    <a href="#"
                        class="group self-start mt-8 px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">Find
                        rooms
                        to rent

                        <div
                            class="flex items-center justify-center w-10 h-10 group-hover:scale-125 duration-300 bg-blue-700 rounded-full ml-4 -mr-2 -ml-2">
                            <svg class="-rotate-45 text-white w-8 h-8" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z">
                                </path>
                            </svg>
                        </div>
                    </a>

                    <a href="{{ route('landlords') }}"
                        class="group self-start mt-8 px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">List
                        my property

                        <div
                            class="flex items-center justify-center w-10 h-10 group-hover:scale-125 duration-300 bg-[#B59410] rounded-full ml-4 -mr-2 -ml-2">
                            <svg class="-rotate-45 text-white w-8 h-8" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z">
                                </path>
                            </svg>
                        </div>
                    </a>
                </div>

                <img :src="slide.imgSrc" :alt="'Slide ' + (index + 1) + ' image'"
                    class="w-full h-full object-cover scale-105 blur-[2px] brightness-[0.75]">
            </div>

        </template>
    </div>

    <div class="mt-12 flex items-center justify-center max-w-[1120px] mx-auto">
        <div class="flex flex-col justify-center w-full">
            <h2 class="text-center text-4xl font-bold">
                Popular Co-Living Locations in Singapore
            </h2>

            <div class="mt-6 flex justify-center gap-4" role="tablist" aria-label="Content tabs"
                aria-orientation="horizontal" data-tabs-id="bde-advanced-tabs-18-555">

                @foreach ($properties as $property)
                    <a href="{{ route('site', $property->slug) }}"
                        class="property-pill px-4 py-2 rounded-full cursor-pointer {{ $property == $current_property ? 'active' : '' }}">
                        <span class="font-semibold">{{ $property->property_name }}</span>
                    </a>
                @endforeach
            </div>


            <div class="mt-8 mb-20 bg-stone-100">

                <div class="flex gap-6">
                    <div class="relative">
                        <img src="/web/images/1814B0B5-EF70-45B7-91AA-C52D547B2127-768x576.jpg" alt=""
                            class="w-[324px] h-[460px] object-cover rounded-l-xl">
                        <div class="absolute inset-x-0 bottom-0 py-4 text-white bg-black/50 rounded-bl-xl">
                            <h2 class="text-center text-3xl font-medium">{{ $current_property->property_name }}</h2>
                            <p class="text-center">&mdash; {{ ucwords($current_property->property_type) }} &mdash;</p>
                        </div>
                    </div>

                    <div class="flex gap-6 my-4">
                        @foreach ($rooms as $room)
                            <div class="relative bg-white rounded-xl">
                                <p
                                    class="absolute top-2 left-2 px-3 py-2 rounded-full bg-[#FFE2D1] text-red-500 text-xs font-medium border-2 border-white">
                                    Occupied
                                </p>

                                <div class="h-[124px]">
                                    <img src="/web/images/B9F63756-F809-4D41-A426-14A63CCC1F91-300x225.jpg" alt=""
                                        class="rounded-t-xl w-full h-full object-cover">
                                </div>

                                <div class="p-4">
                                    <h3 class="text-lg font-medium leading-4 text-center">
                                        {{ ucwords($room->room_type) }}</h3>
                                    <h2 class="text-[#B38D00] text-2xl font-semibold text-center">
                                        S${{ $room->price_month }}/month
                                    </h2>
                                    <p class="flex items-center justify-center text-sm pb-4 border-b-4 border-double">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="icon-location" viewBox="0 0 32 32"
                                            fill="currentColor" class="h-4 text-gray-500">
                                            <path
                                                d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z">
                                            </path>
                                        </svg>
                                        {{ ucwords($room->property->district->district_name) }}
                                        (D{{ $room->property->district_id }})
                                    </p>

                                    <div class="mt-4 ml-2 grid grid-cols-2 gap-2 text-xs">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                fill="currentColor" class="w-4 h-4 text-gray-500">
                                                <path
                                                    d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z">
                                                </path>
                                            </svg>
                                            Queen Bed
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                fill="currentColor" class="w-4 h-4 text-gray-500">
                                                <path
                                                    d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                                                </path>
                                            </svg>
                                            Wi-fi
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="w-4 h-4 text-gray-500" viewBox="0 0 448 512">
                                                <path
                                                    d="M248 48V256h48V58.7c23.9 13.8 40 39.7 40 69.3V256h48V128C384 57.3 326.7 0 256 0H192C121.3 0 64 57.3 64 128V256h48V128c0-29.6 16.1-55.5 40-69.3V256h48V48h48zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32V384H352v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288H48z">
                                                </path>
                                            </svg>
                                            Furnishings<br />Included
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                fill="currentColor" class="w-4 h-4 text-gray-500">
                                                <path
                                                    d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z">
                                                </path>
                                            </svg>
                                            Aircon
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                fill="currentColor" class="w-4 h-4 text-gray-500">
                                                <path
                                                    d="M0 93.7l183.6-25.3v177.4H0V93.7zm0 324.6l183.6 25.3V268.4H0v149.9zm203.8 28L448 480V268.4H203.8v177.9zm0-380.6v180.1H448V32L203.8 65.7z">
                                                </path>
                                            </svg>
                                            Window
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 115.82 191.25" fill="currentColor"
                                                class="w-4 h-4 text-gray-500">
                                                <path
                                                    d="M82.27,117.85c5.66,21.64,14.23,40.13,31.7,54.72-2.46,2.77-5.09,5.61-8.37,7.42-12.53,6.95-7.98-4.72-16.6-8.98l-.07,15.71-20.11,2.76-11.15-24.77-3.24,25.13-25-3.11,3.13-12.56c-8.13-2.67-7.92,9.38-11.23,9.61-3.82.26-20.04-7.85-20.02-11.21,17.7-14.22,24.95-33.92,34.34-53.65l46.6-1.08Z" />
                                                <path
                                                    d="M65.29,85.88c.42.98,15.62,9.18,16.32,9.94,2.07,2.26-.17,11.26.52,15.27h-46.43c-8.79-16.19,16.14-23.43,16.14-25.22V5.5l7.07-4.67,6.37,4.67v80.38Z" />
                                            </svg>
                                            Cleaning<br />Service
                                        </div>
                                    </div>

                                    <div class="text-center py-4">
                                        <a href="{{ route('room_details', $room->slug) }}"
                                            class="px-4 py-2 rounded bg-blue-700 text-white">View details</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-14">
                <h2 class="text-center text-4xl font-bold">
                    How It Works
                </h2>
                <p class="text-center">3 Easy Steps to Move In</p>
                <div class="flex flex-col md:flex-row items-center gap-4 px-4 mt-8 mb-12">
                    <div class="p-8 rounded-xl shadow-xl w-full">
                        <p class="mb-2 font-semibold text-blue-600">01</p>
                        <h2 class="text-4xl font-bold mb-3">Find Your Room</h2>
                        <p>
                            Find rooms that match your budget, location, and lifestyle
                        </p>
                    </div>
                    <div>
                        <div class="flex items-center justify-center w-10 h-10 bg-[#C7B277] rounded-full">
                            <svg fill="currentColor" class="text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512">
                                <path
                                    d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-8 rounded-xl shadow-xl w-full">
                        <p class="mb-2 font-semibold text-blue-600">02</p>
                        <h2 class="text-4xl font-bold mb-3">Book Online</h2>
                        <p>
                            Contact us for in-person tours before you commit
                        </p>
                    </div>
                    <div>
                        <div class="flex items-center justify-center w-10 h-10 bg-[#C7B277] rounded-full">
                            <svg fill="currentColor" class="text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512">
                                <path
                                    d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-8 rounded-xl shadow-xl w-full">
                        <p class="mb-2 font-semibold text-blue-600">03</p>
                        <h2 class="text-4xl font-bold mb-3">Move In</h2>
                        <p>
                            Sign your lease and start enjoying your co-living space!
                        </p>
                    </div>
                </div>
            </div>



            <div class="mx-4 p-16 bg-[#EFEFEF] rounded-3xl flex flex-col items-center">
                <h2 class="text-center text-4xl font-bold">Why Choose Our Co-Living Spaces</h2>

                <div class="my-4 w-[200px] border border-gray-300"></div>

                <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-8">
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">All-Inclusive Rent</h3>
                            <div>Includes utilities (cap at $60/common room, $80/MBR)</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Flexible Leases</h3>
                            <div>Choose from short-term or long-term stays.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 320 512">
                                <path
                                    d="M0 32V64H320V32c0-17.7-14.3-32-32-32H32C14.3 0 0 14.3 0 32zM24 96H0v24V488c0 13.3 10.7 24 24 24s24-10.7 24-24v-8H272v8c0 13.3 10.7 24 24 24s24-10.7 24-24V120 96H296 24zM256 240v64c0 8.8-7.2 16-16 16s-16-7.2-16-16V240c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Fully Furnished</h3>
                            <div>Every room comes with essentials like bed, desk, wardrobe and
                                more.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Maintenance</h3>
                            <div>Regular aircon servicing and general area cleaning included.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3V152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6V503zM15.1 187.3C6 191 0 199.8 0 209.6V480.4c0 17 17.1 28.6 32.9 22.3L160 451.8V200.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77V449.4l192 54.9V255z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Prime Locations</h3>
                            <div>Live close to MRT stations, dining, workplaces.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-price-tag" viewBox="0 0 32 32"
                                fill="currentColor" class="text-gold w-6 h-6">
                                <path
                                    d="M30.5 0h-12c-0.825 0-1.977 0.477-2.561 1.061l-14.879 14.879c-0.583 0.583-0.583 1.538 0 2.121l12.879 12.879c0.583 0.583 1.538 0.583 2.121 0l14.879-14.879c0.583-0.583 1.061-1.736 1.061-2.561v-12c0-0.825-0.675-1.5-1.5-1.5zM23 12c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Transparent Pricing</h3>
                            <div>No hidden fees or surprises; fixed monthly rent.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M240 144A96 96 0 1 0 48 144a96 96 0 1 0 192 0zm44.4 32C269.9 240.1 212.5 288 144 288C64.5 288 0 223.5 0 144S64.5 0 144 0c68.5 0 125.9 47.9 140.4 112h71.8c8.8-9.8 21.6-16 35.8-16H496c26.5 0 48 21.5 48 48s-21.5 48-48 48H392c-14.2 0-27-6.2-35.8-16H284.4zM144 80a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM400 240c13.3 0 24 10.7 24 24v8h96c13.3 0 24 10.7 24 24s-10.7 24-24 24H280c-13.3 0-24-10.7-24-24s10.7-24 24-24h96v-8c0-13.3 10.7-24 24-24zM288 464V352H512V464c0 26.5-21.5 48-48 48H336c-26.5 0-48-21.5-48-48zM48 320h80 16 32c26.5 0 48 21.5 48 48s-21.5 48-48 48H160c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V336c0-8.8 7.2-16 16-16zm128 64c8.8 0 16-7.2 16-16s-7.2-16-16-16H160v32h16zM24 464H200c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Lifestyle Amenities</h3>
                            <div>Shared kitchens, fitness areas depending on property.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h88.6c-5.4-9.4-8.6-20.3-8.6-32V352c0-23.7 12.9-44.4 32-55.4V272c0-30.5 12.2-58.2 32-78.4V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM464 240c17.7 0 32 14.3 32 32v48H432V272c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H544c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32V272c0-44.2-35.8-80-80-80s-80 35.8-80 80z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Safe &amp; Secure</h3>
                            <div>Access-controlled buildings, CCTV, and trusted management.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold w-6 h-6"
                                viewBox="0 0 640 512">
                                <path
                                    d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Community</h3>
                            <div>Meet like-minded professionals, students, and expats.</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-phone" viewBox="0 0 32 32"
                                fill="currentColor" class="text-gold w-6 h-6">
                                <path
                                    d="M22 20c-2 2-2 4-4 4s-4-2-6-4-4-4-4-6 2-2 4-4-4-8-6-8-6 6-6 6c0 4 4.109 12.109 8 16s12 8 16 8c0 0 6-4 6-6s-6-8-8-6z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-4">Customer Support</h3>
                            <div>Dedicated customer service for quick responses.</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Who is Co-Living For? --}}
            <div class="mt-12 pt-16 flex flex-col items-center">
                <h2 class="text-center text-4xl font-bold">Who is Co-Living For?</h2>
                <div class="my-4 w-[200px] border border-gray-300"></div>
            </div>

            <div class="flex flex-col md:flex-row gap-6 md:w-[1080px] md:h-[400px] overflow-hidden px-4">
                <div class="flex items-center rounded-3xl overflow-hidden basis-full hover:basis-3/2 duration-300 group">
                    <div class="relative">
                        <div
                            class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center w-9/10 group">
                            <div class="text-3xl font-bold opacity-0 group-hover:opacity-100 duration-500">Students &amp;
                                Interns</div>
                            <div class="opacity-0 group-hover:opacity-100 duration-500">Affordable, flexible, and social
                                student accommodation near top universities and internships. Focus on your studies and build
                                a network.</div>
                        </div>
                        <img src="/web/images/students-studying-in-a-modern-living-room-singapore-bright-lighting-far-away-shot-768x768.png"
                            alt="" class="group-hover:brightness-50 aspect-3/2 md:aspect-auto object-cover">
                    </div>
                </div>
                <div class="flex items-center rounded-3xl overflow-hidden basis-full hover:basis-3/2 duration-300 group">
                    <div class="relative">
                        <div
                            class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-center w-9/10 group">
                            <div class="text-3xl font-bold opacity-0 group-hover:opacity-100 duration-500">Digital Nomads
                                &amp; Expats</div>
                            <div class="opacity-0 group-hover:opacity-100 duration-500">Enjoy the freedom of flexible
                                leases and a supportive network in one of Asia's most dynamic cities - Singapore.</div>
                        </div>
                        <img src="/web/images/imagen-4.0-generate-preview-06-06_2_happy_man_working_-1-768x768.png"
                            alt="" class="group-hover:brightness-50 aspect-3/2 md:aspect-auto object-cover">
                    </div>
                </div>
            </div>

            <div class="my-12 pt-16 flex flex-col items-center">
                <h2 class="text-center text-4xl font-bold">Testimonials From Our Residents</h2>
                <p class="text-center">Real stories from people who found their perfect co-living home with us!</p>
            </div>

            @include('site.partials.reviews')


            {{-- For landlords --}}
            <div class="relative bg-[#FFDC5B] m-4 p-12 mb-20 rounded-3xl w-[380px]">
                FOR LANDLORDS
                <h3 class="text-4xl font-bold border-b-2 border-white">Earn More With Co-Living!</h3>

                <p class="mt-6">Maximize your property’s earning potential! Enjoy higher returns and lower vacancy rates!
                </p>

                <a href="{{ route('landlords') }}"
                    class="group self-start mt-8 px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">List
                    your property

                    <div
                        class="flex items-center justify-center w-10 h-10 group-hover:scale-125 duration-300 bg-black rounded-full ml-4 -mr-2 -ml-2">
                        <svg class="-rotate-45 text-white w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z">
                            </path>
                        </svg>
                    </div>
                </a>

                <img src="/web/images/Earn-More-With-Co-Living-240x300.png" alt="" class="w-[150px] absolute -bottom-16 -right-8">
            </div>
        </div>
    </div>
@endsection
