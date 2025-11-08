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
            <div class="absolute inset-0" x-show="currentIndex === index"
                x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000 absolute inset-0"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <h1 class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-4xl font-bold text-center w-full max-w-2xl drop-shadow-md/50"
                    style="font-family:'Abhaya Libre', serif" x-text="slide.text">
                </h1>

                <img :src="slide.imgSrc" :alt="'Slide ' + (index + 1) + ' image'"
                    class="w-full h-full object-cover blur-[2px] brightness-[0.75]">
            </div>
        </template>
    </div>

    <div class="mt-12 flex items-center justify-center max-w-[1120px] mx-auto">
        <div class="flex flex-col justify-center w-full">
            <h2 class="text-center text-4xl font-bold" style="font-family:'Abhaya Libre', serif">
                Popular Co-Living Locations in Singapore
            </h2>

            <div class="mt-6 flex justify-center gap-4" role="tablist" aria-label="Content tabs"
                aria-orientation="horizontal" data-tabs-id="bde-advanced-tabs-18-555">

                <button role="tab" aria-selected="true" class="text-white bg-[#0079C1] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-1" id="tab-bde-advanced-tabs-18-555-1" data-value="1">
                    <span class="font-semibold">486 Sims Ave</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-2" id="tab-bde-advanced-tabs-18-555-2" data-value="2"
                    tabindex="-1">
                    <span class="font-semibold">262A Tanjong Katong</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-3" id="tab-bde-advanced-tabs-18-555-3" data-value="3"
                    tabindex="-1">
                    <span class="font-semibold">Hillview Green</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-4" id="tab-bde-advanced-tabs-18-555-4" data-value="4"
                    tabindex="-1">
                    <span class="font-semibold">Serenity Park</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-5" id="tab-bde-advanced-tabs-18-555-5" data-value="5"
                    tabindex="-1">
                    <span class="font-semibold">Changi Court</span>
                </button>
            </div>


            <div class="mt-8 bg-stone-100">

                <div class="flex gap-6">
                    <div class="relative">
                        <img src="/web/images/1814B0B5-EF70-45B7-91AA-C52D547B2127-768x576.jpg" alt=""
                            class="w-[324px] h-[460px] object-cover">
                        <div class="absolute inset-x-0 bottom-0 py-4 text-white bg-black/50">
                            <h2 class="text-center text-3xl font-medium">486 Sims Ave</h2>
                            <p class="text-center">Shophouse</p>
                        </div>
                    </div>

                    <div class="flex gap-6 my-4">
                        <div class="relative bg-white rounded-xl">

                            <p class="absolute top-2 left-2 px-3 py-2 rounded-full bg-[#FFE2D1] text-red-500 text-xs font-medium border-2 border-white">
                                Occupied
                            </p>

                            <div class="h-[124px]">
                                <img src="/web/images/B9F63756-F809-4D41-A426-14A63CCC1F91-300x225.jpg" alt=""
                                    class="rounded-t-xl w-full h-full object-cover">
                            </div>

                            <div class="p-4">
                                <h3 class="text-lg font-medium leading-4 text-center">Standard Room</h3>
                                <h2 class="text-[#B38D00] text-2xl font-semibold text-center">
                                    S$1200/month
                                </h2>
                                <p class="flex items-center justify-center text-sm pb-4 border-b-4 border-double">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="icon-location" viewBox="0 0 32 32"
                                        fill="currentColor" class="h-4 text-gray-500">
                                        <path
                                            d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z">
                                        </path>
                                    </svg>
                                    Geylang (D14)
                                </p>

                                <div class="mt-4 ml-2 grid grid-cols-2 gap-4 text-xs">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"
                                            class="w-4 h-4 text-gray-500">
                                            <path
                                                d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z">
                                            </path>
                                        </svg>
                                        Queen Bed
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"
                                            class="w-4 h-4 text-gray-500">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                            class="w-4 h-4 text-gray-500">
                                            <path
                                                d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z">
                                            </path>
                                        </svg>
                                        Aircon
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"
                                            class="w-4 h-4 text-gray-500">
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
                                    <a href="#" class="px-4 py-2 rounded bg-blue-700 text-white">View details</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="my-20 py-20">...</div>
    </div>
    </div>
@endsection
