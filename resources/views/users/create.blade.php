<x-app>
    <main class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Create User</h1>
        </div>


        <form action="{{ route('users.store') }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name" class="w-fit pl-0.5 text-sm">Name</label>
                <input id="name" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="name" value="{{ old('name') }}" required />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-lg flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="email" class="w-fit pl-0.5 text-sm">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="email" value="{{ old('email') }}" required />
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="role_id" class="w-fit pl-0.5 text-sm">Role</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute pointer-events-none right-4 top-8 size-5">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <select id="role_id" name="role_id" required
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    <option value="" disabled selected>- select -</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>{{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <p>
                User's password will be automatically generated and sent to the email above.
            </p>

            <small class="block mb-4">* Not implemented yet</small>

            <button type="submit" class="btn-primary">Save</button>

            <a href="{{ route('users.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
        </form>

    </main>
</x-app>
