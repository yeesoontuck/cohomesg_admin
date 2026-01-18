<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Tenants</h1>

            @can('create')
                <a href="{{ route('tenants.create') }}"
                    class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    New Tenant
                </a>
            @endcan
        </div>

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div class="overflow-hidden w-full overflow-x-auto">

            <div x-data="{ open: false, actionUrl: '' }"
                class="overflow-hidden w-full overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
                <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                    <thead
                        class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                        <tr>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">FIN</th>
                            <th scope="col" class="p-4">Email</th>
                            <th scope="col" class="p-4">Phone</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline dark:divide-outline-dark">
                        @foreach ($tenants as $tenant)
                            <tr>
                                <td class="px-4 py-2 {{ $tenant->deleted_at ? 'line-through' : '' }}">
                                    {{ $tenant->name }}</td>
                                <td class="px-4 py-2 {{ $tenant->deleted_at ? 'line-through' : '' }}">
                                    {{ $tenant->fin }}</td>
                                <td class="px-4 py-2 {{ $tenant->deleted_at ? 'line-through' : '' }}">
                                    {{ $tenant->email }}
                                </td>
                                <td class="px-4 py-2 {{ $tenant->deleted_at ? 'line-through' : '' }}">
                                    {{ $tenant->phone }}
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex flex-col lg:flex-row gap-2">
                                        @if ($tenant->deleted_at)
                                            @can('restore', $tenant)
                                                <button type="button"
                                                    @click="open = true; actionUrl = '{{ route('tenants.restore', $tenant) }}'"
                                                    class="btn-info px-2 py-1 text-xs rounded">Restore</button>

                                                {{-- <form action="" method="post" class="inline"
                                                    @click="if (!confirm('Are you sure you want to restore this account?')) $event.preventDefault()">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn-info px-2 py-1 text-xs rounded">
                                                        Restore
                                                    </button>
                                                </form> --}}
                                            @endcan
                                        @else
                                            <a href="{{ route('tenancy_agreements.index', ['tenant_id' => $tenant]) }}"
                                                class="relative flex justify-center btn-outline-primary dark:text-white px-1 py-1 text-xs rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                                                </svg>

                                                {{-- <div
                                                    class="after:content-['5'] 
                                                            after:absolute 
                                                            after:-top-2 
                                                            after:-right-2 
                                                            after:flex 
                                                            after:items-center 
                                                            after:justify-center 
                                                            after:w-5 
                                                            after:h-5 
                                                            after:bg-success
                                                            after:text-on-success 
                                                            after:text-[10px] 
                                                            after:font-bold 
                                                            after:rounded-full 
                                                            after:border-2 
                                                            after:border-white">
                                                </div> --}}
                                            </a>
                                            @can('update', $tenant)
                                                <a href="{{ route('tenants.edit', $tenant) }}"
                                                    class="inline-block btn-primary px-2 py-1 text-xs rounded">
                                                    Edit
                                                </a>
                                            @endcan
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <x-confirm-modal method="put" message="Restore this account?" />
            </div>
        </div>

    </main>
</x-app>
