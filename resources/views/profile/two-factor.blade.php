<x-app>
    <main id="main" x-data="{ open: false, deleteUrl: '' }" class="flex-1 dark:text-white">

        @if (session('toast'))
            <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">My Profile</h1>
        </div>

        <div
            class="flex flex-col md:flex-row md:gap-8 p-8 overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <div class="mb-4 md:mb-0 border-b md:border-b-0 md:border-r border-outline dark:border-outline-dark">
                <ul
                    class="pr-8 pb-4 md:leading-8 text-sm text-on-surface dark:text-on-surface-dark whitespace-nowrap flex flex-row justify-between md:flex-col">
                    <li><a href="{{ route('profile.my_profile') }}">Profile</a></li>
                    <li><a href="{{ route('profile.password') }}">Password</a></li>
                    <li class="underline">Two-factor Auth</li>
                </ul>
            </div>

            <div class="overflow-hidden w-full overflow-x-auto">
                <h2 class="text-xl font-semibold mb-4">Two-factor Authentication</h2>

                @if (session('status') == 'two-factor-authentication-confirmed')
                    <div class="mb-4 font-medium text-sm border border-success text-success px-3 py-0.5">
                        Two-factor authentication confirmed and enabled successfully.
                    </div>
                @endif

                @if (session('status') == 'two-factor-authentication-disabled')
                    <div class="mb-4 font-medium text-sm border border-danger text-danger px-3 py-0.5">
                        Two-factor authentication has been disabled.
                    </div>
                @endif

                

                @if (session('status') == 'two-factor-authentication-enabled')
                    <div class="mb-4 font-medium text-sm">
                        1. Use your Authenticator App to scan this QR code.
                    </div>
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}

                    <div class="mt-8 font-medium text-sm">
                        Can't scan the code? Use this Setup Key<br />
                    </div>

                    <div class="mt-4 mb-8 font-bold text-lg">
                        {{ decrypt(auth()->user()->two_factor_secret) }}
                    </div>


                    <div class="mb-4 font-medium text-sm">
                        2. Enter the OTP code from your Authenticator App.
                    </div>

                    <form action="{{ route('two-factor.confirm') }}" method="POST">
                        @csrf

                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OTP Code</label>
                        <input type="tel" name="code" id="code"
                            class="max-w-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('code') }}" required>
                        @error('code', 'confirmTwoFactorAuthentication')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn-primary my-4">Finish setup</button>
                    </form>
                @elseif (auth()->user()->two_factor_confirmed_at)
                    <div class="inline px-4 py-2 bg-success rounded-md text-onSuccess">Enabled</div>

                    <div class="my-4">
                        With two-factor authentication enabled, you will be prompted for a secure, random pin during
                        login.
                    </div>

                    <div class="p-4 mb-8 border border-outline rounded-md max-w-lg">
                        <h3 class="text-md font-semibold mb-4 flex flex-row items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="inline size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            2FA Recovery Codes
                        </h3>

                        <div class="mb-4">Recovery codes let you regain access if you lose your 2FA device.
                            Store them in a secure password manager.</div>

                        <div class="p-4 rounded bg-gray-200 text-on-surface">
                            @foreach (auth()->user()->recoveryCodes() as $code)
                                <p>{{ $code }}
                            @endforeach
                        </div>
                    </div>

                    <form action="{{ route('two-factor.disable') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Disable 2FA</button>
                    </form>
                @else
                    <form action="{{ route('two-factor.enable') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-success">Enable 2FA</button>
                    </form>
                @endif

            </div>
        </div>
    </main>
</x-app>
