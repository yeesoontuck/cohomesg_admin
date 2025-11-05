<a href="{{ route('home') }}" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
        aria-hidden="true">
        <path
            d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
    </svg>
    <span>Dashboard</span>
</a>

<!-- collapsible item  -->
<div x-data="{
    isExpanded: false,
    init() {
        const current = window.location.pathname.replace(/\/$/, '');
        const links = Array.from(this.$refs.usermenu.querySelectorAll('a'))
            .filter(a => a.getAttribute('href') && a.getAttribute('href') !== '#');

        this.isExpanded = links.some(a =>
            new URL(a.href, window.location.origin).pathname.replace(/\/$/, '') === current
        );
    }
}" class="flex flex-col">
    <button type="button" x-on:click="isExpanded = ! isExpanded" id="user-management-btn"
        aria-controls="user-management" x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
        class="sidebar-link-collapsible-base"
        x-bind:class="isExpanded ?
            'sidebar-link-collapsible-expanded' :
            'sidebar-link-collapsible-collapsed'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
            aria-hidden="true">
            <path
                d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
        </svg>
        <span class="mr-auto text-left">User Management</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="user-management-btn" id="user-management"
        x-ref="usermenu">
        <li class="px-1 py-0.5 first:mt-2">
            <a href="{{ route('users') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Users</a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Permissions</a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Activity Log</a>
        </li>
    </ul>
</div>

<!-- collapsible item  -->
<div x-data="{
    isExpanded: false,
    init() {
        const current = window.location.pathname.replace(/\/$/, '');
        const links = Array.from(this.$refs.productsmenu.querySelectorAll('a'))
            .filter(a => a.getAttribute('href') && a.getAttribute('href') !== '#');

        this.isExpanded = links.some(a =>
            new URL(a.href, window.location.origin).pathname.replace(/\/$/, '') === current
        );
    }
}" class="flex flex-col">
    <button type="button" x-on:click="isExpanded = ! isExpanded" id="products-btn" aria-controls="products"
        x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="sidebar-link-collapsible-base"
        x-bind:class="isExpanded ?
            'sidebar-link-collapsible-expanded' :
            'sidebar-link-collapsible-collapsed'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
            aria-hidden="true">
            <path
                d="M10.362 1.093a.75.75 0 0 0-.724 0L2.523 5.018 10 9.143l7.477-4.125-7.115-3.925ZM18 6.443l-7.25 4v8.25l6.862-3.786A.75.75 0 0 0 18 14.25V6.443ZM9.25 18.693v-8.25l-7.25-4v7.807a.75.75 0 0 0 .388.657l6.862 3.786Z" />
        </svg>
        <span class="mr-auto text-left">Products</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="products-btn" id="products" x-ref="productsmenu">
        <li class="px-1 py-0.5 first:mt-2">
            <a href="{{ route('products') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">All Products</a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Inventory</a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Reviews</a>
        </li>
    </ul>
</div>

<!-- collapsible item  -->
<div x-data="{
    isExpanded: false,
    init() {
        const current = window.location.pathname.replace(/\/$/, '');
        const links = Array.from(this.$refs.ordersmenu.querySelectorAll('a'))
            .filter(a => a.getAttribute('href') && a.getAttribute('href') !== '#');

        this.isExpanded = links.some(a =>
            new URL(a.href, window.location.origin).pathname.replace(/\/$/, '') === current
        );
    }
}" class="flex flex-col">
    <button type="button" x-on:click="isExpanded = ! isExpanded" id="orders-btn" aria-controls="orders"
        x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="sidebar-link-collapsible-base"
        x-bind:class="isExpanded ?
            'sidebar-link-collapsible-expanded' :
            'sidebar-link-collapsible-collapsed'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
            aria-hidden="true">
            <path
                d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z" />
            <path
                d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
        </svg>
        <span class="mr-auto text-left">Orders</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="orders-btn" id="orders" x-ref="ordersmenu">
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">
                <span>Pending</span>
                <span class="ml-auto font-bold">3</span>
            </a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">
                <span>Shipped</span>
                <span class="ml-auto font-bold">12</span>
            </a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">
                <span>Completed</span>
                <span class="ml-auto font-bold">38</span>
            </a>
        </li>
        <li class="px-1 py-0.5 first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">
                <span>Returns</span>
                <span class="ml-auto font-bold">2</span>
            </a>
        </li>
    </ul>
</div>

<a href="{{ route('settings') }}" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
        aria-hidden="true">
        <path fill-rule="evenodd"
            d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
            clip-rule="evenodd" />
    </svg>
    <span>Settings</span>
</a>



<button @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'"
    class="relative flex h-7 w-[3.25rem] items-center rounded-full border border-gray-200/70 dark:border-white/[0.07] hover:border-gray-200 dark:hover:border-white/10 p-1 cursor-pointer"
    aria-label="Toggle dark mode">
    <div class="z-10 flex w-full items-center justify-between px-1">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor"
            xmlns="http://www.w3.org/2000/svg" class="size-3 text-gray-600 dark:text-gray-600 fill-current">
            <g clip-path="url(#clip0_2880_7340)">
                <path d="M8 1.11133V2.00022" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M12.8711 3.12891L12.2427 3.75735" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M14.8889 8H14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M12.8711 12.8711L12.2427 12.2427" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M8 14.8889V14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path d="M3.12891 12.8711L3.75735 12.2427" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M1.11133 8H2.00022" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
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
            xmlns="http://www.w3.org/2000/svg" class="size-3 text-gray-300 dark:text-gray-300 fill-current">
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
