<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Accountbeheer</p>
                <h1 class="mt-1 text-3xl font-bold text-white">Profiel</h1>
                <p class="mt-2 text-sm text-gray-400">Beheer je gegevens, wachtwoord en accountinstellingen.</p>
            </div>
            <div class="space-y-6">
            <div class="rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-xl border border-red-400/30 bg-gray-800 p-6 shadow-lg sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
