<section>
    <header>
        <h2 class="profile-section-title">
            {{ __('Jelszó módosítása') }}
        </h2>
    
        <p class="profile-section-desc">
            {{ __('Válassz egy hosszú, véletlenszerű jelszót a biztonság érdekében.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div style="margin-bottom: 20px;">
            <x-input-label class="form-label-login" for="update_password_current_password" :value="__('Aktuális jelszó:')" />
            <br>
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                          class="form-input" 
                          style="text-align: center; width: 300px;"
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div style="margin-bottom: 20px;">
            <x-input-label class="form-label-login" for="update_password_password" :value="__('Új jelszó:')" />
            <br>
            <x-text-input id="update_password_password" name="password" type="password" 
                          class="form-input" 
                          style="text-align: center; width: 300px;"
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div style="margin-bottom: 20px;">
            <x-input-label class="form-label-login" for="update_password_password_confirmation" :value="__('Új jelszó mégegyszer:')" />
            <br>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                          class="form-input" 
                          style="text-align: center; width: 300px;"
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4" style="justify-content: center;">
            <x-primary-button class="button">{{ __('Mentés') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="profile-saved-message"
                >{{ __('Mentve.') }}</p>
            @endif
        </div>
    </form>
</section>