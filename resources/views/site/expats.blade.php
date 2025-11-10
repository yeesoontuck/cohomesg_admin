@extends('site.layout')

@section('content')
    <div class="bg-white">

        <div class="relative h-[280px] overflow-hidden">
            <div
                class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-4 w-full items-center">
                <h1 class="text-white text-6xl font-bold text-center w-full drop-shadow-md/50">
                    Co-living for Expats &amp; Digital Nomads
                </h1>
                <div>
                    <a href="#"
                        class="group self-start px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">Find
                        Your Nomad Home
                        <div
                            class="flex items-center justify-center w-10 h-10 group-hover:scale-125 duration-300 bg-blue-700 rounded-full ml-4 -mr-2 -ml-2">
                            <svg class="-rotate-45 text-white w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z">
                                </path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
            <img src="/web/images/imagen-4.0-generate-preview-06-06_2_happy_asian_woman_.jpg" alt=""
                class="w-full h-full object-cover blur-[2px] brightness-[0.60]">
        </div>

        <div class="pt-12 flex flex-col max-w-[1195px] mx-auto">

            <div class="my-8 mx-auto text-center">
                <h2 class="text-5xl font-bold">Co-living vs. The Traditional Way</h2>
            </div>
            <div class="mt-8 mb-4 flex flex-col items-center">
                <h2 class="text-4xl font-bold">Benefits of Co-Living for Expats &amp; Digital Nomads</h2>
                We provide beautifully designed, fully-furnished homes crafted specifically for the digital nomad lifestyle
                <div class="my-4 w-[200px] border border-gray-300"></div>
            </div>

            <div class="flex gap-8">
                <div class="basis-full p-12 bg-[#EFEFEF] rounded-3xl">
                    <p class="inline bg-[#D8E9FF] text-xl font-bold px-3 py-1 rounded-full">
                        Work &amp; Productivity
                    </p>

                    <div class="flex flex-col gap-4 mt-8">
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3V152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6V503zM15.1 187.3C6 191 0 199.8 0 209.6V480.4c0 17 17.1 28.6 32.9 22.3L160 451.8V200.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77V449.4l192 54.9V255z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">High-Speed WiFi</h3>
                                <div>Essential for staying connected and productive.</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M0 32V64H320V32c0-17.7-14.3-32-32-32H32C14.3 0 0 14.3 0 32zM24 96H0v24V488c0 13.3 10.7 24 24 24s24-10.7 24-24v-8H272v8c0 13.3 10.7 24 24 24s24-10.7 24-24V120 96H296 24zM256 240v64c0 8.8-7.2 16-16 16s-16-7.2-16-16V240c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">Fully Furnished</h3>
                                <div>Every room comes with essentials like bed, desk, wardrobe and
                                    more.</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 640 512">
                                    <path
                                        d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">24/7 Access</h3>
                                <div>Work on your schedule, regardless of time zones.</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h88.6c-5.4-9.4-8.6-20.3-8.6-32V352c0-23.7 12.9-44.4 32-55.4V272c0-30.5 12.2-58.2 32-78.4V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM464 240c17.7 0 32 14.3 32 32v48H432V272c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H544c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32V272c0-44.2-35.8-80-80-80s-80 35.8-80 80z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">Safe &amp; Secure</h3>
                                <div>Access-controlled buildings, CCTV, and trusted management.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="basis-full p-12 bg-[#EFEFEF] rounded-3xl">
                    <p class="inline bg-[#FBFFD8] text-xl font-bold px-3 py-1 rounded-full">
                        Living &amp; Convenience
                    </p>

                    <div class="flex flex-col gap-4 mt-8">
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">All-Inclusive Rent</h3>
                                <div>Includes utilities (cap at $60/common room, $80/MBR)</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">Flexible Leases</h3>
                                <div>Choose from short-term or long-term stays.</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M302.8 312C334.9 271.9 408 174.6 408 120C408 53.7 354.3 0 288 0S168 53.7 168 120c0 54.6 73.1 151.9 105.2 192c7.7 9.6 22 9.6 29.6 0zM416 503l144.9-58c9.1-3.6 15.1-12.5 15.1-22.3V152c0-17-17.1-28.6-32.9-22.3l-116 46.4c-.5 1.2-1 2.5-1.5 3.7c-2.9 6.8-6.1 13.7-9.6 20.6V503zM15.1 187.3C6 191 0 199.8 0 209.6V480.4c0 17 17.1 28.6 32.9 22.3L160 451.8V200.4c-3.5-6.9-6.7-13.8-9.6-20.6c-5.6-13.2-10.4-27.4-12.8-41.5l-122.6 49zM384 255c-20.5 31.3-42.3 59.6-56.2 77c-20.5 25.6-59.1 25.6-79.6 0c-13.9-17.4-35.7-45.7-56.2-77V449.4l192 54.9V255z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">Prime Locations</h3>
                                <div>Live close to MRT stations, dining, workplaces.</div>
                            </div>
                        </div>
                        <div class="inline-flex gap-6 items-center">
                            <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ee-iconbox-content">
                                <h3 class="text-xl font-bold">Maintenance</h3>
                                <div>Regular aircon servicing and general area cleaning included.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="my-14 p-12 bg-[#EFEFEF] rounded-3xl">
                <div class="flex flex-col items-center">
                    <h2 class="text-4xl font-bold">
                        How It Works
                    </h2>
                    <p class="text-center">Your Journey to a Global Lifestyle Starts Here in 3 Simple Steps</p>
                    <div class="my-4 w-[200px] border border-gray-300"></div>
                </div>

                <div class="flex items-center gap-4 mt-8 mb-12">
                    <div class="p-8 rounded-xl shadow-xl bg-white">
                        <p class="mb-2 font-semibold text-blue-600">01</p>
                        <h2 class="text-4xl font-bold mb-3">Search &amp; Filter</h2>
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
                    <div class="p-8 rounded-xl shadow-xl bg-white">
                        <p class="mb-2 font-semibold text-blue-600">02</p>
                        <h2 class="text-4xl font-bold mb-3">Visit &amp; Decide</h2>
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
                    <div class="p-8 rounded-xl shadow-xl bg-white">
                        <p class="mb-2 font-semibold text-blue-600">03</p>
                        <h2 class="text-4xl font-bold mb-3">Move In</h2>
                        <p>
                            Sign your lease and start enjoying your co-living space!
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative h-[500px] overflow-hidden mb-20 rounded-3xl">
                <div
                    class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-4 w-full items-center">
                    <h1 class="text-white text-5xl font-bold text-center w-full drop-shadow-md/50">
                        Ready for Your Best Remote Life in Singapore?
                    </h1>
                    <div>
                        <a href="#"
                            class="group self-start px-4 py-2 rounded-full bg-white text-black text-lg inline-flex items-center cursor-pointer">Find
                            Your Nomad Home
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
