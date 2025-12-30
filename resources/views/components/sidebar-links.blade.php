<a href="{{ route('home') }}" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
        aria-hidden="true">
        <path
            d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
    </svg>
    <span>Dashboard</span>
</a>

{{-- <a href="{{ route('whatsapp.show', 1) }}" class="sidebar-link"
    :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="size-5 shrink-0"
        aria-hidden="true">
        <path fill-rule="evenodd"
            d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"
            clip-rule="evenodd">
        </path>
    </svg>
    <span>WhatsApp</span>
</a> --}}


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
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-4 transition-transform rotate-0 shrink-0"
            x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="user-management-btn" id="user-management"
        x-ref="usermenu" class="pl-4">
        @can('viewAny', App\Models\User::class)
        <li class="px-2 py-0.5 border-l border-outline dark:border-outline-dark first:mt-2">
            <a href="{{ route('users.index') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Users</a>
        </li>
        @endcan
        <li class="px-2 py-0.5 border-l border-outline dark:border-outline-dark first:mt-2">
            <a href="{{ route('roles.index') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Roles</a>
        </li>
        <li class="px-2 py-0.5 border-l border-outline dark:border-outline-dark first:mt-2">
            <a href="#" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Activity Log</a>
        </li>
    </ul>
</div>

@can('viewAny', App\Models\Property::class)
<a href="{{ route('properties.index') }}" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
    </svg>
    <span class="mr-auto text-left">Properties</span>
</a>
@endcan

<a href="#" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path fill-rule="evenodd"
            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
            clip-rule="evenodd" />
    </svg>
    <span>Landlords</span>
</a>

<a href="#" class="sidebar-link" :class="{ 'active': current === $el.getAttribute('href') }">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
    </svg>
    <span>Tenants</span>
</a>

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
            <path fill-rule="evenodd"
                d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                clip-rule="evenodd" />
        </svg>
        <span class="mr-auto text-left">Settings</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-4 transition-transform rotate-0 shrink-0"
            x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="products-btn" id="products" x-ref="productsmenu" class="pl-4">
        <li class="px-2 py-0.5 border-l border-outline dark:border-outline-dark first:mt-2">
            @can('viewAny', App\Models\District::class)
            <a href="{{ route('districts.index') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Districts</a>
            @endcan
        </li>
        <li class="px-2 py-0.5 border-l border-outline dark:border-outline-dark first:mt-2">
            <a href="{{ route('documents.index') }}" class="sidebar-link-collapsible-subitem"
                :class="{ 'active': current === $el.getAttribute('href') }">Documents</a>
        </li>
    </ul>
</div>




