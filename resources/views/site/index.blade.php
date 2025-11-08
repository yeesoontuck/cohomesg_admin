<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" :class="{ 'dark': darkMode }" x-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://cohomesg.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Co-living Rooms for Rent in Singapore | CohomeSG" />
    <meta property="og:description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta property="og:url" content="https://cohomesg.com/" />
    <meta property="og:site_name" content="Cohome - Co-living Rooms for Rent in Singapore" />
    <meta property="og:updated_time" content="2025-11-07T08:22:00+00:00" />
    <meta property="article:published_time" content="2025-09-06T11:14:16+00:00" />
    <meta property="article:modified_time" content="2025-11-07T08:22:00+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Co-living Rooms for Rent in Singapore | CohomeSG" />
    <meta name="twitter:description"
        content="No Agent Fees, No Landlords, Utilities Included, Flexible Leases, Weekly Cleaning. Cohome makes co-living in Singapore simple and affordable!" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="admin" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="Less than a minute" />

    <link rel="apple-touch-icon" sizes="180x180" href="/web/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/web/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/web/favicon-16x16.png">
    <link rel="manifest" href="/web/site.webmanifest">

    <title>Co-living Rooms for Rent in Singapore | CohomeSG</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/web.css', 'resources/js/app.js'])
</head>

<body>
    {{-- top banner --}}
    @include('site.banner')


    {{-- navbar --}}
    @include('site.navbar')

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
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-1000 absolute inset-0"
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
        <div class="flex flex-col justify-center">
            <h2 class="text-center text-4xl font-bold" style="font-family:'Abhaya Libre', serif">
                Popular Co-Living Locations in Singapore
            </h2>

            <div class="mt-6 flex gap-4" role="tablist" aria-label="Content tabs" aria-orientation="horizontal"
                data-tabs-id="bde-advanced-tabs-18-555">

                <button role="tab" aria-selected="true" class="text-white bg-[#0079C1] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-1" id="tab-bde-advanced-tabs-18-555-1"
                    data-value="1">
                    <span class="font-semibold">486 Sims Ave</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-2" id="tab-bde-advanced-tabs-18-555-2"
                    data-value="2" tabindex="-1">
                    <span class="font-semibold">262A Tanjong Katong</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-3" id="tab-bde-advanced-tabs-18-555-3"
                    data-value="3" tabindex="-1">
                    <span class="font-semibold">Hillview Green</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-4" id="tab-bde-advanced-tabs-18-555-4"
                    data-value="4" tabindex="-1">
                    <span class="font-semibold">Serenity Park</span>
                </button>
                <button role="tab" aria-selected="false" class="bg-[#E6E6E6] px-4 py-2 rounded-full"
                    aria-controls="tab-panel-bde-advanced-tabs-18-555-5" id="tab-bde-advanced-tabs-18-555-5"
                    data-value="5" tabindex="-1">
                    <span class="font-semibold">Changi Court</span>
                </button>
            </div>


            <div class="my-20">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque dolore minima aperiam soluta odit iure provident
                cum asperiores laudantium molestias illum placeat similique, impedit assumenda, error eligendi temporibus
                obcaecati recusandae nemo. Ut, officia ea recusandae nisi praesentium cupiditate adipisci aspernatur assumenda
                et itaque saepe doloremque quasi voluptas numquam rerum laudantium. Harum ut unde officia culpa minima totam
                facere labore iusto non excepturi reprehenderit, quasi accusamus ipsam? Officiis similique accusantium dolore
                libero, esse at odio temporibus reiciendis possimus minima facilis eveniet numquam saepe officia iste, hic ipsum
                quibusdam maxime non nulla necessitatibus soluta cum! Incidunt qui tempore blanditiis mollitia nisi. Fugit nulla
                error ducimus sequi reprehenderit officia dignissimos deleniti enim ipsam, beatae aspernatur at, odit facilis
                placeat magni incidunt ipsum laborum? Quibusdam distinctio debitis, praesentium accusantium esse, nesciunt
                officiis explicabo quisquam, id facilis aliquam optio sunt quia placeat architecto. Cupiditate aut fugit placeat
                voluptates dolorum! Perferendis maiores ratione totam illum consequatur nisi provident natus vitae iusto
                aperiam. Saepe sed nisi aut nulla reprehenderit ipsum magni iure? Expedita temporibus excepturi exercitationem
                debitis inventore. Harum, odit quibusdam nisi necessitatibus odio fuga provident sapiente earum cupiditate
                officia voluptates assumenda placeat quo eius facilis corporis iste veniam beatae, aperiam nam cum eaque
                voluptate officiis neque! Possimus, voluptas? Illum iusto impedit a dolores. Quos atque et facere minima,
                beatae, id ea sunt distinctio odit ratione quia eveniet consequuntur quaerat natus quas aspernatur quo magni
                iure expedita nam necessitatibus? Mollitia placeat provident vitae, voluptatum neque delectus harum quis
                molestias impedit at! Ipsum earum ab est minus fuga.
            </div>
        </div>



    </div>

    {{-- footer --}}
    @include('site.footer')
</body>

</html>
