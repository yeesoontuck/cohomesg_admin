@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    @if (session('toast'))
        <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
    @endif

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">2FA</h1>
    </div>

    @if ($errors->any())
        <div class="text-red-500 text-sm">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <form action="{{ route('two-factor.login.store') }}" method="POST">
        @csrf
        OTP (or recovery code): <input type="text" name="code">
        <button type="submit">Proceed</button>
    </form>
@endsection
