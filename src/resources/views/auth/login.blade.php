@extends('layout')

@section('content')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label class="form-label-login" for="email" :value="__('E-mail:')" />
            <br><x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label class="form-label-login" for="password" :value="__('Jelszó:')" />

            <br><x-text-input id="password" class="form-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm a">{{ __('Emlékezz rám') }}</span>
            </label>
        </div>

            <x-primary-button class="button">
                {{ __('Bejelentkezés') }}
            </x-primary-button>

        <br><div class="a">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Nem dereng a jelszó?') }}
                </a>
            @endif

        </div>
    </form>

@endsection