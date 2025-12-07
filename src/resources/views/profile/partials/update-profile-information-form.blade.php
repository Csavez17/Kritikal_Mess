<section>
    
   
        <p class="profile-section-desc">
            {{ __("Frissítsd a fiókod adatait és email címét.") }}
        </p>
    

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div style="margin-bottom: 20px;">
            <x-input-label class="form-label-login" for="name" :value="__('Name')" />
            <br>
            <x-text-input id="name" name="name" type="text" 
                          class="form-input" 
                          style="text-align: center; width: 300px;"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div style="margin-bottom: 20px;">
            <x-input-label class="form-label-login" for="email" :value="__('Email')" />
            <br>
            <x-text-input id="email" name="email" type="email" 
                          class="form-input" 
                          style="text-align: center; width: 300px;"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4" style="justify-content: center;">
            <x-primary-button class="button">{{ __('Mentés') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   style="color: #fedbef; margin-left: 10px;">{{ __('Mentve.') }}</p>
            @endif
        </div>
    </form>
</section>