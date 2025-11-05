<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" :class="{ 'dark': darkMode }" x-cloak>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="ConciergAI: A concierge-style AI solution hub for SMEs. Fixed-price bundles, vetted talent, and free consultation." />
    <title>ConciergAI — AI Made Simple for SMEs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-6xl mx-auto font-sans bg-slate-50 dark:bg-slate-700">
    <!-- Navbar -->
    <header class="bg-surface dark:bg-surface-dark shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <div class="flex items-center ml-1 w-fit text-2xl font-bold text-neutral-900 dark:text-white">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L19 7V17L12 22L5 17V7L12 2Z" class="fill-indigo-600"></path>
                    <circle cx="12" cy="12" r="3" class="fill-white"></circle>
                </svg>
                <span class="font-bold text-xl text-black dark:text-gray-200">Concierg</span>
                <span class="font-bold text-xl text-indigo-600">AI</span>
            </div>
            <nav class="hidden md:flex items-center gap-6 text-on-surface dark:text-on-surface-dark">
                <a href="#bundles" class="hover:text-indigo-600">Bundles</a>
                <a href="{{ route('home') }}" class="hover:text-indigo-600">Talent</a>
                <a href="#demos" class="hover:text-indigo-600">Demos</a>
                <a href="#contact" class="hover:text-indigo-600">Contact</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="https://calendly.com/YOUR-CALENDLY/30min"
                    class="hidden sm:inline-block rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Book
                    Free Consult</a>
                <a href="https://forms.gle/YOUR-GOOGLE-FORM"
                    class="hidden sm:inline-block rounded-xl border border-indigo-600 text-indigo-600 px-4 py-2 dark:bg-indigo-100 hover:bg-indigo-50">Post
                    a Job</a>
                <button @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'"
                    class="relative flex h-7 w-[3.25rem] items-center rounded-full border border-gray-200/70 dark:border-white/[0.07] hover:border-gray-200 dark:hover:border-white/10 p-1 cursor-pointer"
                    aria-label="Toggle dark mode">
                    <div class="z-10 flex w-full items-center justify-between px-1">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-3 text-gray-600 dark:text-gray-600 fill-current">
                            <g clip-path="url(#clip0_2880_7340)">
                                <path d="M8 1.11133V2.00022" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M12.8711 3.12891L12.2427 3.75735" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M14.8889 8H14" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M12.8711 12.8711L12.2427 12.2427" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M8 14.8889V14" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M3.12891 12.8711L3.75735 12.2427" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M1.11133 8H2.00022" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M3.12891 3.12891L3.75735 3.75735" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M8.00043 11.7782C10.0868 11.7782 11.7782 10.0868 11.7782 8.00043C11.7782 5.91402 10.0868 4.22266 8.00043 4.22266C5.91402 4.22266 4.22266 5.91402 4.22266 8.00043C4.22266 10.0868 5.91402 11.7782 8.00043 11.7782Z"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_2880_7340">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-3 text-gray-300 dark:text-gray-300 fill-current">
                            <g clip-path="url(#clip0_2880_7355)">
                                <path
                                    d="M11.5556 10.4445C8.48717 10.4445 6.00005 7.95743 6.00005 4.88899C6.00005 3.68721 6.38494 2.57877 7.03294 1.66943C4.04272 2.22766 1.77783 4.84721 1.77783 8.0001C1.77783 11.5592 4.66317 14.4445 8.22228 14.4445C11.2196 14.4445 13.7316 12.3948 14.4525 9.62321C13.6081 10.1414 12.6187 10.4445 11.5556 10.4445Z"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_2880_7355">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div
                        class="absolute left-1 h-5 w-5 rounded-full bg-gray-100 dark:bg-white/[0.07] transition-transform duration-200 dark:translate-x-[1.40rem]">
                    </div>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-br from-indigo-50 to-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="font-sans text-4xl sm:text-5xl font-extrabold leading-tight">AI made simple for SMEs.</h1>
                <p class="mt-4 text-lg text-gray-600">Concierge-style scoping, fixed-price bundles, and vetted AI
                    talent. Go from idea to impact in 2–4 weeks.</p>
                <div class="mt-6 flex items-center space-x-3">
                    <a href="https://calendly.com/YOUR-CALENDLY/30min"
                        class="rounded-xl bg-indigo-600 text-white px-5 py-3 hover:bg-indigo-700">Book Free Consult</a>
                    <a href="#bundles"
                        class="rounded-xl bg-white text-indigo-600 border border-indigo-600 px-5 py-3 hover:bg-indigo-50">See
                        Bundles</a>
                </div>
                <p class="mt-3 text-sm text-gray-500">No jargon. No lock-ins. Just working solutions for your business.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-sans text-xl font-semibold">What we deliver</h3>
                <ul class="mt-4 space-y-2 text-gray-700 list-disc pl-5">
                    <li>WhatsApp/Telegram FAQ chatbots</li>
                    <li>Sales & operations dashboards</li>
                    <li>Invoice OCR & auto-filing</li>
                    <li>Lead scoring & simple automations</li>
                </ul>
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div class="rounded-xl bg-indigo-50 p-4">
                        <div class="text-sm text-gray-600">Avg delivery</div>
                        <div class="text-2xl font-bold">2–4 weeks</div>
                    </div>
                    <div class="rounded-xl bg-indigo-50 p-4">
                        <div class="text-sm text-gray-600">Starter from</div>
                        <div class="text-2xl font-bold">S$3.9k</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bundles -->
    <section id="bundles" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14">
        <h2 class="font-sans text-3xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong">Starter Bundles</h2>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Fixed-scope, fixed-price packages designed for quick wins.</p>

        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="rounded-2xl bg-white p-6 shadow hover:shadow-md transition">
                <h3 class="font-sans font-semibold text-xl">FAQ Chatbot</h3>
                <p class="text-sm text-gray-600 mt-1">WhatsApp/Telegram or web widget</p>
                <ul class="mt-4 text-sm text-gray-700 space-y-1 list-disc pl-5">
                    <li>Content intake + setup</li>
                    <li>10–15 FAQs + handoff to staff</li>
                    <li>Basic analytics</li>
                </ul>
                <div class="mt-5 text-lg font-bold">S$3,900</div>
                <div class="text-xs text-gray-500">~2 weeks</div>
            </div>

            <!-- Card 2 -->
            <div class="rounded-2xl bg-white p-6 shadow hover:shadow-md transition">
                <h3 class="font-sans font-semibold text-xl">Sales Dashboard</h3>
                <p class="text-sm text-gray-600 mt-1">Looker Studio / Streamlit</p>
                <ul class="mt-4 text-sm text-gray-700 space-y-1 list-disc pl-5">
                    <li>Connect sheets/POS data</li>
                    <li>Top KPIs & trends</li>
                    <li>Auto-refresh weekly</li>
                </ul>
                <div class="mt-5 text-lg font-bold">S$4,500</div>
                <div class="text-xs text-gray-500">~3 weeks</div>
            </div>

            <!-- Card 3 -->
            <div class="rounded-2xl bg-white p-6 shadow hover:shadow-md transition">
                <h3 class="font-sans font-semibold text-xl">Invoice OCR</h3>
                <p class="text-sm text-gray-600 mt-1">Email/upload → CSV/Sheet</p>
                <ul class="mt-4 text-sm text-gray-700 space-y-1 list-disc pl-5">
                    <li>Extract vendor, date, amounts</li>
                    <li>Export to Sheets/CSV</li>
                    <li>10 sample docs included</li>
                </ul>
                <div class="mt-5 text-lg font-bold">S$4,900</div>
                <div class="text-xs text-gray-500">~3 weeks</div>
            </div>

            <!-- Card 4 -->
            <div class="rounded-2xl bg-white p-6 shadow hover:shadow-md transition">
                <h3 class="font-sans font-semibold text-xl">Lead Scoring</h3>
                <p class="text-sm text-gray-600 mt-1">Simple model on your data</p>
                <ul class="mt-4 text-sm text-gray-700 space-y-1 list-disc pl-5">
                    <li>Define success metric</li>
                    <li>Train + explainable output</li>
                    <li>CSV export for CRM</li>
                </ul>
                <div class="mt-5 text-lg font-bold">S$5,900</div>
                <div class="text-xs text-gray-500">~4 weeks</div>
            </div>
        </div>
    </section>

    <!-- Demos -->
    <section id="demos" class="bg-white dark:bg-slate-500 border-y border-gray-300 dark:border-gray-700">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14">
            <h2 class="font-sans text-3xl font-bold text-on-surface-strong dark:text-on-surface-dark-strong">Live Demos</h2>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Try a sample chatbot or view an example dashboard.</p>
            <div class="mt-8 grid sm:grid-cols-2 gap-6">
                <a href="https://YOUR-STREAMLIT-APP-LINK" target="_blank"
                    class="block rounded-2xl border border-gray-300 dark:border-gray-700 bg-slate-100 dark:bg-slate-300 p-6 hover:shadow-md transition">
                    <h3 class="font-sans font-semibold text-xl">FAQ Chatbot Demo</h3>
                    <p class="text-sm text-gray-600 mt-2">Ask questions, see responses and handoff flow.</p>
                </a>
                <a href="https://YOUR-LOOKER-STUDIO-LINK" target="_blank"
                    class="block rounded-2xl border border-gray-300 dark:border-gray-700 bg-slate-100 dark:bg-slate-300 p-6 hover:shadow-md transition">
                    <h3 class="font-sans font-semibold text-xl">Sales Dashboard Demo</h3>
                    <p class="text-sm text-gray-600 mt-2">Sample KPIs & filters to explore.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Talent -->
    <section id="talent" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14 text-on-surface-strong dark:text-on-surface-dark-strong">
        <h2 class="font-sans text-3xl font-bold">Vetted Talent</h2>
        <p class="text-gray-600 dark:text-gray-300 mt-2">Small, trusted team ready to deliver. Clear SLAs and quality checks.</p>

        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6" id="talent-grid">
            <!-- Cards render via JS from /talents.csv -->
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="bg-indigo-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14">
            <h2 class="font-sans text-3xl font-bold">Ready to explore?</h2>
            <p class="text-gray-700 mt-2">Book a free consultation or post a job. We’ll translate your needs into an
                actionable AI plan.</p>
            <div class="mt-6 flex items-center space-x-3">
                <a href="https://calendly.com/YOUR-CALENDLY/30min"
                    class="rounded-xl bg-indigo-600 text-white px-5 py-3 hover:bg-indigo-700">Book Free Consult</a>
                <a href="https://forms.gle/YOUR-GOOGLE-FORM"
                    class="rounded-xl bg-white text-indigo-600 border border-indigo-600 px-5 py-3 hover:bg-indigo-50">Post
                    a Job</a>
            </div>
        </div>
    </section>

    <footer class="py-10 text-center text-sm text-gray-500 dark:text-gray-400">
        &copy; <span id="year"></span> ConciergAI. All rights reserved.
    </footer>
</body>

</html>
