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
                class="w-full h-full object-cover brightness-[0.60]">
        </div>


        <div class="px-4 pt-12 flex flex-col max-w-[1195px] mx-auto">

            <div class="mb-16 flex flex-col items-center">
                <h2 class="text-4xl font-bold">How CohomeSG Co-living Can Benefit Landlords</h2>
            </div>

            {{-- form --}}
            <div class="mb-20 p-10 border-2 border-gold rounded-2xl shadow-lg">
                <h2 class="text-3xl font-bold">List Your Property Now</h2>
                <p>Start earning more with co-living.<br />Fill out the form and our team will get back to you within 24 hours.
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
