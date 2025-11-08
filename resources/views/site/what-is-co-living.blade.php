@extends('site.layout')

@section('content')

    <div class="bg-stone-50 pb-20">
        <div class="max-w-[1080px] mx-auto pt-12">
            <div class="flex gap-8">
                <div class="w-[260px] p-4">
                    <div class="sticky top-20" x-data="tocObserver()" x-init="init()">
                        <h3 class="mb-4">Table Of Contents</h3>
                        <ol class="border-l-3 border-gray-200 pl-4 text-gray-500">
                            <template x-for="item in items" :key="item.id">
                                <li class="mb-2">
                                    <a :href="'#' + item.id" x-text="item.title"
                                        class="block text-sm transition-colors"
                                        :class="activeId === item.id ?
                                            'text-gray-600' :
                                            'text-gray-600 hover:text-gray-900'"></a>
                                </li>
                            </template>
                        </ol>
                    </div>
                </div>
                <div class="flex flex-col w-[820px]">
                    <div class="relative flex items-center h-[400px] overflow-hidden">
                        <img
                            src="/web/images/imagen-4.0-generate-preview-06-06_3_young_female_asian-1.png"
                            alt="">
                        <h1 class="absolute bottom-[20px] bg-[#B59410] p-2 pr-4 rounded-r-2xl text-white text-4xl font-bold">
                            What Is Co-Living? | Singapore’s New Rental Trend
                        </h1>
                    </div>
                    <div class="bde-rich-text-1142-106 bde-rich-text breakdance-rich-text-styles">
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="what-is-co-living-1">What Is Co-Living?</h2>
                        <p class="my-4">Co-living refers to a modern housing model where individuals
                            rent private
                            bedrooms within a larger shared property, and share communal spaces (kitchen, lounge, work
                            areas) and
                            amenities. Unlike a traditional rental apartment, co-living emphasises three core features:
                            flexibility,
                            community, and all-inclusive convenience (furnishings, utilities, services).</p>
                        <p class="my-4">In Singapore, co-living has transitioned from a niche
                            workaround into a
                            mature, growing segment of the rental market.</p>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="why-co-living-matters-in-singapore-2">Why
                            Co-Living
                            Matters in
                            Singapore</h2>
                        <p class="my-4">Singapore faces certain housing and rental pressures that make
                            co-living
                            especially relevant:</p>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">Private residential rents surged during 2022, and though
                                some easing
                                has occurred since, Singapore remains one of the most expensive rental markets in Asia
                                Pacific.</li>
                            <li class="mb-2">For younger tenants (students, young professionals,
                                expats) seeking
                                flexibility, the traditional leasing model (1-2 year fixed term, high deposit) isn’t
                                always
                                ideal.</li>
                            <li class="mb-2">Co-living offers a novel combination of <strong>move-in ready
                                    rooms</strong>, <strong>shorter
                                    or more flexible leases</strong>, and <strong>shared
                                    services</strong>, which aligns well with evolving lifestyles.</li>
                        </ul>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="how-co-living-works-key-components-3">How
                            Co-Living
                            Works: Key
                            Components</h2>
                        <p class="my-4">Here’s what typically makes up a co-living offering in
                            Singapore:</p>
                        <ul class="list-disc pl-10">
                            <li class="mb-2"><strong>Private
                                    Bedroom</strong>: Each resident has a bedroom of their own, often furnished (bed,
                                wardrobe, desk).
                            </li>
                            <li class="mb-2"><strong>Shared
                                    Communal
                                    Spaces</strong>: Lounge area, kitchen, study or co-working space, sometimes gym or
                                rooftop.</li>
                            <li class="mb-2"><strong>All-Inclusive
                                    Services</strong>: Many co-living operators include utilities, Wi-Fi, cleaning of
                                shared
                                areas, and
                                often servicing of items like air-conditioning.</li>
                            <li class="mb-2"><strong>Flexible
                                    Lease
                                    Terms</strong>: Leases might start from 3 months, 6 months, 12 months, instead of
                                only
                                traditional 1
                                year or more.</li>
                            <li class="mb-2"><strong>Community
                                    Features</strong>: Events, networking opportunities, peer group living — part of the
                                appeal of
                                co-living is the lifestyle component, not just the room.</li>
                        </ul>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="co-living-in-singapore-key-statistics-trends-4">
                            Co-Living in
                            Singapore: Key Statistics &amp; Trends</h2>
                        <p class="my-4">To understand how strong the case for co-living is in
                            Singapore, these
                            numbers paint a clear picture:</p>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">
                                <p>According to a report by JLL Singapore, the co-living
                                    sector in
                                    Singapore has attracted more than <strong>S$1.4&nbsp;billion</strong>
                                    in transaction volume since 2022.</p>
                            </li>
                            <li class="mb-2">
                                <p>Occupancy rates in the co-living market remain strong
                                    at around
                                    <strong>85-95%</strong>, despite increasing supply
                                    and softening
                                    traditional rental growth.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>For some operators, foreign students make up <strong>25-40%</strong> of residents.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>As of 2023, there were roughly <strong>9,000 co-living rooms</strong> in Singapore
                                    across various providers.</p>
                            </li>
                            <li class="mb-2">
                                <p>Room inventory grew by approximately <strong>17% between 2023 and 2025</strong>.</p>
                            </li>
                        </ul>
                        <p>These numbers reflect that co-living isn’t just a trendy
                            alternative —
                            it’s a viable, resilient housing segment in Singapore.</p>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="why-people-choose-co-living-5">Why People
                            Choose
                            Co-Living</h2>
                        <p class="my-4">Here are specific reasons why co-living is compelling in the
                            Singapore
                            market:</p>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">
                                <p><strong>Affordability &amp;
                                        Transparency</strong>: Rent often includes Wi-Fi, utilities and cleaning. No
                                    surprise bills.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Flexibility</strong>:
                                    Shorter leases cater to students, interns, expats or young professionals who may not
                                    want long
                                    contracts.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Prime
                                        Locations</strong>: Many co-living properties are in central or well-connected
                                    areas
                                    (near MRTs,
                                    business hubs), making commuting and lifestyle easier.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Community
                                        &amp;
                                        Lifestyle</strong>: Especially for newcomers (international students, expats)
                                    co-living helps
                                    with networking, social connections and settling in.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Maintenance &amp;
                                        Services</strong>: For example, regular air-conditioning servicing and general
                                    area
                                    cleaning are
                                    part of many co-living offers — removing operational burdens for tenants.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Resilience in
                                        Downturns</strong>: The sector has held up well even as conventional rentals had
                                    slower growth,
                                    demonstrating strong demand for the model.</p>
                            </li>
                        </ul>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="who-is-co-living-for-6">Who Is Co-Living For?
                        </h2>
                        <p class="my-4">In Singapore, co-living can appeal to multiple segments:</p>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">
                                <p><strong>Students
                                        &amp;
                                        Exchange Students</strong>: Flexible stay durations, furnished rooms, community
                                    environment.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Young
                                        Professionals
                                        &amp; Expats</strong>: Those relocating or wanting flexible housing without
                                    long-term
                                    commitment.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Digital
                                        Nomads /
                                        Short-Term Stays</strong>: People working remotely, on project-based stays, or
                                    opting for a
                                    non-traditional rental model.</p>
                            </li>
                            <li class="mb-2">
                                <p><strong>Landlords
                                        / Property
                                        Investors</strong>: On the flip side, property owners are increasingly looking
                                    at
                                    co-living as a
                                    model to maximise yield and reduce vacancy risk. (Although this is more for a “for
                                    landlords”
                                    piece.)</p>
                            </li>
                        </ul>
                        <h2 class="text-3xl font-bold mt-8 mb-4" id="pros-cons-of-co-living-7">Pros &amp; Cons of
                            Co-Living
                        </h2>
                        <h3 class="text-2xl font-bold mt-4 mb-4" id="pros-8">Pros</h3>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">
                                <p>Move-in ready, often single bill covering utilities
                                    and services.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>Flexibility in lease terms.</p>
                            </li>
                            <li class="mb-2">
                                <p>A social living environment and built-in community.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>Often located in desirable or well-connected areas.
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>Potential cost savings compared to renting entire
                                    private units.
                                </p>
                            </li>
                        </ul>
                        <h3 class="text-2xl font-bold mt-8 mb-4" id="cons-things-to-consider-9">Cons / Things to
                            Consider
                        </h3>
                        <ul class="list-disc pl-10">
                            <li class="mb-2">
                                <p>Less privacy compared to fully independent apartments
                                    (shared
                                    common areas).</p>
                            </li>
                            <li class="mb-2">
                                <p>Lease terms, rules and shared responsibilities may
                                    differ from
                                    traditional rentals.</p>
                            </li>
                            <li class="mb-2">
                                <p>Standards vary between operators — need to check
                                    quality of
                                    furnishings, services, contract terms.</p>
                            </li>
                            <li class="mb-2">
                                <p>Some may still prefer full control over property
                                    (kitchen, living
                                    spaces) rather than sharing.</p>
                            </li>
                            <li class="mb-2">
                                <p>Legal and regulatory frameworks are still evolving;
                                    make sure
                                    tenancy, services and provider are transparent.</p>
                            </li>
                        </ul>
                        <h2 class="text-3xl font-bold mt-8 mb-4"
                            id="how-to-choose-a-good-co-living-space-in-singapore-10">
                            How to Choose
                            a Good Co-Living Space in Singapore</h2>
                        <p class="my-4">Here are key questions to ask when evaluating a co-living
                            property:</p>
                        <ol class="list-decimal pl-10">
                            <li class="mb-2">
                                <p>What’s included in the monthly rent? (Utilities,
                                    Wi-Fi, cleaning,
                                    air-conditioning servicing?)</p>
                            </li>
                            <li class="mb-2">
                                <p>What is the lease term? Are shorter stays possible?
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>What is the room size, furnishing, and what shared
                                    amenities are
                                    available?</p>
                            </li>
                            <li class="mb-2">
                                <p>What’s the location like? Proximity to transport
                                    (MRT), work or
                                    study, lifestyle amenities.</p>
                            </li>
                            <li class="mb-2">
                                <p>What’s the community like? Who are the other tenants
                                    (students,
                                    professionals, expats)?</p>
                            </li>
                            <li class="mb-2">
                                <p>What are the house or community rules? Guests, noise,
                                    pets,
                                    cleaning responsibilities?</p>
                            </li>
                            <li class="mb-2">
                                <p>What is the operator’s reputation and how is
                                    maintenance handled?
                                </p>
                            </li>
                            <li class="mb-2">
                                <p>Are there reviews from current or past tenants? What
                                    is the
                                    occupancy rate?</p>
                            </li>
                        </ol>

                        <section id="the-future-of-co-living-in-singapore-11">
                            <h2 class="text-3xl font-bold mt-8 mb-4">The
                                Future of
                                Co-Living in
                                Singapore</h2>
                            <p class="my-4">Looking ahead:</p>
                            <ul class="list-disc pl-10">
                                <li class="mb-2">
                                    <p>The co-living sector is moving from niche to
                                        mainstream in
                                        Singapore, increasingly recognised as a distinct residential option.</p>
                                </li>
                                <li class="mb-2">
                                    <p>With strong demand — especially from international
                                        students and
                                        mobile workforces — plus institutional interest (S$1.4 billion+ investments
                                        since
                                        2022)
                                        the growth
                                        outlook is positive.</p>
                                </li>
                                <li class="mb-2">
                                    <p>Lease models may evolve: more flexible stays,
                                        tailored services,
                                        purpose-built properties for co-living rather than simple conversion.</p>
                                </li>
                                <li class="mb-2">
                                    <p>Operators may focus more on differentiators:
                                        community events,
                                        wellness amenities, co-working spaces, tech-enabled services.</p>
                                </li>
                                <li class="mb-2">
                                    <p>For tenants, expect more choice, quality, and
                                        transparent
                                        pricing. For landlords/investors, expect greater professionalism and yield
                                        optimisation
                                        in the
                                        co-living space.</p>
                                </li>
                            </ul>
                        </section>

                        <section id="summary-12">
                            <h2 class="text-3xl font-bold mt-8 mb-4">Summary</h2>
                            <p class="my-4">In short: co-living is more than just shared housing — it’s a
                                lifestyle-centric, service-rich rental model that fits the evolving demands of
                                Singapore’s
                                urban
                                rental
                                market. With strong local demand (students, expats, young professionals), a growing
                                stock
                                (approx. 9,000
                                rooms), high occupancy (85-95 %), and significant institutional investment (S$1.4
                                billion+
                                since
                                2022),
                                co-living is firmly establishing itself as a durable part of Singapore’s housing
                                ecosystem.
                            </p>
                            <p class="my-4">If you’re looking for flexibility, community, convenience and
                                affordability — co-living might just be the smarter way to live in Singapore’s vibrant
                                city-state.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tocObserver() {
            return {
                items: [{
                    id: 'what-is-co-living-1',
                    title: 'What Is Co-Living?'
                }, {
                    id: 'why-co-living-matters-in-singapore-2',
                    title: 'Why Co - Living Matters in Singapore '
                }, {
                    id: 'how-co-living-works-key-components-3',
                    title: 'How Co-Living Works: Key Components'
                }, {
                    id: 'co-living-in-singapore-key-statistics-trends-4',
                    title: 'Co-Living in Singapore: Key Statistics & Trends'
                }, {
                    id: 'why-people-choose-co-living-5',
                    title: 'Why People Choose Co-Living'
                }, {
                    id: 'who-is-co-living-for-6',
                    title: 'Who Is Co-Living For?'
                }, {
                    id: 'pros-cons-of-co-living-7',
                    title: 'Pros & Cons of Co-Living'
                }, {
                    id: 'pros-8',
                    title: 'Pros'
                }, {
                    id: 'cons-things-to-consider-9',
                    title: 'Cons / Things to Consider'
                }, {
                    id: 'how-to-choose-a-good-co-living-space-in-singapore-10',
                    title: 'How to Choose a Good Co-Living Space in Singapore'
                }, {
                    id: 'the-future-of-co-living-in-singapore-11',
                    title: 'The Future of Co-Living in Singapore'
                }, {
                    id: 'summary-12',
                    title: 'Summary'
                }, ],
                activeId: null,

                init() {
                    const observer = new IntersectionObserver(
                        (entries) => {
                            // Find the entry with the largest visible ratio
                            let mostVisible = entries.reduce((max, entry) =>
                                entry.intersectionRatio > max.intersectionRatio ? entry : max
                            );

                            if (mostVisible.isIntersecting) {
                                this.activeId = mostVisible.target.id;
                            }
                        }, {
                            threshold: Array.from({
                                length: 11
                            }, (_, i) => i / 10), // 0.0 → 1.0 in 0.1 steps
                        }
                    );

                    this.items.forEach((item) => {
                        const el = document.getElementById(item.id);
                        if (el) observer.observe(el);
                    });
                }

            };
        }
    </script>
@endsection