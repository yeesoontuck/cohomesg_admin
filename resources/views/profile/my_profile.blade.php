<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">My Profile</h1>
        </div>

        <div class="flex flex-col md:flex-row md:gap-8 p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <div class="border-b md:border-b-0 mb-4 md:mb-0 md:border-r border-outline dark:border-outline-dark">
                <ul class="pr-8 pb-4 md:leading-8 text-sm text-on-surface dark:text-on-surface-dark whitespace-nowrap flex flex-row justify-between md:flex-col">
                    <li class="underline">Profile</li>
                    <li><a href="{{ route('profile.password') }}">Password</a></li>
                    <li><a href="{{ route('profile.two_factor') }}">Two-factor Auth</a></li>
                </ul>
            </div>

            <div class="overflow-hidden w-full overflow-x-auto">
                <h2 class="text-xl font-semibold mb-4">Profile</h2>

                <form action="{{ route('profile.update', $user) }}" method="POST">
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
                    <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
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
                        <label for="role_id" class="w-fit pl-0.5 text-sm">Role</label>
                        <p
                            class="w-full h-9 rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                            {{ $user->role?->name }}
                        </p>
                    </div>
        
        
                    <div class="flex justify-between">
                        <div class="flex gap-2">
                            <button type="submit" class="btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app>
