<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <section class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <div class="flex flex-wrap items-end justify-between gap-4 border-b border-gray-700 px-6 py-6 sm:px-8">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Media management</p>
                        <h1 class="mt-1 text-2xl font-bold text-white sm:text-3xl">Image folders</h1>
                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-300">Choose a page to view its images or add new media to that page.</p>
                    </div>
                    <a href="{{ route('images.create') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-gray-600 px-5 py-3 text-sm font-semibold text-gray-200 transition hover:border-cyan-300 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Choose page to upload</a>
                </div>

                @if(session('success'))
                    <div role="status" class="mx-6 mt-6 rounded-lg border border-green-400/50 bg-green-900/60 p-4 text-sm font-medium text-green-100 sm:mx-8">{{ session('success') }}</div>
                @endif

                <div class="grid gap-4 p-6 sm:grid-cols-2 sm:p-8 lg:grid-cols-3">
                    @forelse($pages as $page)
                        <a href="{{ route('images.page', $page) }}" class="group flex min-h-48 flex-col justify-between rounded-xl border border-gray-700 bg-gray-900 p-5 transition hover:border-cyan-300/70 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-300">
                            <div class="flex items-start justify-between gap-4">
                                <span class="rounded-lg bg-cyan-400/10 p-3 text-2xl text-cyan-300" aria-hidden="true">&#128193;</span>
                                <span class="text-xl text-gray-500 transition group-hover:text-cyan-300" aria-hidden="true">&rarr;</span>
                            </div>
                            <div class="mt-8">
                                <h2 class="truncate text-lg font-bold text-white">{{ $page->title }}</h2>
                                <p class="mt-1 text-sm text-gray-400">{{ $page->products_count }} image{{ $page->products_count === 1 ? '' : 's' }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full rounded-lg border border-dashed border-gray-600 px-6 py-12 text-center">
                            <p class="font-semibold text-white">No pages available</p>
                            <p class="mt-2 text-sm text-gray-400">Create a page before adding images.</p>
                            <a href="{{ route('pages.create') }}" class="mt-5 inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300">Create page</a>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
