<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Create Role</h1>
        </div>


        <form action="{{ route('roles.store') }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                <input id="name" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="name" value="{{ old('name') }}" required />
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-lg flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="key" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Key</label>
                <input id="key" type="text"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="key" value="{{ old('key') }}" required />
                @error('key')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex w-full flex-col gap-1 mb-4">
                <label for="description" class="w-fit pl-0.5 text-black">Description</label>
                <textarea id="description" name="description"
                    class="w-full bg-gray-100 focus:bg-white px-3 py-2 rounded transition-all duration-300 ease-in-out focus-visible:outline-none focus-visible:border-blue-500 focus-visible:shadow-[0_0_8px_2px_rgba(59,130,246,0.35)]"
                    rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Save</button>
                    <a href="{{ route('roles.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
                </div>
            </div>
        </form>
    </main>
</x-app>
