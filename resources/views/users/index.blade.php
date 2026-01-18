<x-app>
    <main id="main" class="flex-1 dark:text-white">


        <h1 class="mb-4 text-2xl font-bold">Users</h1>

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div class="overflow-hidden w-full overflow-x-auto">

            <div x-data="{ open: false, actionUrl: '' }">
                <table
                    class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark border border-outline dark:border-outline-dark">
                    <thead
                        class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                        <tr>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Email</th>
                            <th scope="col" class="p-4">Role</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline dark:divide-outline-dark">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 {{ $user->deleted_at ? 'line-through' : '' }}">{{ $user->name }}</td>
                                <td class="px-4 py-2 {{ $user->deleted_at ? 'line-through' : '' }}">{{ $user->email }}</td>
                                <td class="px-4 py-2 {{ $user->deleted_at ? 'line-through' : '' }}">{{ $user->role?->name }}
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex flex-col lg:flex-row gap-2">
                                        @if ($user->deleted_at)
                                            @can('restore', $user)
                                                <button type="button"
                                                    @click="open = true; actionUrl = '{{ route('users.restore', $user) }}'"
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
                                            @can('update', $user)
                                                <a href="{{ route('users.edit', $user) }}"
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


            @can('create', App\Models\User::class)
                <div class="mt-12 flex justify-between mb-4">
                    <h2 class="text-xl font-semibold">User Invitations</h2>

                    <a href="{{ route('users.create') }}"
                        class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                                clip-rule="evenodd" />
                        </svg>
                        Invite New User
                    </a>
                </div>

                <div x-data="{ open: false, actionUrl: '' }">
                    <table
                        class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark border border-outline dark:border-outline-dark">
                        <thead
                            class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                            <tr>
                                <th scope="col" class="p-4">Name</th>
                                <th scope="col" class="p-4">Email</th>
                                <th scope="col" class="p-4">Invited on</th>
                                <th scope="col" class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline dark:divide-outline-dark">
                            @forelse ($invitations as $invitation)
                                <tr>
                                    <td class="px-4 py-2">{{ $invitation->name }}</td>
                                    <td class="px-4 py-2">{{ $invitation->email }}</td>
                                    <td class="px-4 py-2">{{ $invitation->created_at }}</td>
                                    <td class="px-4 py-2">
                                        <button type="button"
                                            @click="open = true; actionUrl = '{{ route('invitations.cancel', $invitation) }}'"
                                            class="btn-inverse px-2 py-1 text-xs">Cancel</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center">- no pending invitations -</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <x-confirm-modal method="put" message="Cancel this invitation?" />
                </div>

            @endcan


        </div>

    </main>
</x-app>
