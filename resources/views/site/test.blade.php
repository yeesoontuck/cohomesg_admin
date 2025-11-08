<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind + Alpine TOC Example</title>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/web.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">
    <div x-data="{ activeSection: 'section-1' }" class="flex min-h-screen">

    <nav class="sticky top-0 h-screen w-1/4 p-6 bg-gray-100 border-r overflow-y-auto">
        <h3 class="text-xl font-semibold mb-4">Content Outline</h3>
        
        <a 
            href="#section-1" 
            @click.prevent="activeSection = 'section-1'; document.getElementById('section-1').scrollIntoView({ behavior: 'smooth', block: 'start' })"
            :class="{'font-bold text-blue-600 bg-blue-100': activeSection === 'section-1', 'text-gray-700 hover:text-blue-500': activeSection !== 'section-1'}"
            class="block p-2 rounded transition mb-1"
        >Section 1: Introduction</a>
        <a 
            href="#section-2" 
            @click.prevent="activeSection = 'section-2'; document.getElementById('section-2').scrollIntoView({ behavior: 'smooth', block: 'start' })"
            :class="{'font-bold text-blue-600 bg-blue-100': activeSection === 'section-2', 'text-gray-700 hover:text-blue-500': activeSection !== 'section-2'}"
            class="block p-2 rounded transition mb-1"
        >Section 2: Implementation</a>
        <a 
            href="#section-3" 
            @click.prevent="activeSection = 'section-3'; document.getElementById('section-3').scrollIntoView({ behavior: 'smooth', block: 'start' })"
            :class="{'font-bold text-blue-600 bg-blue-100': activeSection === 'section-3', 'text-gray-700 hover:text-blue-500': activeSection !== 'section-3'}"
            class="block p-2 rounded transition mb-1"
        >Section 3: Conclusion</a>
    </nav>

    <main class="w-3/4 p-10">
        
        <section 
            id="section-1" 
            class="h-[120vh] p-10 border-b-4 bg-red-50 scroll-mt-20"
            x-intersect:enter.0="activeSection = 'section-1'"
        >
            <h2 class="text-3xl">Section 1: Introduction</h2>
        </section>

        <section 
            id="section-2" 
            class="h-[120vh] p-10 border-b-4 bg-yellow-50 scroll-mt-20"
            x-intersect:enter.0="activeSection = 'section-2'"
            x-intersect:leave.0="activeSection = 'section-1'"
        >
            <h2 class="text-3xl">Section 2: Implementation Details</h2>
        </section>
        
        <section 
            id="section-3" 
            class="h-[120vh] p-10 border-b-4 bg-green-50 scroll-mt-20"
            x-intersect:enter.0="activeSection = 'section-3'"
            x-intersect:leave.0="activeSection = 'section-2'"
        >
            <h2 class="text-3xl">Section 3: Conclusion and Summary</h2>
        </section>
    </main>
</div>
</body>

</html>
