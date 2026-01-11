<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">My Profile</h1>
        </div>


        <form action="{{ route('profile.update', $user) }}" method="POST"
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
                <label for="role_id" class="w-fit pl-0.5 text-sm">Role</label>
                <p
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    {{ $user->role->name }}
                </p>
            </div>


            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </form>




        <div class="mt-12 flex justify-between mb-4">
            <h2 class="text-xl font-bold">Change Password</h2>
        </div>


        <form action="{{ route('profile.update_password', $user) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('PUT')

            <div x-data="{ showPassword: false }"
                class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="current_password"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Current
                    Password</label>
                <input id="current_password" :type="showPassword ? 'text' : 'password'"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="current_password" value="" required />
                <button type="button" class="absolute top-8 right-0 px-3" @click="showPassword = !showPassword"
                    x-text="showPassword? 'hide' : 'show'" tabindex="-1"></button>
                @error('current_password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div x-data="{
                password: '',
                showPassword: false,
                rules: {
                    length: p => p.length >= 8,
                    number: p => /[0-9]/.test(p),
                    lowercase: p => /[a-z]/.test(p),
                    uppercase: p => /[A-Z]/.test(p),
                    special: p => /[!@#$%^&*(),.?\':{}|<>]/.test(p)
                }
            }">
                <div
                    class="relative mb-1 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="new_password"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">New
                        Password</label>
                    <input id="new_password" :type="showPassword ? 'text' : 'password'" x-model="password" name="new_password"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    <button type="button" @click="showPassword = !showPassword" x-text="showPassword ? 'hide' : 'show'"
                        class="absolute top-8 right-0 px-3" tabindex="-1"></button>
                    @error('new_password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <ul class="mt-1 space-y-1 text-sm">
                    <template x-for="(check, label) in rules">
                        <li class="ml-2 flex items-center space-x-2"
                            :class="check(password) ? 'text-green-600' : 'text-gray-500'">
                            <span x-show="check(password)" class="text-green-500">✔</span>
                            <span x-show="!check(password)" class="text-red-400">✘</span>

                            <span x-text="formatLabel(label)"></span>
                        </li>
                    </template>
                </ul>
            </div>

            @push('scripts')
                <script>
                    function formatLabel(key) {
                        const labels = {
                            length: '8 characters or longer',
                            number: 'At least 1 number',
                            lowercase: 'At least 1 lowercase letter',
                            uppercase: 'At least 1 uppercase letter',
                            special: 'At least 1 special character'
                        };
                        return labels[key];
                    }
                </script>
            @endpush




            <div class="mt-8 flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-secondary">Update Password</button>
                </div>
            </div>
        </form>

    </main>
</x-app>
