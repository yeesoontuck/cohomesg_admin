<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Edit User</h1>
        </div>


        <form action="{{ route('users.update', $user) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('PUT')

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                <input id="name" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="name" value="{{ $user->name }}" required />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-lg flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="email"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="email" value="{{ $user->email }}" required />
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="role_id"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Role</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute pointer-events-none right-4 top-8 size-5">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <select id="role_id" name="role_id" required
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>{{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('users.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
                </div>

                @can('delete', $user)
                    <button type="button" @click="open = true; deleteUrl = '{{ route('users.destroy', $user) }}'"
                        class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                @endcan
            </div>
        </form>

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

                <form x-target.push="main" id="delete_form" :action="deleteUrl" method="POST">
                    @csrf
                    @method('delete')

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false" class="btn-outline-inverse">Cancel</button>
                        <button type="submit" class="btn-outline-danger bg-red-100 dark:bg-red-950">Delete</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('audits.show', ['user', $user]) }}" class="text-xs link-underline">Activity Log
                ({{ $user->audits()->count() }})</a>
        </div>

    </main>
</x-app>
