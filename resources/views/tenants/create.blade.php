<x-app>
    <main id="main" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Create New Tenant</h1>
        </div>


        <form action="{{ route('tenants.store') }}" method="POST"
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
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="fin" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">FIN</label>
                <input id="fin" type="text"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="fin" value="{{ old('fin') }}" required />
                @error('fin')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="passport_number" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Passport Number</label>
                <input id="passport_number" type="text"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="passport_number" value="{{ old('passport_number') }}" required />
                @error('passport_number')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="passport_expiry" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Passport Expiry</label>
                <input id="passport_expiry" type="date" @focus="$el.showPicker()"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="passport_expiry" value="{{ old('passport_expiry') }}" required />
                @error('passport_expiry')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="work_permit_expiry" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Work Permit Expiry</label>
                <input id="work_permit_expiry" type="date" @focus="$el.showPicker()"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="work_permit_expiry" value="{{ old('work_permit_expiry') }}" required />
                @error('work_permit_expiry')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="email" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="email" value="{{ old('email') }}" required />
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="phone" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Phone</label>
                <input id="phone" type="tel"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="phone" value="{{ old('phone') }}" required />
                @error('phone')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Save</button>

            <a href="{{ route('tenants.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
        </form>

    </main>
</x-app>
