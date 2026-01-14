@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    @if (session('toast'))
        <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
    @endif



    <!-- Two Factor -->
    <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
    <section class="mx-auto w-full max-w-xl py-6">
        <div
            class="bg-white dark:bg-gray-800 rounded-xl border border-outline text-center dark:border-outline-dark dark:text-zinc-100">
            <div class="p-5 sm:p-8 md:p-12" x-data="{
                recovery: false,
                code: '',
                autoSubmit: false,
                isNumber(value) {
                    if (value.match(/^[0-9]$/g)) {
                        return true;
                    }
                },
                handleSubmit() {
                    // Concatenate all 6 values into the hidden input
                    this.code = this.$refs.num1.value +
                        this.$refs.num2.value +
                        this.$refs.num3.value +
                        this.$refs.num4.value +
                        this.$refs.num5.value +
                        this.$refs.num6.value;
            
                    if (this.autoSubmit && this.code.length === 6) {
                        this.$nextTick(() => { $refs.twoFactorForm.submit(); });
                    }
            
                },
                handlePaste(e) {
                    let num = e.clipboardData.getData('text/plain').trim();
            
                    if (num.length === 6 && num.match(/^[0-9]+$/g)) {
                        $refs.num1.value = num.charAt(0);
                        $refs.num2.value = num.charAt(1);
                        $refs.num3.value = num.charAt(2);
                        $refs.num4.value = num.charAt(3);
                        $refs.num5.value = num.charAt(4);
                        $refs.num6.value = num.charAt(5);
            
                        this.handleSubmit();
                    }
                },
            }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hi-outline hi-lock-closed mb-5 inline-block size-6 opacity-75">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                <h1 class="mb-2 text-2xl font-bold">Two-Factor Authentication</h1>

                <h2 x-show="!recovery" class="mb-8 text-sm text-zinc-600 dark:text-zinc-400">
                    Please enter the verification code from your Authenticator App.
                </h2>
                <h2 x-show="recovery" x-cloak class="mb-8 text-sm text-zinc-600 dark:text-zinc-400">
                    Please enter a recovery code.
                </h2>

                @if ($errors->any())
                    <div class="text-red-500 text-sm my-4">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form x-ref="twoFactorForm" class="space-y-6" action="{{ route('two-factor.login.store') }}" method="POST">
                    @csrf


                    <div x-show="!recovery">
                        <input type="hidden" name="code" x-model="code">
                        <div class="inline-flex items-center gap-1.5">
                            <input x-ref="num1"
                                x-on:input.change="() => { isNumber($refs.num1.value) ? $refs.num2.focus() : $refs.num1.value = '' }"
                                x-on:paste="handlePaste" type="text" id="num1" maxlength="1" autofocus
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                            <input x-ref="num2"
                                x-on:input.change="() => { isNumber($refs.num2.value) ? $refs.num3.focus() : $refs.num2.value = '' }"
                                x-on:keydown.backspace="() => { $refs.num2.value === '' ? $refs.num1.focus() : null }"
                                x-on:paste="handlePaste" type="text" id="num2" maxlength="1"
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                            <input x-ref="num3"
                                x-on:input.change="() => { isNumber($refs.num3.value) ? $refs.num4.focus() : $refs.num3.value = '' }"
                                x-on:keydown.backspace="() => { $refs.num3.value === '' ? $refs.num2.focus() : null }"
                                x-on:paste="handlePaste" type="text" id="num3" maxlength="1"
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                            <span class="text-sm text-zinc-400 dark:text-zinc-600">-</span>
                            <input x-ref="num4"
                                x-on:input.change="() => { isNumber($refs.num4.value) ? $refs.num5.focus() : $refs.num4.value = '' }"
                                x-on:keydown.backspace="() => { $refs.num4.value === '' ? $refs.num3.focus() : null }"
                                x-on:paste="handlePaste" type="text" id="num4" maxlength="1"
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                            <input x-ref="num5"
                                x-on:input.change="() => { isNumber($refs.num5.value) ? $refs.num6.focus() : $refs.num5.value = '' }"
                                x-on:keydown.backspace="() => { $refs.num5.value === '' ? $refs.num4.focus() : null }"
                                x-on:paste="handlePaste" type="text" id="num5" maxlength="1"
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                            <input x-ref="num6"
                                x-on:input.change="() => { isNumber($refs.num6.value) ? handleSubmit() : $refs.num6.value = '' }"
                                x-on:keydown.backspace="() => { $refs.num6.value === '' ? $refs.num5.focus() : null }"
                                x-on:paste="handlePaste" type="text" id="num6" maxlength="1"
                                class="block w-9 rounded-lg border border-zinc-200 px-2 py-1.5 text-center text-sm/6 placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent dark:placeholder-zinc-400 dark:focus:border-zinc-500" />
                        </div>
                    </div>

                    <div x-show="recovery" x-cloak>
                        <input type="text" name="recovery_code" x-ref="recoveryInput"
                            class="block w-full rounded-lg border border-zinc-200 px-4 py-2 text-center text-sm font-mono placeholder-zinc-500 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 dark:border-zinc-600 dark:bg-transparent"
                            x-bind:disabled="!recovery" />
                    </div>

                    <div>
                        <button x-ref="twoFactorButton" type="submit" class="btn-primary">
                            <span>Verify code</span>
                        </button>
                    </div>
                </form>

                <div x-show="!recovery" class="mt-5 text-sm text-zinc-500 dark:text-zinc-400">
                    Can't use your Authenticator App?
                    <a href="javascript:void(0)"
                        @click="recovery = true; $nextTick(() => { $refs.recoveryInput.focus() })"
                        class="font-medium text-teal-700 underline decoration-teal-500/50 underline-offset-2 hover:text-teal-900 dark:text-teal-300 dark:decoration-teal-400/50 dark:hover:text-teal-100">
                        Use a Recovery Code
                    </a>
                </div>
                <div x-show="recovery" x-cloak class="mt-5 text-sm text-zinc-500 dark:text-zinc-400">
                    Have your mobile device?
                    <a href="javascript:void(0)"
                        @click="recovery = false; $nextTick(() => { $refs.num1.focus() })"
                        class="font-medium text-teal-700 underline decoration-teal-500/50 underline-offset-2 hover:text-teal-900 dark:text-teal-300 dark:decoration-teal-400/50 dark:hover:text-teal-100">
                        Back to Authenticator Code
                    </a>
                </div>


            </div>
        </div>
        <!-- END Form -->
    </section>
    <!-- END Two Factor -->

@endsection
