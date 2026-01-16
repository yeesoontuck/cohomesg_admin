@extends('site.layout')

@section('head')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .slide-transition {
            transition: transform 0.5s ease-in-out;
        }
    </style>
@endsection

@section('script')
    <script>
        function carousel() {
            return {
                // Logical page index (0..pagesCount-1)
                current: 0,
                // Internal index for the track (includes duplicated slides)
                internalIndex: 0,
                visibleSlides: 1,
                slidePercentage: 100,
                useTransition: true,

                slides: [{
                        id: 1,
                        image: 'https://picsum.photos/id/10/800/600'
                    },
                    {
                        id: 2,
                        image: 'https://picsum.photos/id/11/800/600'
                    },
                    {
                        id: 3,
                        image: 'https://picsum.photos/id/12/800/600'
                    },
                    {
                        id: 4,
                        image: 'https://picsum.photos/id/13/800/600'
                    },
                    {
                        id: 5,
                        image: 'https://picsum.photos/id/14/800/600'
                    },
                    {
                        id: 6,
                        image: 'https://picsum.photos/id/15/800/600'
                    },
                    {
                        id: 7,
                        image: 'https://picsum.photos/id/16/800/600'
                    },
                    {
                        id: 8,
                        image: 'https://picsum.photos/id/17/800/600'
                    },
                    {
                        id: 9,
                        image: 'https://picsum.photos/id/18/800/600'
                    },
                    {
                        id: 10,
                        image: 'https://picsum.photos/id/19/800/600'
                    },
                    {
                        id: 11,
                        image: 'https://picsum.photos/id/20/800/600'
                    },
                ],

                // Track with duplicated copies for the head and tail
                track: [],

                get pagesCount() {
                    return Math.max(1, this.slides.length - this.visibleSlides + 1);
                },

                get trackStyle() {
                    const translate = `transform: translateX(-${this.internalIndex * this.slidePercentage}%);`;
                    const transition = this.useTransition ? 'transition: transform 0.5s ease-in-out;' :
                        'transition: none;';
                    return `${translate} ${transition}`;
                },

                init() {
                    this.updateVisibleSlides();
                    this.buildTrack();
                    window.addEventListener('resize', () => {
                        const prevCurrent = this.current;
                        this.updateVisibleSlides();
                        this.buildTrack(prevCurrent); // Keep the same logical page after resize
                    });
                },

                updateVisibleSlides() {
                    if (window.innerWidth < 768) {
                        this.visibleSlides = 1;
                    } else {
                        this.visibleSlides = 3;
                    }
                    this.slidePercentage = 100 / this.visibleSlides;
                },

                buildTrack(keepCurrent = null) {
                    if (keepCurrent !== null) {
                        this.current = Math.max(0, Math.min(keepCurrent, this.pagesCount - 1));
                    } else {
                        this.current = Math.max(0, Math.min(this.current, this.pagesCount - 1));
                    }

                    const head = this.slides.slice(-this.visibleSlides);
                    const tail = this.slides.slice(0, this.visibleSlides);
                    this.track = [...head, ...this.slides, ...tail];

                    // Start inside the track after the head
                    this.useTransition = false;
                    this.internalIndex = this.current + this.visibleSlides;

                    // Enable the transition after a short tick
                    requestAnimationFrame(() => {
                        this.useTransition = true;
                    });
                },

                next() {
                    this.current = (this.current + 1) % this.pagesCount;
                    this.internalIndex += 1;
                },

                prev() {
                    this.current = (this.current - 1 + this.pagesCount) % this.pagesCount;
                    this.internalIndex -= 1;
                },

                goTo(index) {
                    index = Math.max(0, Math.min(index, this.pagesCount - 1));
                    // Compute offset for a quick jump
                    const targetInternal = index + this.visibleSlides;
                    this.current = index;
                    this.internalIndex = targetInternal;
                },

                onTransitionEnd() {
                    // If we crossed the last real item (entered the tail clone)
                    if (this.internalIndex >= this.slides.length + this.visibleSlides) {
                        this.useTransition = false;
                        this.internalIndex = this.visibleSlides; // Jump to the real start
                        requestAnimationFrame(() => {
                            this.useTransition = true;
                        });
                    }
                    // If we crossed the first real item (entered the head clone)
                    if (this.internalIndex <= 0) {
                        this.useTransition = false;
                        this.internalIndex = this.slides.length; // Jump to the real end
                        requestAnimationFrame(() => {
                            this.useTransition = true;
                        });
                    }
                },

                handleImageError(slide) {
                    slide.image = 'https://picsum.photos/id/21/800/600';
                }
            }
        }
    </script>
@endsection

@section('content')
    <div class="bg-white">

        <div class="mb-12 px-4 flex flex-col max-w-[1195px] mx-auto">

            <div x-data="carousel()" x-cloak class="relative mb-8">
                <div class="relative overflow-hidden rounded-lg shadow-xl bg-white">
                    <div class="flex" :style="trackStyle" x-on:transitionend="onTransitionEnd">
                        <template x-for="(slide, index) in track" :key="`${slide.id}-${index}`">
                            <div class="flex-none px-2 py-4" :style="`width: ${slidePercentage}%;`">
                                <div class="rounded-lg overflow-hidden h-full">
                                    <!-- Square container so we can keep the image circular -->
                                    <div class="aspect-square flex items-center justify-center">
                                        <img :src="slide.image" :alt="slide.title || ('Slide ' + (index + 1))"
                                            class="w-full h-full object-cover" x-on:error="handleImageError(slide)">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Prev -->
                <button x-on:click="prev()"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md z-10 -ml-4"
                    aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Next -->
                <button x-on:click="next()"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md z-10 -mr-4"
                    aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Dots (based on number of real images) -->
                <div class="flex justify-center mt-4 space-x-2">
                    <template x-for="i in pagesCount" :key="`dot-${i}`">
                        <button x-on:click="goTo(i-1)" class="w-3 h-3 rounded-full transition-colors"
                            :class="{ 'bg-blue-600': current === (i - 1), 'bg-gray-300': current !== (i - 1) }"
                            :aria-label="`Go to page ${i}`"></button>
                    </template>
                </div>
            </div>



            <div class="flex flex-col md:flex-row gap-12">
                <div class="order-2 md:order-1 grow">
                    <h2 class="text-3xl font-bold">Room Details</h2>
                    <hr class="mb-3 border-1 border-gray-200" />
                    <div class="grid grid-cols-2 gap-x-4 gap-y-4 leading-5">
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                house
                            </span>
                            {{ ucwords($room->room_detail->details['room']) }} Room
                        </div>

                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                hotel
                            </span>
                            {{ ucwords($room->room_detail->details['bed']) }} Bed
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                air
                            </span>
                            {{ $room->room_detail->details['aircon'] ? '' : 'No ' }} Air Conditioning with scheduled
                            servicing
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                window
                            </span>
                            {{ $room->room_detail->details['window'] ? '' : 'No ' }} Window
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                desk
                            </span>
                            {{ $room->room_detail->details['furnishings'] ? '' : 'No ' }} Fully furnished with bed, desk,
                            chair & storage space
                        </div>
                    </div>







                    <h2 class="mt-12 text-3xl font-bold">Property Amenities</h2>
                    <hr class="mb-3 border-1 border-gray-200" />
                    <div class="grid grid-cols-2 gap-x-4 gap-y-4 leading-5">
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                wifi
                            </span>
                            {{ $room->property->amenities['wi-fi'] ? '' : 'No ' }} High Speed Wi-Fi
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                cleaning_services
                            </span>
                            {{ $room->property->amenities['cleaning'] ? '' : 'No ' }} Weekly cleaning of all shared spaces
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                microwave
                            </span>
                            {{ $room->property->amenities['microwave'] ? '' : 'No ' }} Microwave
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                cooking
                            </span>
                            {{ $room->property->amenities['induction'] ? '' : 'No ' }} Induction Cooker
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                local_laundry_service
                            </span>
                            {{ $room->property->amenities['washer'] ? '' : 'No ' }} Washer
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                laundry
                            </span>
                            {{ $room->property->amenities['dryer'] ? '' : 'No ' }} Dryer
                        </div>
                        <div class="flex gap-2 items-center">
                            <span class="material-symbols-outlined text-gray-500">
                                kitchen
                            </span>
                            {{ $room->property->amenities['refrigerator'] ? '' : 'No ' }} Refrigerator
                        </div>
                    </div>



                    <h2 class="mt-12 text-3xl font-bold">Rent Details</h2>
                    <hr class="mb-3 border-1 border-gray-200" />

                    <div class="flex gap-2 items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
                            class="size-4 text-gray-500 flex-none">
                            <path
                                d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                            </path>
                        </svg>
                        Monthly rent: S${{ $room->price_month }} (includes utilities S${{ $room->utilities }})
                    </div>
                    <div class="flex gap-2 items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
                            class="size-4 text-gray-500 flex-none">
                            <path
                                d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                            </path>
                        </svg>
                        Security deposit: 1 month
                    </div>
                    <div class="flex gap-2 items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
                            class="size-4 text-gray-500 flex-none">
                            <path
                                d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                            </path>
                        </svg>
                        Payment options: Monthly
                    </div>



                    <h2 class="mt-12 text-3xl font-bold">Location</h2>
                    <hr class="mb-3 border-1 border-gray-200" />

                    <div class="flex-grow w-full h-[480px] [&>iframe]:w-full [&>iframe]:h-full">
                        {!! $room->property->map_embed !!}
                    </div>
                </div>


                <div
                    class="self-center md:self-start md:sticky md:top-8 order-1 md:order-2 md:w-[350px] bg-gray-200 p-4 pb-8 rounded-xl">
                    <h2 class="text-3xl font-bold mb-3">{{ $room->property->property_name }}, <span
                            class="whitespace-nowrap">{{ $room->room_number }}</span></h2>

                    <div class="flex gap-3">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-location" viewBox="0 0 32 32"
                                fill="currentColor" class="size-6 text-gray-500 flex-none">
                                <path
                                    d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z">
                                </path>
                            </svg>
                            {{ $room->property->district->district_name }} (D{{ $room->property->district->id }})
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"
                                class="size-6 text-gray-500 flex-none">
                                <path
                                    d="M32 18.451l-16-12.42-16 12.42v-5.064l16-12.42 16 12.42zM28 18v12h-8v-8h-8v8h-8v-12l12-9z">
                                </path>
                            </svg>
                            {{ $room->property->property_type }}
                        </div>
                    </div>

                    <div class="flex items-center">
                        <span
                            class="font-['Afacad'] text-gold-dark font-bold text-5xl my-4 mr-1">S${{ $room->price_month }}</span>
                        / month
                    </div>

                    <a href="#"
                        class="group self-start px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">Book
                        Now
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
                </div>
            </div>


        </div>


    </div>
@endsection
