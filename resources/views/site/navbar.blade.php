<div x-data="{ mobile_menu_open: false }" class="relative">
    <div class="flex px-8 items-center justify-between max-w-[1120px] mx-auto">
        <div>
            <a href="https://cohomesg.com/">
                <img src="/web/images/cohome-logo-150x150.png" alt="" class="h-[70px]">
            </a>
        </div>

        {{-- horizontal menu for large screens --}}
        <div class="hidden lg:block">
            <ul class="flex flex-col lg:flex-row gap-5">
                <li>
                    <a class="link-draw-in {{ request()->routeIs('site') ? 'active' : '' }}" href="{{ route('site') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="link-draw-in" href="https://cohomesg.com/room/">
                        Find a Room
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('landlords') ? 'active' : '' }}"
                        href="{{ route('landlords') }}">
                        List your Property
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('perks') ? 'active' : '' }}"
                        href="{{ route('perks') }}">
                        Perks
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('students') ? 'active' : '' }}"
                        href="{{ route('students') }}">
                        Students
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('expats') ? 'active' : '' }}"
                        href="{{ route('expats') }}">
                        Expats
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('whatiscoliving') ? 'active' : '' }}"
                        href="{{ route('whatiscoliving') }}">
                        What is Co-living
                    </a>
                </li>
                <li>
                    <a class="link-draw-in {{ request()->routeIs('aboutus') ? 'active' : '' }}"
                        href="{{ route('aboutus') }}">
                        About Us
                    </a>
                </li>
            </ul>
        </div>


        {{-- mobile menu icon --}}
        <div class="lg:hidden relative flex items-center mr-4" @click="mobile_menu_open = !mobile_menu_open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                x-show="!mobile_menu_open" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 rotate-90" x-transition:enter-end="opacity-100 rotate-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 -rotate-90"
                stroke="currentColor" class="absolute size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                x-show="mobile_menu_open" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 rotate-90" x-transition:enter-end="opacity-100 rotate-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 -rotate-90"
                stroke="currentColor" class="absolute size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </div>
    </div>

    <div x-show="mobile_menu_open" class="lg:hidden absolute z-99 left-0 right-0 bg-white/90" x-collapse>
        <div class="w-full">
            <ul class="flex flex-col lg:flex-row">
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="/">
                        Home
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="https://cohomesg.com/room/">
                        Find a Room
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('landlords') }}">
                        List your Property
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('perks') }}">
                        Perks
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('students') }}">
                        Students
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('expats') }}">
                        Expats
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('whatiscoliving') }}">
                        What is Co-living
                    </a>
                </li>
                <li class="border-b border-gray-300">
                    <a class="block px-4 py-3" href="{{ route('aboutus') }}">
                        About Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
