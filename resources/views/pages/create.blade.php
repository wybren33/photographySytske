<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <div class="border-b border-gray-700 px-6 py-5 sm:px-8">
                    <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Content management</p>
                    <h1 class="mt-1 text-2xl font-bold text-white sm:text-3xl">Create page</h1>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-300">Add a title, content and password to publish a new page.</p>
                </div>

                @if(session('success'))
                <div role="status" class="mx-6 mt-6 rounded-lg border border-green-400/50 bg-green-900/60 p-4 text-sm font-medium text-green-100 sm:mx-8">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('pages.store') }}" method="POST" class="space-y-6 px-6 py-6 sm:px-8 sm:py-8">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-100">Title <span class="text-cyan-300">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required maxlength="255" autocomplete="off" aria-describedby="title-help title-error" @error('title') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        <p id="title-help" class="mt-2 text-sm text-gray-400">Choose a short, descriptive title.</p>
                        @error('title')
                            <p id="title-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-semibold text-gray-100">Content <span class="text-cyan-300">*</span></label>
                        <textarea name="content" id="content" required aria-describedby="content-error" @error('content') aria-invalid="true" @enderror class="mt-2 block min-h-40 w-full resize-y rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">{{ old('content') }}</textarea>
                        @error('content')
                            <p id="content-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-100">Password <span class="text-cyan-300">*</span></label>
                        <input type="password" name="password" id="password" required minlength="6" autocomplete="new-password" aria-describedby="password-help password-error" @error('password') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        <p id="password-help" class="mt-2 text-sm text-gray-400">Use at least 6 characters.</p>
                        @error('password')
                            <p id="password-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end border-t border-gray-700 pt-6">
                        <button type="submit" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 shadow-sm transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-gray-800">Create page</button>
                    </div>
                </form>
            </div>

            <section aria-labelledby="existing-pages-heading" class="mt-8 overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <div class="border-b border-gray-700 px-6 py-5 sm:px-8">
                    <h2 id="existing-pages-heading" class="text-xl font-bold text-white sm:text-2xl">Existing pages</h2>
                    <p class="mt-1 text-sm text-gray-400">Manage pages that are already published.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[42rem] text-left text-sm text-gray-200">
                        <caption class="sr-only">Existing pages and available actions</caption>
                        <thead class="bg-gray-900 text-xs uppercase tracking-wide text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-4">Title</th>
                            <th scope="col" class="px-6 py-4">Content</th>
                            <th scope="col" class="px-6 py-4">Created</th>
                            <th scope="col" class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($pages as $page)
                        <tr class="bg-gray-800 transition hover:bg-gray-700">
                            <th scope="row" class="whitespace-nowrap px-6 py-4 font-semibold text-white">{{ $page->title }}</th>
                            <td class="max-w-xs px-6 py-4 text-gray-300">{{ Str::limit($page->content, 50) }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-gray-300"><time datetime="{{ $page->created_at->toIso8601String() }}">{{ $page->created_at->format('M d, Y') }}</time></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('pages.edit', $page) }}" class="rounded-md px-2 py-1 font-semibold text-cyan-300 underline decoration-cyan-300/50 underline-offset-4 transition hover:bg-cyan-400/10 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Edit</a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md px-2 py-1 font-semibold text-red-300 underline decoration-red-300/50 underline-offset-4 transition hover:bg-red-400/10 hover:text-red-200 focus:outline-none focus:ring-2 focus:ring-red-300">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @if($pages->isEmpty())
                    <p class="px-6 py-8 text-center text-sm text-gray-300">No pages found.</p>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
