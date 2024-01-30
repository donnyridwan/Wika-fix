<!-- resources/views/auth/login.blade.php -->

@extends('auth.layout')

@section('content')
    <form method="POST" action="{{ route('login.post') }}" class="flex flex-col items-center w-[480px] -mt-24">
        {{-- action="{{ route('login') }}" --}}
        @csrf
        <p class="font-bold text-5xl mb-6">{{ __('Login') }}</p>
        <p class="text-lg mb-8">Pastikan data yang anda masukan benar</p>
        <div class="mb-6 flex flex-col w-full">
            <label for="email" class="">{{ __('Email*') }}</label>
            <input id="email" type="email" class="border border-black rounded-lg py-2 px-4" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-6 flex flex-col w-full">
            <label for="password" class="">{{ __('Password*') }}</label>
            <input id="password" type="password" class="border border-black rounded-lg py-2 px-4" name="password" required>
        </div>
        <button type="submit" class="bg-themeBlue text-white py-2 w-full rounded-xl">{{ __('Masuk') }}</button>
    </form>
@endsection
