<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Edit Tenant</h1>
        </div>


        <form action="{{ route('tenants.update', $tenant) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('PUT')

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                <input id="name" type="text"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="name" value="{{ old('name', $tenant->name) }}" required />
                @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="fin" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">FIN</label>
                <input id="fin" type="text"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="fin" value="{{ old('fin', $tenant->fin) }}" required />
                @error('fin')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="passport_number" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Passport Number</label>
                <input id="passport_number" type="text"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="passport_number" value="{{ old('passport_number', $tenant->passport_number) }}" required />
                @error('passport_number')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="passport_expiry" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Passport Expiry</label>
                <input id="passport_expiry" type="date" @focus="$el.showPicker()"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="passport_expiry" value="{{ old('passport_expiry', $tenant->passport_expiry) }}" required />
                @error('passport_expiry')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="work_permit_expiry" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Work Permit Expiry</label>
                <input id="work_permit_expiry" type="date" @focus="$el.showPicker()"
                class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                name="work_permit_expiry" value="{{ old('work_permit_expiry', $tenant->work_permit_expiry) }}" required />
                @error('work_permit_expiry')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="email" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="email" value="{{ old('email', $tenant->email) }}" required />
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="phone" class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Phone</label>
                <input id="phone" type="tel"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="phone" value="{{ old('phone', $tenant->phone) }}" required />
                @error('phone')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('tenants.index') }}" class="inline-block btn-outline-inverse">Cancel</a>
                </div>

                @can('delete', $tenant)
                    <button type="button" @click="open = true; deleteUrl = '{{ route('tenants.destroy', $tenant) }}'"
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
            <a href="{{ route('audits.show', ['tenant', $tenant]) }}" class="text-xs link-underline">Activity Log
                ({{ $tenant->audits()->count() }})</a>
        </div>

    </main>
</x-app>
