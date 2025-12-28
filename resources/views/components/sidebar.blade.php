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
            <img src="/cohome-logo_light.png" alt="" class="h-[28px] mr-2 dark:hidden">
            <img src="/cohome-logo_dark.png" alt="" class="h-[28px] mr-2 hidden dark:block">
            <span class="font-bold text-xl text-black dark:text-gray-200">CoHomeSG</span>
        </a>

        <!-- sidebar links  -->
        <div class="flex flex-col h-full justify-between">
            <div class="flex flex-col gap-2 overflow-y-auto py-6 antialiased" x-data="{ current: window.location.href }">
                @include('components.sidebar-links')
            </div>
            <div class="grow"></div>    {{-- spacer --}}
            <div>
                <a href="https://www.aethel-ai.com" target="_blank" class="ml-2 text-xs text-gray-400">Powered by Aethel AI</a>
            </div>
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
