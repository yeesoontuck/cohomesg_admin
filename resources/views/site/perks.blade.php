@extends('site.layout')

@section('head')
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="bg-white">

        <div class="relative h-[250px] overflow-hidden">
            <div
                class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-4 w-full items-center">
                <h1 class="text-white text-6xl font-bold text-center w-full drop-shadow-md/50">
                    Co-living perks in Singapore
                </h1>
                <div class="text-white text-2xl">
                    More Than Just a Home
                </div>
            </div>
            <img src="/web/images/students.jpg" alt="" class="w-full h-full object-cover blur-[2px] brightness-[0.60]">
        </div>

        <div class="pt-12 flex flex-col max-w-[1195px] mx-auto">

            <a href="#" class="aspect-square flex rounded-md overflow-hidden hover:opacity-80 transition-opacity w-120"
                x-data="{ url: '/web/images/Nana-Smith-Bunk-Bed-4.jpg', thumb: '/web/images/Nana-Smith-Bunk-Bed-4.jpg' }" x-lightbox="url">
                <img class="flex-1 object-cover object-center" :src="thumb" alt="">
            </a>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-6" x-data="{
                items: [{
                        url: 'https://www.youtube.com/embed/7yLxxyzGiko?autoplay=1&mute=1',
                        thumb: 'https://i.ytimg.com/vi/7yLxxyzGiko/hq720.jpg',
                        type: 'embed',
                    },
                    {
                        url: './assets/6.mp4',
                        thumb: './assets/6-thumb.jpg',
                        type: 'video',
                        autoplay: true,
                        muted: true,
                    },
                    {
                        url: './assets/7.jpg',
                        thumb: './assets/7-thumb.jpg',
                        alt: 'Black & white cat on a bright yellow background',
                    },
                    {
                        url: './assets/8.jpg',
                        thumb: './assets/8-thumb.jpg',
                        alt: 'Close-up shot of a tabby cat\'s face',
                    },
                ],
            }">
                <template x-for="item in items">
                    <a href="#"
                        class="aspect-square flex rounded-md overflow-hidden hover:opacity-80 transition-opacity"
                        x-lightbox="item" x-lightbox:group="config">
                        <img class="flex-1 object-cover object-center" :src="item.thumb" :alt="item.alt">
                    </a>
                </template>
            </div>

            <div class="badscript text-3xl text-gray-600 text-center">more perks coming soon~</div>

            {{-- How Our Privileges Make Co-living More Convenient --}}
            <div class="my-14 p-12 bg-[#F7F7F7] rounded-3xl">
                <div class="flex flex-col items-center">
                    <h2 class="text-4xl font-bold">
                        How Our Privileges Make Co-living More Convenient
                    </h2>
                    <p class="text-center">
                        Co-living is more than shared spaces; it’s a lifestyle that integrates convenience, community,<br />
                        and care. Our residents enjoy perks that help manage daily routines efficiently, including:
                    </p>
                </div>

                <div class="flex items-center gap-8 mt-8 mb-12">
                    <div class="p-8 rounded-xl shadow-xl bg-white h-[240px]">
                        <div class="inline-block p-2 bg-white border-2 border-gold-dark rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold-dark h-6 w-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl leading-6 font-bold my-3">Exclusive partner discounts</h2>
                        <p>
                            on essential services
                        </p>
                    </div>
                    <div class="p-8 rounded-xl shadow-xl bg-white h-[240px]">
                        <div class="inline-block p-2 bg-white border-2 border-gold-dark rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold-dark h-6 w-6"
                                viewBox="0 0 640 512">
                                <path
                                    d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 352h8.2c32.3-39.1 81.1-64 135.8-64c5.4 0 10.7 .2 16 .7V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM320 352H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H360.2C335.1 449.6 320 410.5 320 368c0-5.4 .2-10.7 .7-16l-.7 0zm320 16a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zM496 288c8.8 0 16 7.2 16 16v48h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V304c0-8.8 7.2-16 16-16z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl leading-6 font-bold my-3">Time-saving home solutions</h2>
                        <p>
                            for laundry and furniture
                        </p>
                    </div>
                    <div class="p-8 rounded-xl shadow-xl bg-white h-[240px]">
                        <div class="inline-block p-2 bg-white border-2 border-gold-dark rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold-dark h-6 w-6"
                                viewBox="0 0 640 512">
                                <path
                                    d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl leading-6 font-bold my-3">Trusted local providers</h2>
                        <p>
                            that understand Singapore living
                        </p>
                    </div>
                    <div class="p-8 rounded-xl shadow-xl bg-white h-[240px]">
                        <div class="inline-block p-2 bg-white border-2 border-gold-dark rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold-dark h-6 w-6"
                                viewBox="0 0 576 512">
                                <path
                                    d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl leading-6 font-bold my-3">Stress-free management</h2>
                        <p>
                            of everyday chores
                        </p>
                    </div>
                </div>
            </div>

            {{-- Join Our Co-living Community and Enjoy Exclusive Perks! --}}
            <div class="relative h-[500px] overflow-hidden mb-20 rounded-3xl">
                <div
                    class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-4 w-full items-center">
                    <h1 class="text-white text-4xl font-bold text-center w-full drop-shadow-md/50">
                        Join Our Co-living Community and Enjoy Exclusive Perks!
                    </h1>
                    <div>
                        <a href="#"
                            class="group self-start px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">Find
                            Your Home
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
                <img src="/web/images/expat_b.jpg" alt=""
                    class="w-full h-full object-cover blur-[2px] brightness-[0.50]">
            </div>
        </div>
    </div>
@endsection
