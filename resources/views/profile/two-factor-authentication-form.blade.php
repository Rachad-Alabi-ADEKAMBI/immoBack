<x-action-section>
    <x-slot name="title">
        {{ __(' Authentification à deux facteurs') }}
    </x-slot>

    <x-slot name="description">
        {{ __("Ajoutez plus de sécurité à votre compte en utilisant l'authentification à deux facteurs.") }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
            @if ($showingConfirmation)
            {{ __("Terminer la configuration de l'authentification à deux facteurs.") }}
            @else
            {{ __("Vous avez activé l'authentification à deux facteurs.") }}
            @endif
            @else
            {{ __("Vous avez désactivé l'authentification à deux facteurs.") }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __("Lorsque l'authentification à deux facteurs est activée, vous serez invité à fournir un jeton
  sécurisé et aléatoire lors de l'authentification. Vous pouvez récupérer ce jeton à partir de l'application Google
   Authenticator de votre téléphone.") }}
            </p>
        </div>

        @if ($this->enabled)
        @if ($showingQrCode)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                @if ($showingConfirmation)
                {{ __('To finish enabling   Authentification à deux facteurs, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                @else
                {{ __(' Authentification à deux facteurs is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                @endif
            </p>
        </div>

        <div class="mt-4 p-2 inline-block bg-white">
            {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>

        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
            </p>
        </div>

        @if ($showingConfirmation)
        <div class="mt-4">
            <x-label for="code" value="{{ __('Code') }}" />

            <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus
                autocomplete="one-time-code" wire:model.defer="code"
                wire:keydown.enter="confirmTwoFactorAuthentication" />

            <x-input-error for="code" class="mt-2" />
        </div>
        @endif
        @endif

        @if ($showingRecoveryCodes)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your  Authentification à deux facteurs device is lost.') }}
            </p>
        </div>

        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
        @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
            <x-confirms-password wire:then="enableTwoFactorAuthentication">
                <x-button type="button" wire:loading.attr="disabled" class="btn btn-success">
                    {{ __('Autoriser') }}
                </x-button>
            </x-confirms-password>
            @else
            @if ($showingRecoveryCodes)
            <x-confirms-password wire:then="regenerateRecoveryCodes">
                <x-secondary-button class="mr-3">
                    {{ __("Régénerer les codes de vérification") }}
                </x-secondary-button>
            </x-confirms-password>
            @elseif ($showingConfirmation)
            <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                <x-button type="button" class="mr-3 btn btn-success" wire:loading.attr="disabled">
                    {{ __('Confirmez') }}
                </x-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="showRecoveryCodes">
                <x-secondary-button class="mr-3">
                    {{ __("Montrer les codes de vérification") }}
                </x-secondary-button>
            </x-confirms-password>
            @endif

            @if ($showingConfirmation)
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-secondary-button wire:loading.attr="disabled">
                    {{ __("Abandonner") }}
                </x-secondary-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-danger-button wire:loading.attr="disabled">
                    {{ __("Désactiver") }}
                </x-danger-button>
            </x-confirms-password>
            @endif

            @endif
        </div>
    </x-slot>
</x-action-section>