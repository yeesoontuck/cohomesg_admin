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
                    <div class="grid grid-cols-2 gap-x-4 gap-y-2">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M32 18.451l-16-12.42-16 12.42v-5.064l16-12.42 16 12.42zM28 18v12h-8v-8h-8v8h-8v-12l12-9z">
                                </path>
                            </svg>
                            {{ ucwords($room->room_detail->details['room']) }} Room
                        </div>

                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z">
                                </path>
                            </svg>
                            {{ ucwords($room->room_detail->details['bed']) }} Bed
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M288 32c0 17.7 14.3 32 32 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c53 0 96-43 96-96s-43-96-96-96H320c-17.7 0-32 14.3-32 32zm64 352c0 17.7 14.3 32 32 32h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-17.7 0-32 14.3-32 32zM128 512h32c53 0 96-43 96-96s-43-96-96-96H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H160c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32 14.3-32 32s14.3 32 32 32z">
                                </path>
                            </svg>
                            {{ $room->room_detail->details['aircon'] ? '' : 'No ' }} Aircon
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M0 93.7l183.6-25.3v177.4H0V93.7zm0 324.6l183.6 25.3V268.4H0v149.9zm203.8 28L448 480V268.4H203.8v177.9zm0-380.6v180.1H448V32L203.8 65.7z">
                                </path>
                            </svg>
                            {{ $room->room_detail->details['window'] ? '' : 'No ' }} Window
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="size-4 text-gray-500 flex-none" viewBox="0 0 448 512">
                                <path
                                    d="M248 48V256h48V58.7c23.9 13.8 40 39.7 40 69.3V256h48V128C384 57.3 326.7 0 256 0H192C121.3 0 64 57.3 64 128V256h48V128c0-29.6 16.1-55.5 40-69.3V256h48V48h48zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32V384H352v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288H48z">
                                </path>
                            </svg>
                            {{ $room->room_detail->details['furnishings'] ? '' : 'No ' }} Table &amp; Chair
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



                    <h2 class="mt-12 text-3xl font-bold">Property Amenities</h2>
                    <hr class="mb-3 border-1 border-gray-200" />
                    <div class="grid grid-cols-2 gap-x-4 gap-y-2">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                                </path>
                            </svg>
                            {{ $room->property->amenities['wi-fi'] ? '' : 'No ' }} High Speed Wi-Fi
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 115.82 191.25" fill="currentColor" fill="currentColor"
                                class="size-4 text-gray-500 flex-none">
                                <path
                                    d="M82.27,117.85c5.66,21.64,14.23,40.13,31.7,54.72-2.46,2.77-5.09,5.61-8.37,7.42-12.53,6.95-7.98-4.72-16.6-8.98l-.07,15.71-20.11,2.76-11.15-24.77-3.24,25.13-25-3.11,3.13-12.56c-8.13-2.67-7.92,9.38-11.23,9.61-3.82.26-20.04-7.85-20.02-11.21,17.7-14.22,24.95-33.92,34.34-53.65l46.6-1.08Z" />
                                <path
                                    d="M65.29,85.88c.42.98,15.62,9.18,16.32,9.94,2.07,2.26-.17,11.26.52,15.27h-46.43c-8.79-16.19,16.14-23.43,16.14-25.22V5.5l7.07-4.67,6.37,4.67v80.38Z" />
                            </svg>
                            {{ $room->property->amenities['cleaning'] ? '' : 'No ' }} Weekly cleaning of all shared spaces
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg width="100%" height="100%" viewBox="0 0 339 341" version="1.1" fill="currentColor"
                                stroke="currentColor" class="size-4 text-gray-500 flex-none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                                <path
                                    d="M320.279,84.697l0,170.355c0,11.249 -9.133,20.382 -20.382,20.382l-257.026,0c-11.249,0 -20.382,-9.133 -20.382,-20.382l0,-170.355c0,-11.249 9.133,-20.382 20.382,-20.382l257.026,0c11.249,0 20.382,9.133 20.382,20.382Z"
                                    style="fill:none;stroke-width:20.35px;" />
                                <path d="M244.5,64.315l0,211.119"
                                    style="fill:none;stroke-width:24px;stroke-linecap:butt;" />
                                <circle cx="284.25" cy="228.75" r="21" style="fill:#1e3050;" />
                            </svg>
                            {{ $room->property->amenities['microwave'] ? '' : 'No ' }} Microwave
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg width="100%" height="100%" viewBox="0 0 339 341" version="1.1" fill="currentColor"
                                stroke="currentColor" class="size-4 text-gray-500 flex-none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                                <path
                                    d="M320.279,64.705l0,210.34c0,24.536 -19.92,44.455 -44.455,44.455l-208.88,0c-24.536,0 -44.455,-19.92 -44.455,-44.455l-0,-210.34c0,-24.536 19.92,-44.455 44.455,-44.455l208.88,0c24.536,0 44.455,19.92 44.455,44.455Z"
                                    style="fill:none;stroke-width:24px;" />
                                <circle cx="171.384" cy="143.25" r="76.875" style="fill:none;stroke-width:24px;" />
                                <rect x="79.505" y="258.75" width="183.759" height="19.5"
                                    style="fill:none;stroke-width:24px;" />
                            </svg>
                            {{ $room->property->amenities['induction'] ? '' : 'No ' }} Induction Cooker
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg width="100%" height="100%" viewBox="0 0 143 161" version="1.1" fill="currentColor"
                                stroke="currentColor" class="size-4 text-gray-500 flex-none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.5;">
                                <g>
                                    <path
                                        d="M114.375,155.276c-3.486,-0.12 -83.874,-0.018 -88.501,-0.052c-14.473,-0.106 -20.135,-10.418 -20.242,-19.848c-0.007,-0.592 -0.007,-109.658 0,-110.25c0.151,-13.271 9.994,-20.045 20.244,-19.9c9.887,0.14 89.122,-0.014 92.271,0.072c9.89,0.27 17.345,7.742 18.414,16.119c0.351,2.747 0.312,2.74 0.312,97.459c-0,18.513 0.67,23.458 -4.362,29.362c-6.046,7.093 -12.626,7.032 -18.135,7.039Z" />
                                    <path
                                        d="M127.474,94.875c0,42.376 0.022,42.385 -0.165,43.535c-1.131,6.967 -8.243,7.374 -9.186,7.428c-0.652,0.037 -0.637,0.034 -89.248,0.034c-3.298,-0 -11.361,1.02 -13.509,-6.745c-0.382,-1.383 -0.341,-1.397 -0.341,-87.002c0,-28.854 -0.026,-28.862 0.165,-30.035c1.13,-6.967 8.243,-7.374 9.186,-7.428c0.652,-0.037 0.637,-0.034 89.248,-0.034c3.322,0 11.361,-1.015 13.509,6.745c0.383,1.383 0.341,1.401 0.341,73.502Z"
                                        style="fill:#fefefe;" />
                                </g>
                                <circle cx="36.231" cy="33.399" r="6.867" />
                                <circle cx="59.354" cy="33.399" r="6.867" />
                                <path
                                    d="M71.249,57c20.697,0 37.5,16.803 37.5,37.5c0,20.697 -16.803,37.5 -37.5,37.5c-20.697,0 -37.5,-16.803 -37.5,-37.5c0,-20.697 16.803,-37.5 37.5,-37.5Zm-37.5,29.25c0,0 10.733,-3.125 15.751,-1.5c8.875,2.875 27.625,15.75 37.5,18.75c6.941,2.109 21.749,-0.75 21.749,-0.75"
                                    style="fill:none;stroke-width:9.5px;" />
                            </svg>
                            {{ $room->property->amenities['washer'] ? '' : 'No ' }} Washer
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg width="100%" height="100%" viewBox="0 0 140 160" version="1.1" fill="currentColor"
                                stroke="currentColor" class="size-4 text-gray-500 flex-none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                                <path
                                    d="M69.75,52.5c19.869,0 36,16.131 36,36c0,19.869 -16.131,36 -36,36c-19.869,0 -36,-16.131 -36,-36c0,-19.869 16.131,-36 36,-36Zm-11.625,36l-17.625,0"
                                    style="fill:none;stroke-width:14px;" />
                                <circle cx="58.125" cy="34.125" r="7.125" />
                                <circle cx="34.875" cy="34.125" r="7.125" />
                                <path
                                    d="M129,21.829l0,114.592c0,5.839 -4.74,10.579 -10.579,10.579l-96.592,0c-5.839,0 -10.579,-4.74 -10.579,-10.579l0,-114.592c0,-5.839 4.74,-10.579 10.579,-10.579l96.592,0c5.839,0 10.579,4.74 10.579,10.579Z"
                                    style="fill:none;stroke-width:13px;" />
                            </svg>
                            {{ $room->property->amenities['dryer'] ? '' : 'No ' }} Dryer
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg width="100%" height="100%" viewBox="0 0 384 384" version="1.1" fill="currentColor"
                                stroke="currentColor" class="size-4 text-gray-500 flex-none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve" xmlns:serif="http://www.serif.com/"
                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                                <g>
                                    <path
                                        d="M105.375,0l173.25,0c0.33,0.166 0.484,0.587 0.814,0.753c0.108,0.054 0.141,-0.185 1.499,0.167c7.392,1.916 11.234,5.447 12.016,6.109c0.107,0.09 10.177,7.392 10.736,21.824c0.244,6.303 -4.95,7.322 -7.082,6.854c-5.216,-1.145 -4.991,-6.785 -5.083,-7.599c-0.687,-6.111 -5.071,-14.491 -15.89,-15.821c-1.59,-0.195 -1.598,-0.174 -150.01,-0.174c-16.133,-0 -19.572,-0.375 -24.107,2.317c-9.265,5.501 -9.202,13.545 -9.204,18.196c-0.003,8.52 -0.037,102.219 0,106.506c0.011,1.31 -0.147,1.607 1.103,2.008c0.112,0.036 0.114,0.032 186.708,0.032c10.645,0 10.778,0.092 11.31,-0.504c0.251,-0.281 0.251,-2.798 0.251,-3.042c0.007,-87.639 -0.056,-87.647 0.182,-89.3c0.955,-6.659 12.196,-7.255 11.931,2.303c-0.056,2.006 -0.05,2.006 -0.05,271.498c0,5.869 0.708,13.147 -4.373,21.607c-4.563,7.597 -12.101,11.118 -12.5,11.394c-2.51,1.741 1.686,14.612 -3.558,21.878c-3.926,5.44 -7.945,5.905 -8.344,6.167c-0.33,0.217 -0.519,0.611 -0.85,0.828l-20.25,-0c-0.334,-0.194 -0.536,-0.57 -0.87,-0.764c-0.207,-0.12 -0.472,-0.086 -0.703,-0.149c-0.244,-0.066 -2.631,-0.881 -4.491,-2.38c-8.487,-6.842 -5.776,-15.452 -6.253,-21.064c-0.013,-0.157 -0.117,-1.376 -1.172,-1.579c-0.515,-0.099 -68.14,0.049 -69.748,-0.08c-8.139,-0.655 -8.189,-10.638 -0.78,-11.963c0.885,-0.158 0.895,-0.141 98.268,-0.141c6.795,-0 14.288,0.797 20.47,-7.857c3.569,-4.997 3.091,-11.842 3.092,-12.147c0,-56.5 0,-113 0,-169.5c-0.007,-2.146 0.342,-2.957 -1.81,-3.029c-0.42,-0.014 -116.611,-0.002 -126.751,-0.001c-2.231,0 -2.827,0.053 -2.846,2.282c-0.003,0.417 -0.024,2.925 -0.412,5.199c-0.436,2.554 -2.883,9.946 -11.689,12.247c-2.139,0.559 -2.17,0.491 -43.553,0.491c-11.478,-0 -11.807,-0.134 -12.149,0.739c-0.164,0.419 -0.147,0.428 -0.147,147.073c-0,4.823 -0.934,13.003 5.098,19.206c0.657,0.676 3.681,3.201 6.415,4.137c5.62,1.923 5.79,0.966 45.035,1.162c8.635,0.043 7.995,7.072 6.645,9.182c-3.204,5.008 -10.801,2.028 -12.525,3.237c-1.064,0.746 -0.295,6.929 -0.649,11.099c-0.614,7.234 -5.672,11.136 -7.007,11.926c-3.453,2.041 -3.684,1.534 -4.343,1.915c-0.334,0.193 -0.538,0.568 -0.872,0.761l-20.25,0c-0.33,-0.217 -0.519,-0.611 -0.85,-0.828c-0.026,-0.017 -1.19,-0.168 -3.726,-1.673c-3.419,-2.029 -6.584,-6.65 -7.096,-10.67c-0.687,-5.394 0.257,-14.142 -0.701,-15.389c-0.803,-1.045 -5.573,-2.051 -11.385,-9.5c-2.279,-2.921 -4.363,-7.836 -4.921,-10.271c-1.079,-4.711 -0.945,-4.755 -0.945,-32.294c0,-257.59 0.02,-266.942 -0.05,-272.248c-0.09,-6.752 1.896,-11.664 2.28,-12.615c1.42,-3.512 4.028,-6.837 4.454,-7.379c2.152,-2.743 5.698,-5.375 6.244,-5.781c0.337,-0.25 3.49,-2.321 6.255,-3.303c4.617,-1.641 4.749,-1.105 5.127,-1.295c0.33,-0.166 0.484,-0.587 0.814,-0.753l39.68,161.287c1.181,-0.508 1.341,-0.294 2.149,-1.301c1.105,-1.377 1.166,-5.426 0.484,-6.15c-0.629,-0.669 -2.129,-0.491 -3.313,-0.491c-50.819,-0.003 -50.812,0.011 -50.996,0.05c-1.154,0.246 -1.112,1.033 -1.065,5.986c0.012,1.295 -0.138,1.597 1.105,1.987c0.096,0.03 1.34,0.03 1.456,0.031c46.182,0.019 46.176,0.176 50.18,-0.112l-39.68,-161.287l167.608,370.421c0.973,-1.562 0.929,-1.656 0.916,-9.296c-0.004,-2.261 0.234,-3.07 -2.022,-3.093c-2.121,-0.021 -13.801,-0.002 -15.001,-0c-2.03,0.003 -3.191,-0.434 -3.201,2.341c-0.033,9.114 -0.591,11.501 5.45,11.514c11.771,0.027 11.814,-0.033 12.65,-0.477c0.822,-0.436 1.154,-0.945 1.209,-0.99l-167.608,-370.421l5.65,370.417c0.04,0.033 0.406,0.561 1.204,0.99c0.832,0.447 0.876,0.507 12.647,0.48c6.046,-0.014 5.483,-2.44 5.45,-11.514c-0.01,-2.775 -1.17,-2.338 -3.201,-2.341c-1.2,-0.002 -12.881,-0.021 -15.001,0c-2.257,0.023 -2.018,0.832 -2.022,3.093c-0.013,7.64 -0.058,7.736 0.924,9.292l-5.65,-370.417Z"
                                        style="fill-opacity:1;" />
                                    <path
                                        d="M276.107,170.994c2.85,2.524 2.488,3.07 2.488,19.131c0,102.088 0.022,102.099 -0.184,103.459c-1.06,7.013 -11.54,7.369 -11.974,-1.452c-0.018,-0.369 -0.017,-0.359 -0.016,-111.757c0,-3.81 -0.595,-8.894 4.742,-10.343c2.601,-0.706 4.809,0.888 4.944,0.962Z"
                                        style="fill-opacity:1;" />
                                    <path
                                        d="M268.586,30.042c0.089,-0.068 0.93,-0.974 2.487,-1.374c0.293,-0.075 1.86,-0.477 3.768,0.286c4.375,1.751 3.754,7.439 3.754,8.921c0,79.123 -0.001,79.122 -0.011,79.499c-0.188,7.628 -6.876,7.868 -9.566,5.8c-2.094,-1.609 -2.321,-3.686 -2.443,-4.291c-0.173,-0.857 -0.154,-0.854 -0.154,-72.758c-0,-13.083 -0.279,-13.461 2.164,-16.083Z"
                                        style="fill-opacity:1;" />
                                    <path
                                        d="M129.112,49.496c4.518,3.871 2.657,10.609 -4.235,10.925c-1.726,0.079 -1.739,-0.002 -2.149,0.181c-0.866,0.388 -0.726,0.695 -0.726,11.023c0,32.145 0.017,32.15 -0.132,32.999c-0.158,0.897 -0.284,2.487 -1.987,4.039c-3.292,2.998 -9.856,2.058 -10.067,-5.537c-0.003,-0.125 -0.026,-47.3 0.012,-48.003c0.421,-7.715 6.417,-6.919 13.547,-6.874c3.106,0.019 3.77,0.215 5.737,1.248Z"
                                        style="fill-opacity:1;" />
                                    <path
                                        d="M268.548,320.994c-1.482,-1.626 -2.168,-2.241 -2.124,-7.121c0.074,-8.085 7.548,-8.75 10.615,-5.175c2.647,3.086 1.226,9.416 1.126,9.764c-0.76,2.625 -3.488,4.17 -5.545,4.111c-2.804,-0.081 -4.052,-1.563 -4.072,-1.578Z"
                                        style="fill-opacity:1;" />
                                </g>
                            </svg>
                            {{ $room->property->amenities['refrigerator'] ? '' : 'No ' }} Refrigerator
                        </div>
                    </div>



                    <h2 class="mt-12 text-3xl font-bold">Location</h2>
                    <hr class="mb-3 border-1 border-gray-200" />

                    <div class="flex-grow w-full h-[480px] [&>iframe]:w-full [&>iframe]:h-full">
                        {!! $room->property->map_embed !!}
                    </div>
                </div>


                <div class="md:h-70 md:sticky md:top-8 order-1 md:order-2 md:w-[350px] bg-gray-200 p-4 rounded-xl">
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
