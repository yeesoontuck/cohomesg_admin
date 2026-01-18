<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Edit Tenancy Agreement</h1>
        </div>


        <form action="{{ route('tenancy_agreements.update', $tenancy_agreement) }}" method="POST"
            class="p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            @csrf
            @method('put')

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="agreement_date"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Agreement
                    Date</label>
                <input id="agreement_date" type="date" @focus="$el.showPicker()"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="agreement_date" value="{{ old('agreement_date', $tenancy_agreement->data['agreement_date']) }}" required autocomplete="off" />
                @error('agreement_date')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="tenant_id"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Tenant</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute pointer-events-none right-4 top-8 size-5">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <select name="tenant_id" id="tenant_id" required
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    {{-- <option value="" disabled selected>- select -</option> --}}
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}" @selected($tenancy_agreement->tenant->id == $tenant->id)>{{ $tenant->name }} - {{ $tenant->fin }}</option>
                    @endforeach
                </select>
                @error('tenant_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="room_id"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Property/Room</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute pointer-events-none right-4 top-8 size-5">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <select name="room_id" id="room_id" required
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    {{-- <option value="" disabled selected>- select -</option> --}}
                    @foreach ($properties as $property)
                        <optgroup label="{{ $property->property_name }}">
                            @foreach ($property->rooms as $room)
                                <option value="{{ $room->id }}" @selected($tenancy_agreement->room_id == $room->id)>{{ $room->room_number }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('room_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div x-data="{
                'startDate': '{{ $tenancy_agreement->start_date->format('Y-m-d') }}',
                'endDate': '{{ $tenancy_agreement->end_date->format('Y-m-d') }}',
            }" class="flex flex-col lg:flex-row gap-4">
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="start_date"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Start
                        Date</label>
                    <input id="start_date" type="date" x-model="startDate" :max="endDate" @focus="$el.showPicker()"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="start_date" value="{{ old('start_date', $tenancy_agreement->start_date->format('Y-m-d')) }}" required autocomplete="off" />
                    @error('start_date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="end_date"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">End
                        Date</label>
                    <input id="end_date" type="date" x-model="endDate" :min="startDate" @focus="$el.showPicker()"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="end_date" value="{{ old('end_date', $tenancy_agreement->end_date->format('Y-m-d')) }}" required autocomplete="off" />
                    @error('end_date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4">
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="terminate_notice_tenant"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Termination notice (Tenant)</label>
                    <input id="terminate_notice_tenant" type="text"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="terminate_notice_tenant" value="{{ old('terminate_notice_tenant', $tenancy_agreement->data['terminate_notice_tenant']) }}" required />
                    @error('terminate_notice_tenant')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="terminate_notice_operator"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Termination notice (Operator)</label>
                    <input id="terminate_notice_operator" type="text"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="terminate_notice_operator" value="{{ old('terminate_notice_operator', $tenancy_agreement->data['terminate_notice_operator']) }}" required />
                    @error('terminate_notice_operator')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4">
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="deposit"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Deposit</label>
                    <input id="deposit" type="number" step="1"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="deposit" value="{{ old('deposit', $tenancy_agreement->data['deposit']) }}" required />
                    @error('deposit')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="deposit_received_date" class="w-fit pl-0.5 text-sm">Deposit Received
                        Date</label>
                    <input id="deposit_received_date" type="date" @focus="$el.showPicker()"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="deposit_received_date" value="{{ old('deposit_received_date', $tenancy_agreement->data['deposit_received_date']) }}" autocomplete="off" />
                    @error('deposit_received_date')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-4">
                <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="admin_fee"
                        class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Admin
                        Fee</label>
                    <input id="admin_fee" type="number" step="1"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        name="admin_fee" value="{{ old('admin_fee', $tenancy_agreement->data['admin_fee']) }}" required />
                    @error('admin_fee')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <label for="admin_fee_waived"
                    class="flex items-center gap-2 text-sm font-medium text-on-surface dark:text-on-surface-dark has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong has-disabled:cursor-not-allowed has-disabled:opacity-75">
                    <span class="relative flex items-center">
                        <input id="admin_fee_waived" type="checkbox" name="admin_fee_waived"
                            class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-outline bg-surface-alt before:absolute before:inset-0 checked:border-primary checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark-alt dark:checked:border-primary-dark dark:checked:before:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark"
                            @checked(old('admin_fee_waived', $tenancy_agreement->data['admin_fee_waived'])) />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="4"
                            class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </span>
                    <span>Waived</span>
                </label>
            </div>

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="clear_out_fee"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Clear out
                    Fee</label>
                <input id="clear_out_fee" type="number" step="1"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="clear_out_fee" value="{{ old('clear_out_fee', $tenancy_agreement->data['clear_out_fee']) }}" required />
                @error('clear_out_fee')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="aircon_cleaning_fee"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Aircon Cleaning
                    Fee</label>
                <input id="aircon_cleaning_fee" type="number" step="1"
                    class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="aircon_cleaning_fee" value="{{ old('aircon_cleaning_fee', $tenancy_agreement->data['aircon_cleaning_fee']) }}" required />
                @error('aircon_cleaning_fee')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="relative mb-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="payment_mode_id"
                    class="w-fit pl-0.5 text-sm after:ml-0.5 after:text-red-500 after:content-['*']">Payment Mode</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute pointer-events-none right-4 top-8 size-5">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <select name="payment_mode_id" id="payment_mode_id" required
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark">
                    {{-- <option value="" disabled selected>- select -</option> --}}
                    <option value="DBS 0721339595" @selected($tenancy_agreement->room_id == 'DBS 0721339595')>DBS 0721339595</option>
                    <option value="OCBC xxxx" @selected($tenancy_agreement->room_id == 'OCBC xxxx')>OCBC xxxx</option>
                    {{-- @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach --}}
                </select>
                @error('payment_mode_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('tenancy_agreements.index') }}"
                        class="inline-block btn-outline-inverse">Cancel</a>
                </div>
            </div>
        </form>
    </main>
</x-app>
