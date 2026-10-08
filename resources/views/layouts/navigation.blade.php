<nav x-data="{ open: false }" class="border-b border-gray-700 bg-gray-900 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}" class="rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-300">
                        <img src="{{ asset('img/homepage/Logo_Sytske_wit.png') }}" alt="Sytske Puister Fotografie" class="block h-auto w-10 sm:w-13">
                    </a>
                </div>

                <div class="hidden items-center space-x-2 sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>
                    <x-nav-link :href="route('pages.create')" :active="request()->routeIs('pages.create')">
                        Collecties
                    </x-nav-link>
                    <x-nav-link :href="route('images.show')" :active="request()->routeIs('images.show')">
                        Foto’s
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center rounded-lg border border-gray-700 bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-200 transition hover:border-cyan-300 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profiel
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Uitloggen
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" aria-label="Navigatiemenu openen" class="inline-flex items-center justify-center rounded-lg p-2 text-gray-300 transition hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 border-t border-gray-700 px-4 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
        </div>
        <div class="px-4 pb-2 pt-2">
            <x-responsive-nav-link :href="route('pages.create')" :active="request()->routeIs('pages.create')">
                Collecties
            </x-responsive-nav-link>
        </div>
        <div class="px-4 pb-2 pt-2">
            <x-responsive-nav-link :href="route('images.show')" :active="request()->routeIs('images.show')">
                Foto’s
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-gray-700 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-semibold text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profiel
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Uitloggen
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
