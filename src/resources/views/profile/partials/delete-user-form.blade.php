<section class="space-y-6">
    <header>
        <h2 class="profile-section-title" style="color: red;">
            {{ __('Fiók törlése') }}
        </h2>
        <p>
            {{ __("Ha törlöd a fiókodat, minden adatod véglegesen elveszik.") }}
        </p>
    </header>

    <x-danger-button class="button" style="background-color: darkred;"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 profile-modal">
            @csrf
            @method('delete')

            <h2 class="profile-section-title" style="color: black;">
                {{ __('Biztosan törölni akarod a fiókod?') }}
            </h2>

            <p class="profile-section-desc" style="color: #666;">
                {{ __("Kérjük, add meg a jelszavadat a törlés megerősítéséhez.") }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-input"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="button" style="background-color: darkred; margin-left: 10px;">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>