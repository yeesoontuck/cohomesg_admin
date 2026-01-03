<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Districts</h1>

            @can('create', App\Models\District::class)
                <a x-target.push="main" href="{{ route('districts.create') }}"
                    class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    New District
                </a>
            @endcan
        </div>

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div x-data="{ open: false, deleteUrl: '' }"
            class="overflow-hidden w-full overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead
                    class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4">District</th>
                        <th scope="col" class="p-4">Name</th>
                        <th scope="col" class="p-4">Locations</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline dark:divide-outline-dark">

                    @foreach ($districts as $district)
                        <tr>
                            <td class="p-4">{{ $district->id }}</td>
                            <td class="p-4">{{ $district->district_name }}</td>
                            <td class="p-4">{{ $district->districts_full }}</td>
                            <td class="p-4">
                                <div class="flex flex-col lg:flex-row gap-2">
                                    @can('update', $district)
                                        <a x-target.push="main" href="{{ route('districts.edit', $district) }}"
                                            class="inline-block btn-primary px-2 py-1 text-xs rounded">
                                            Edit
                                        </a>
                                    @endcan

                                    @if ($district->id > 28)
                                        @can('delete', $district)
                                            <button type="button"
                                                @click="open = true; deleteUrl = '{{ route('districts.destroy', $district) }}'"
                                                class="btn-outline-danger bg-red-100 dark:bg-red-950 px-2 py-1 text-xs rounded">Delete</button>
                                        @endcan
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- delete confirmation modal --}}
            <div x-show="open" class="z-200 fixed inset-0 flex items-center justify-center bg-black/50"
                x-transition.opacity.duration.300ms x-cloak>
                <div class="bg-surface dark:bg-surface-dark p-12 rounded-lg shadow-lg flex flex-col items-center gap-4">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12 text-danger">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                    <h2 class="text-md font-semibold text-center">Are you sure?</h2>

                    <p>This district will be permanently deleted.</p>

                    <form x-target.push="main" id="delete_form" :action="deleteUrl" method="POST">
                        @csrf
                        @method('delete')

                        <div class="flex justify-end gap-2">
                            <button type="button" @click="open = false" class="btn-outline-inverse">Cancel</button>
                            <button type="submit"
                                class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
</x-app>
