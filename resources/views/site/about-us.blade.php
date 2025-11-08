@extends('site.layout')

@section('content')
    <div class="bg-stone-100">

        <div class="relative h-[280px] overflow-hidden">
            <h1
                class="z-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-6xl font-bold text-center w-full max-w-2xl drop-shadow-md/50">
                About Cohome SG
            </h1>
            <img src="/web/images/434788F7-165F-4E32-8615-925597CEC34B-1536x1152.jpg" alt=""
                class="w-full h-full object-cover blur-[2px] brightness-[0.75]">
        </div>

        <div class="pt-12 flex flex-col max-w-[1195px] mx-auto">
            <div class="flex gap-8 mb-12">
                <img src="/web/images/imagen-4.0-generate-preview-06-06_2_happy_man_working_-1-300x300.png" alt=""
                    class="w-[362px] h-[362px]">
                <div>
                    <h2 class="text-4xl font-bold mt-8 mb-4">Who We Are</h2>
                    <p>
                        We believe that a home is more than four walls—it’s where comfort meets connection. Our mission is
                        to make city
                        living easier, smarter, and more meaningful through modern co-living spaces that combine
                        affordability,
                        flexibility, and community.
                    </p>
                    <p class="mt-4">
                        Whether you’re a young professional looking for a furnished room near work, a digital nomad needing
                        flexibility,
                        or a landlord wanting a reliable property partner, we bring everyone together under one
                        roof—literally.
                    </p>
                </div>
            </div>
            <div class="flex gap-8 mb-12">
                <div>
                    <h2 class="text-4xl font-bold mt-8 mb-4">Our Mission</h2>
                    <p>
                        To redefine the way people rent by creating co-living communities that offer convenience,
                        connection, and care, while helping landlords maximize returns with hassle-free property management.
                    </p>
                    <h2 class="text-4xl font-bold mt-8 mb-4">Our Vision</h2>
                    <p>
                        A world where renting is simple, transparent, and community-driven—where every tenant feels at home,
                        and every landlord feels confident.
                    </p>
                </div>
                <img src="/web/images/imagen-4.0-generate-preview-06-06_3_young_female_asian-1.png" alt=""
                    class="w-[362px] h-[362px]">
            </div>
            <div>
                <h2 class="text-4xl font-bold my-4">What We Offer</h2>

                <div class="flex gap-8">
                    <div class="p-8 bg-white flex flex-col gap-y-4 rounded-lg drop-shadow-md">
                        <h3 class="text-3xl font-semibold">For Tenants</h3>

                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Hassle-Free Move-Ins</p>
                                Fully furnished rooms, utilities, Wi-Fi, and cleaning included.
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Flexibility</p>
                                Short or long stays that adapt to your lifestyle.
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Comfort</p>
                                Regular general area cleaning ensure a stress-free living environment.
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Community</p>
                                Meet like-minded people through shared spaces and events.
                            </div>
                        </div>
                    </div>
                    <div class="p-8 bg-white flex flex-col gap-y-4 rounded-lg drop-shadow-md">
                        <h3 class="text-3xl font-semibold">For Landlords</h3>

                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Higher Yields</p>
                                Optimized rental income through co-living.
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Professional Management</p>
                                From tenant sourcing to maintenance, we handle it all!
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Property Care</p>
                                Regular servicing and cleaning protect the long-term value of your asset.
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" id="icon-checkmark" viewBox="0 0 32 32"
                                fill="currentColor" class="w-6 h-6 text-[#0e946b]">
                                <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                            </svg>
                            <div>
                                <p class="font-bold">Transparency</p>
                                Predictable income, and peace of mind.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-20 mx-auto text-center">
                <h2 class="text-4xl font-bold">Testimonials From Our Residents</h2>
                Real stories from people who found their perfect co-living home with us!
            </div>
        </div>
    </div>
@endsection
