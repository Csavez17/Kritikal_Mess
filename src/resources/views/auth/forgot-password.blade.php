@extends('layout')

@section('content')
    <div class="a">
        {{ __('Elfelejtetted a jelszót? Nem probléma. Küldünk a megadott e-mail címre egy helyreállító hivatkozást.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="form-label-login" for="email" :value="__('E-mail:')" />
            <br><x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="button">
            <x-primary-button>
                {{ __('E-mail/Jelszó helyreállítása') }}
            </x-primary-button>
        </div>
    </form>
@endsection
