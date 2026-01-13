@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    @if (session('toast'))
        <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
    @endif

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="flex items-center mb-4 ml-1 w-fit text-2xl font-bold text-neutral-900 dark:text-white">
            <img src="/cohome-logo_light.png" alt="" class="h-[28px] mr-2 dark:hidden">
            <img src="/cohome-logo_dark.png" alt="" class="h-[28px] mr-2 hidden dark:block">
            <span class="font-bold text-xl text-black dark:text-gray-200">{{ config('app.name') }}</span>
        </div>

        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="text-sm text-center">
                        @if (session('status'))
                            <div class="text-green-600 bg-green-100 text-sm px-2 py-1">
                                {{ session('status') }}
                            </div>
                        @elseif ($errors->any())
                            <div class="text-green-600 bg-green-100 text-sm px-2 py-1">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @else
                            A code will be sent to your email to help reset your password.
                        @endif
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Reset
                            password</button>
                    </div>
                </form>

                <a href="{{ route('login') }}" class="block text-sm flex items-center gap-1 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to login
                </a>
            </div>
        </div>
    </div>
@endsection
