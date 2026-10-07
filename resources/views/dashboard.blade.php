<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Werkruimte</p>
                    <h1 class="mt-1 text-3xl font-bold text-white sm:text-4xl">Dashboard</h1>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-300">Beheer je collecties en fotobibliotheek vanaf één plek.</p>
                </div>
                <div class="text-sm text-gray-400">{{ now()->format('F j, Y') }}</div>
            </div>

            <section aria-labelledby="summary-heading">
                <h2 id="summary-heading" class="sr-only">Workspace summary</h2>
                <div class="grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('pages.create') }}" class="group rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg transition hover:border-cyan-300/70 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-300">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-300">Pagina’s</p>
                                <p class="mt-2 text-4xl font-bold text-white">{{ $pageCount }}</p>
                                <p class="mt-2 text-sm text-gray-400">Maak en bewerk je gepubliceerde collecties.</p>
                            </div>
                            <span class="rounded-lg bg-cyan-400/10 px-3 py-2 text-cyan-300 transition group-hover:bg-cyan-400/20" aria-hidden="true">&rarr;</span>
                        </div>
                    </a>
                    <a href="{{ route('images.show') }}" class="group rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg transition hover:border-cyan-300/70 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-300">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-300">Afbeeldingen</p>
                                <p class="mt-2 text-4xl font-bold text-white">{{ $imageCount }}</p>
                                <p class="mt-2 text-sm text-gray-400">Bekijk, upload en verwijder foto’s.</p>
                            </div>
                            <span class="rounded-lg bg-cyan-400/10 px-3 py-2 text-cyan-300 transition group-hover:bg-cyan-400/20" aria-hidden="true">&rarr;</span>
                        </div>
                    </a>
                </div>
            </section>

            <section aria-labelledby="actions-heading" class="mt-8 rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg sm:p-8">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h2 id="actions-heading" class="text-xl font-bold text-white">Snelle acties</h2>
                        <p class="mt-1 text-sm text-gray-400">Start de meest gebruikte taken direct.</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('pages.create') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-gray-800">Collectie maken</a>
                        <a href="{{ route('images.create') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-gray-600 px-5 py-3 text-sm font-semibold text-gray-200 transition hover:border-cyan-300 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Foto’s uploaden</a>
                    </div>
                </div>
            </section>

            <section aria-labelledby="sharing-heading" class="mt-8 overflow-hidden rounded-xl border border-cyan-300/30 bg-gray-800 shadow-lg">
                <div class="border-b border-gray-700 px-6 py-5 sm:px-8">
                    <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Klanttoegang</p>
                    <h2 id="sharing-heading" class="mt-1 text-xl font-bold text-white">Zo deel je een collectie</h2>
                    <p class="mt-2 max-w-3xl text-sm leading-6 text-gray-300">Collecties staan bewust niet openbaar op de website. Stuur je klant de persoonlijke link hieronder en deel het wachtwoord apart, bijvoorbeeld via WhatsApp en e-mail.</p>
                </div>
                <div class="grid gap-6 px-6 py-6 sm:px-8 lg:grid-cols-[.8fr_1.2fr]">
                    <ol class="space-y-4 text-sm text-gray-300">
                        <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-cyan-400 font-bold text-gray-950">1</span><span>Kies hieronder de juiste collectie en kopieer de persoonlijke link.</span></li>
                        <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-cyan-400 font-bold text-gray-950">2</span><span>Stuur de link naar je klant. De link bevat geen wachtwoord.</span></li>
                        <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-cyan-400 font-bold text-gray-950">3</span><span>Deel het wachtwoord via een ander kanaal. Zo blijven link en wachtwoord niet in één bericht staan.</span></li>
                    </ol>
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-white">Persoonlijke links</h3>
                        @forelse($pages as $page)
                            <div class="flex flex-col gap-3 rounded-lg border border-gray-700 bg-gray-900 p-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <p class="truncate font-semibold text-white">{{ $page->title }}</p>
                                    <p class="mt-1 truncate text-xs text-gray-400">{{ route('template.show', $page) }}</p>
                                </div>
                                <button type="button" class="copy-link inline-flex min-h-10 shrink-0 items-center justify-center rounded-lg border border-gray-600 px-3 py-2 text-sm font-semibold text-cyan-300 transition hover:border-cyan-300 hover:bg-cyan-400/10 focus:outline-none focus:ring-2 focus:ring-cyan-300" data-copy-link="{{ route('template.show', $page) }}">Kopieer link</button>
                            </div>
                        @empty
                            <p class="rounded-lg border border-dashed border-gray-600 px-4 py-6 text-sm text-gray-400">Maak eerst een collectie aan om een deel-link te krijgen.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            <div class="mt-8 grid gap-8 lg:grid-cols-2">
                <section aria-labelledby="pages-heading" class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                    <div class="flex items-center justify-between border-b border-gray-700 px-6 py-5">
                        <div>
                            <h2 id="pages-heading" class="text-xl font-bold text-white">Recente collecties</h2>
                            <p class="mt-1 text-sm text-gray-400">Je laatst bijgewerkte collecties.</p>
                        </div>
                        <a href="{{ route('pages.create') }}" class="text-sm font-semibold text-cyan-300 underline underline-offset-4 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Bekijk alles</a>
                    </div>
                    <div class="divide-y divide-gray-700">
                        @forelse($pages as $page)
                            <div class="flex items-center justify-between gap-4 px-6 py-4">
                                <div class="min-w-0">
                                    <a href="{{ route('pages.edit', $page) }}" class="truncate font-semibold text-white hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">{{ $page->title }}</a>
                                    <p class="mt-1 text-sm text-gray-400">{{ $page->products_count }} gekoppelde foto{{ $page->products_count === 1 ? '' : '’s' }}</p>
                                </div>
                                <time class="whitespace-nowrap text-sm text-gray-400" datetime="{{ $page->created_at->toIso8601String() }}">{{ $page->created_at->format('M j, Y') }}</time>
                            </div>
                        @empty
                            <p class="px-6 py-10 text-center text-sm text-gray-300">Nog geen collecties.</p>
                        @endforelse
                    </div>
                </section>

                <section aria-labelledby="images-heading" class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                    <div class="flex items-center justify-between border-b border-gray-700 px-6 py-5">
                        <div>
                            <h2 id="images-heading" class="text-xl font-bold text-white">Recente foto’s</h2>
                            <p class="mt-1 text-sm text-gray-400">De laatst toegevoegde foto’s.</p>
                        </div>
                        <a href="{{ route('images.show') }}" class="text-sm font-semibold text-cyan-300 underline underline-offset-4 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Bekijk alles</a>
                    </div>
                    <div class="divide-y divide-gray-700">
                        @forelse($images as $image)
                            <div class="flex items-center gap-4 px-6 py-4">
                                <img src="{{ route('media.show', $image) }}" alt="{{ $image->name }}" class="h-14 w-20 shrink-0 rounded-lg border border-gray-600 object-cover">
                                <div class="min-w-0">
                                    <p class="truncate font-semibold text-white">{{ $image->name }}</p>
                                    <p class="mt-1 truncate text-sm text-gray-400">{{ $image->page?->title ?? 'Geen collectie toegewezen' }}</p>
                                </div>
                                <time class="ml-auto whitespace-nowrap text-sm text-gray-400" datetime="{{ $image->created_at->toIso8601String() }}">{{ $image->created_at->format('M j') }}</time>
                            </div>
                        @empty
                            <p class="px-6 py-10 text-center text-sm text-gray-300">Nog geen foto’s.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.copy-link').forEach((button) => {
            button.addEventListener('click', async () => {
                await navigator.clipboard.writeText(button.dataset.copyLink);
                const originalText = button.textContent;
                button.textContent = 'Gekopieerd';
                window.setTimeout(() => { button.textContent = originalText; }, 1800);
            });
        });
    </script>
</x-app-layout>
