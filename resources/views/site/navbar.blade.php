<div class="flex items-center justify-between max-w-[1120px] mx-auto">
    <div>
        <a href="https://cohomesg.com/">
            <img src="/web/images/cohome-logo-150x150.png" alt="" class="h-[70px]">
        </a>
    </div>
    <div>
        <ul class="flex gap-5">
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
                <a class="link-draw-in" href="https://cohomesg.com/landlords/">
                    List your Property
                </a>
            </li>
            <li>
                <a class="link-draw-in" href="https://cohomesg.com/coliving-perks/">
                    Perks
                </a>
            </li>
            <li>
                <a class="link-draw-in" href="https://cohomesg.com/coliving-for-students-interns/">
                    Students
                </a>
            </li>
            <li>
                <a class="link-draw-in {{ request()->routeIs('expats') ? 'active' : '' }}" href="{{ route('expats') }}">
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
                <a class="link-draw-in {{ request()->routeIs('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">
                    About Us
                </a>
            </li>
        </ul>
    </div>
</div>
