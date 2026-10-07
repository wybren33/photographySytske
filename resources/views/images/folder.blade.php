<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <a href="{{ route('images.show') }}" class="text-sm font-semibold text-cyan-300 underline underline-offset-4 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">&larr; All folders</a>
                    <p class="mt-5 text-sm font-semibold uppercase tracking-wide text-cyan-300">Page folder</p>
                    <h1 class="mt-1 text-3xl font-bold text-white sm:text-4xl">{{ $page->title }}</h1>
                    <p class="mt-2 text-sm text-gray-400">{{ $images->total() }} image{{ $images->total() === 1 ? '' : 's' }} in this folder</p>
                </div>
                <a href="{{ route('images.create.page', $page) }}" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 shadow-sm transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-gray-900">Add images to this page</a>
            </div>

            @if(session('success'))
                <div role="status" class="mb-6 rounded-lg border border-green-400/50 bg-green-900/60 p-4 text-sm font-medium text-green-100">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div role="alert" class="mb-6 rounded-lg border border-red-400/50 bg-red-900/50 p-4 text-sm text-red-100">{{ $errors->first() }}</div>
            @endif

            <section class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <form action="{{ route('images.bulkDelete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected images?');">
                    @csrf
                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-700 px-6 py-4 sm:px-8">
                        <label class="inline-flex items-center gap-3 text-sm font-semibold text-gray-200">
                            <input id="select-all" type="checkbox" class="h-4 w-4 rounded border-gray-500 bg-gray-900 text-cyan-400 focus:ring-2 focus:ring-cyan-300" onchange="toggleImages(this)">
                            Select all
                        </label>
                        <button type="submit" class="inline-flex min-h-10 items-center justify-center rounded-lg border border-red-400/70 px-4 py-2 text-sm font-semibold text-red-300 transition hover:bg-red-400/10 hover:text-red-200 focus:outline-none focus:ring-2 focus:ring-red-300">Delete selected</button>
                    </div>

                    <div class="p-6 sm:p-8">
                        @if($images->count())
                            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach($images as $image)
                                    <article class="overflow-hidden rounded-xl border border-gray-700 bg-gray-900">
                                        <div class="relative aspect-[4/3]">
                                            <img src="{{ route('media.show', $image) }}" alt="{{ $image->name }}" class="h-full w-full object-cover">
                                            <label for="image-{{ $image->id }}" class="absolute left-3 top-3 rounded-lg bg-gray-950/80 p-2 shadow">
                                                <span class="sr-only">Select {{ $image->name }}</span>
                                                <input id="image-{{ $image->id }}" type="checkbox" name="selected_images[]" value="{{ $image->id }}" class="image-checkbox h-4 w-4 rounded border-gray-500 bg-gray-900 text-cyan-400 focus:ring-2 focus:ring-cyan-300">
                                            </label>
                                        </div>
                                        <div class="p-4">
                                            <h2 class="truncate font-semibold text-white">{{ $image->name }}</h2>
                                            <p class="mt-2 min-h-10 text-sm leading-5 text-gray-400">{{ Str::limit($image->description, 80) }}</p>
                                            <time class="mt-3 block text-xs text-gray-500" datetime="{{ $image->created_at->toIso8601String() }}">Added {{ $image->created_at->format('M j, Y') }}</time>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-lg border border-dashed border-gray-600 px-6 py-14 text-center">
                                <p class="font-semibold text-white">This folder is empty</p>
                                <p class="mt-2 text-sm text-gray-400">Add the first images to {{ $page->title }}.</p>
                                <a href="{{ route('images.create.page', $page) }}" class="mt-5 inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300">Add images</a>
                            </div>
                        @endif
                    </div>
                </form>

                @if($images->hasPages())
                    <div class="border-t border-gray-700 px-6 py-4 sm:px-8">{{ $images->links() }}</div>
                @endif
            </section>
        </div>
    </div>

    <script>
        function toggleImages(source) {
            document.querySelectorAll('.image-checkbox').forEach((checkbox) => {
                checkbox.checked = source.checked;
            });
        }
    </script>
</x-app-layout>
