@extends('site.layout')

@section('content')
    <div class="bg-white">

        <div class="relative h-[250px] overflow-hidden">
            <div
                class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col gap-4 w-full items-center">
                <h1 class="text-white text-2xl md:text-4xl font-bold text-center w-full drop-shadow-md/50">
                    Partner with Us to Turn Your Extra Space into Extra Income! 💰
                </h1>
            </div>
            <img src="/web/images/B9F63756-F809-4D41-A426-14A63CCC1F91_banner.jpg" alt=""
                class="w-full h-full object-cover brightness-[0.60] scale-105 blur-[2px]">
        </div>


        <div class="px-4 pt-12 flex flex-col max-w-[1195px] mx-auto">

            <div class="flex flex-col items-center">
                <p class="mb-8">Are you a property owner looking for a smarter, more profitable way to manage your real
                    estate assets?
                </p>

                <p class="mb-8">The future of residential property is here, and it's built on community, convenience, and
                    superior
                    returns.</p>

                <p class="mb-8">We invite discerning coliving landlords to join our growing network and experience the
                    simplicity of
                    passive, guaranteed income!</p>
            </div>

            <div class="p-12 bg-[#EFEFEF] rounded-3xl text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-10">Why List Your Property with CoHome SG</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
                    <div>
                        <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-happy2" viewBox="0 0 32 32" fill="currentColor"
                                class="text-gold h-6 w-6">
                                <path
                                    d="M16 0c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zM22 8c1.105 0 2 1.343 2 3s-0.895 3-2 3-2-1.343-2-3 0.895-3 2-3zM10 8c1.105 0 2 1.343 2 3s-0.895 3-2 3-2-1.343-2-3 0.895-3 2-3zM16 28c-5.215 0-9.544-4.371-10-9.947 2.93 1.691 6.377 2.658 10 2.658s7.070-0.963 10-2.654c-0.455 5.576-4.785 9.942-10 9.942z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-2">Zero Management Hassle</h3>

                        <p class="text-sm">
                            We handle every aspect of property operation, including tenant screening, rent collection,
                            maintenance, cleaning, and community events. Your time is completely freed up.
                        </p>
                    </div>
                    <div>
                        <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                viewBox="0 0 576 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-2">Higher Revenue Potential</h3>

                        <p class="text-sm">
                            By renting rooms individually in a coliving arrangement, your property moves from a
                            single-tenant income stream to a multiple-tenant income stream, significantly boosting your
                            overall rental yield.</p>
                    </div>
                    <div>
                        <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-2">Passive Income</h3>

                        <p class="text-sm">
                            We take on the management and leasing risk. You receive a consistent, guaranteed payment
                            monthly, transforming your property into a truly hands-off asset.</p>
                    </div>
                    <div>
                        <div class="inline-block p-4 bg-white border-2 border-gold rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gold h-6 w-6"
                                viewBox="0 0 640 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M335.5 4l288 160c15.4 8.6 21 28.1 12.4 43.5s-28.1 21-43.5 12.4L320 68.6 47.5 220c-15.4 8.6-34.9 3-43.5-12.4s-3-34.9 12.4-43.5L304.5 4c9.7-5.4 21.4-5.4 31.1 0zM320 160a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM144 256a40 40 0 1 1 0 80 40 40 0 1 1 0-80zm312 40a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM226.9 491.4L200 441.5V480c0 17.7-14.3 32-32 32H120c-17.7 0-32-14.3-32-32V441.5L61.1 491.4c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l37.9-70.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c16.3 0 31.9 4.5 45.4 12.6l33.6-62.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c32.4 0 62.1 17.8 77.5 46.3l33.6 62.3c13.5-8.1 29.1-12.6 45.4-12.6h19.5c32.4 0 62.1 17.8 77.5 46.3l37.9 70.3c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8L552 441.5V480c0 17.7-14.3 32-32 32H472c-17.7 0-32-14.3-32-32V441.5l-26.9 49.9c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l36.3-67.5c-1.7-1.7-3.2-3.6-4.3-5.8L376 345.5V400c0 17.7-14.3 32-32 32H296c-17.7 0-32-14.3-32-32V345.5l-26.9 49.9c-1.2 2.2-2.6 4.1-4.3 5.8l36.3 67.5c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-2">Reduced Vacancy Risk</h3>

                        <p class="text-sm">
                            Our professional marketing and community-focused approach ensures high occupancy rates. Even if
                            one room is vacant, the income from the others stabilizes your revenue, unlike a traditional
                            unit vacancy.</p>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <div class="mb-20 p-10 border-2 border-gold rounded-2xl shadow-lg">
                <h2 class="text-3xl font-bold">List Your Property Now</h2>
                <p>Start earning more with co-living.<br />Fill out the form and our team will get back to you within 24
                    hours.
                </p>

                <form action="#" method="POST" class="mt-12 w-full">
                    @csrf

                    <div class="flex gap-4 md:gap-8 w-full flex-wrap">
                        <div class="flex flex-1 min-w-xs flex-col gap-1">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-black">First Name</label>
                            <input id="textInputDefault" type="text"
                                class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                                name="name" placeholder="John" autocomplete="first name" required />
                        </div>
                        <div class="flex flex-1 min-w-xs flex-col gap-1">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-black">Last Name</label>
                            <input id="textInputDefault" type="text"
                                class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                                name="name" placeholder="Smith" autocomplete="last name" required />
                        </div>
                    </div>

                    <div class="flex w-full flex-col gap-1 mt-4">
                        <label for="textInputDefault" class="w-fit pl-0.5 text-black">Email</label>
                        <input id="textInputDefault" type="email"
                            class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                            name="name" placeholder="john@example.com" autocomplete="email" required />
                    </div>

                    <div class="flex w-full flex-col gap-1 mt-4">
                        <label for="textArea" class="w-fit pl-0.5 text-black">Comment</label>
                        <textarea id="textArea"
                            class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                            rows="3" placeholder="We'd love to hear from you..." required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full md:w-auto mt-4 whitespace-nowrap rounded-md bg-indigo-700 border border-indigo-700 px-12 py-2 font-medium tracking-wide text-slate-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-indigo-600 dark:border-indigo-600 dark:text-slate-100 dark:focus-visible:outline-indigo-600">
                        Let's talk</button>
                </form>
            </div>
        </div>


    </div>
@endsection
