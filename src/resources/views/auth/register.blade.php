@extends('layout')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label class="form-label-login" for="name" :value="__('Név:')" />
            <br><x-text-input class="form-input" id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="form-label-login" for="email" :value="__('E-mail:')" />
            <br><x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="form-label-login" for="password" :value="__('Jelszó:')" />

            <br><x-text-input id="password" class="form-input"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="form-label-login" for="password_confirmation" :value="__('Jelszó megerősítése:')" />

            <br><x-text-input id="password_confirmation" class="form-input"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
            <x-primary-button class="button">
                {{ __('Regisztráció') }}
            </x-primary-button>
        <div class="a">
            <br><a href="{{ route('login') }}">
                {{ __('Már regisztráltál?') }}
            </a>
            
        </div>
    </form>
@endsection
