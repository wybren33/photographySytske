<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-7">
        <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Welkom terug</p>
        <h1 class="mt-1 text-2xl font-bold text-white">Inloggen</h1>
        <p class="mt-2 text-sm leading-6 text-gray-400">Log in om je collecties en foto’s te beheren.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="E-mailadres" class="font-semibold text-gray-100" />
            <x-text-input id="email" class="mt-2 block w-full rounded-lg border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 focus:border-cyan-300 focus:ring-cyan-300/70" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Wachtwoord" class="font-semibold text-gray-100" />

            <x-text-input id="password" class="mt-2 block w-full rounded-lg border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 focus:border-cyan-300 focus:ring-cyan-300/70"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-900 text-cyan-400 shadow-sm focus:ring-2 focus:ring-cyan-300" name="remember">
                <span class="ms-2 text-sm text-gray-400">Onthoud mij</span>
            </label>
        </div>

        <div class="flex flex-col-reverse items-stretch gap-4 border-t border-gray-700 pt-5 sm:flex-row sm:items-center sm:justify-between">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm font-semibold text-cyan-300 underline underline-offset-4 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300" href="{{ route('password.request') }}">
                    Wachtwoord vergeten?
                </a>
            @endif

            <x-primary-button class="inline-flex min-h-11 justify-center rounded-lg bg-cyan-400 px-5 py-3 font-bold text-gray-950 hover:bg-cyan-300 focus:bg-cyan-300 focus:ring-cyan-300">
                Inloggen
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
