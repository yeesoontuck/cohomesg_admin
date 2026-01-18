<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Edit Role</h1>
        </div>


        <form action="{{ route('roles.update', $role) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('PUT')

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                <input id="name" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="name" value="{{ $role->name }}" required />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-lg flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="key" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Key</label>
                <input id="key" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="key" value="{{ $role->key }}" required />
                @error('key')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex w-full flex-col gap-1 mb-4">
                <label for="description" class="w-fit pl-0.5 text-black">Description</label>
                <textarea id="description" name="description"
                    class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                    rows="3" required>{{ $role->description }}</textarea>
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('roles.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
                </div>

                @can('delete', $role)
                    <button type="button" @click="open = true; deleteUrl = '{{ route('roles.destroy', $role) }}'"
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

                <p>The role will be permanently deleted.</p>

                <form id="delete_form" :action="deleteUrl" method="POST">
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
            <a href="{{ route('audits.show', ['role', $role]) }}" class="text-xs link-underline">Activity Log
                ({{ $role->audits()->count() }})</a>
        </div>
    </main>
</x-app>
