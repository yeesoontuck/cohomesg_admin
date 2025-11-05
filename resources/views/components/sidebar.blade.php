<div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
    <!-- dark overlay for when the sidebar is open on smaller screens  -->
    <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-surface-dark/10 backdrop-blur-xs md:hidden"
        aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

    <nav x-cloak
        class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col border-r border-outline bg-surface-alt p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative dark:border-outline-dark dark:bg-surface-dark-alt"
        x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">

        <!-- logo  -->
        <a href="{{ route('home') }}"
            class="flex items-center ml-1 w-fit text-2xl font-bold text-neutral-900 dark:text-white">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L19 7V17L12 22L5 17V7L12 2Z" class="fill-indigo-600"></path>
                <circle cx="12" cy="12" r="3" class="fill-white"></circle>
            </svg>
            <span class="font-bold text-xl text-black dark:text-gray-200">Concierg</span>
            <span class="text-indigo-600">AI</span>
        </a>

        <!-- sidebar links  -->
        <div class="flex flex-col h-full justify-between">
            <div class="flex flex-col gap-2 overflow-y-auto py-6" x-data="{ current: window.location.href }">
                @include('components.sidebar-links')
            </div>
            <div class="grow"></div>    {{-- spacer --}}
            <div>
                <a href="{{ route('licence') }}" target="_blank" class="ml-2 text-xs text-gray-400">Licences</a>
            </div>
        </div>
    </nav>

    <!-- top navbar & main content  -->
    <div class="h-svh w-full overflow-y-auto bg-surface dark:bg-surface-dark">
        @include('components.navbar')


        <!-- main content  -->
        <div id="main-content" class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>
