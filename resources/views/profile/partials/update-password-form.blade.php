<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Wachtwoord wijzigen
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Gebruik een lang en uniek wachtwoord voor een veilige account.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Huidig wachtwoord" class="font-semibold text-gray-100" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-lg border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 focus:border-cyan-300 focus:ring-cyan-300/70" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-300" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nieuw wachtwoord" class="font-semibold text-gray-100" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-lg border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 focus:border-cyan-300 focus:ring-cyan-300/70" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-300" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Bevestig nieuw wachtwoord" class="font-semibold text-gray-100" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-lg border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 focus:border-cyan-300 focus:ring-cyan-300/70" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-300" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-cyan-400 text-gray-950 hover:bg-cyan-300 focus:bg-cyan-300">Opslaan</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >Opgeslagen.</p>
            @endif
        </div>
    </form>
</section>
