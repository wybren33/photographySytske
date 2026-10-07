<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <div class="border-b border-gray-700 px-6 py-5 sm:px-8">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Content management</p>
                            <h1 class="mt-1 text-2xl font-bold text-white sm:text-3xl">Edit page</h1>
                            <p class="mt-2 text-sm leading-6 text-gray-300">Update the title or content of this page.</p>
                        </div>
                        <a href="{{ route('pages.create') }}" class="rounded-lg border border-gray-600 px-4 py-2 text-sm font-semibold text-gray-200 transition hover:border-cyan-300 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Back to pages</a>
                    </div>
                </div>

                @if(session('success'))
                    <div role="status" class="mx-6 mt-6 rounded-lg border border-green-400/50 bg-green-900/60 p-4 text-sm font-medium text-green-100 sm:mx-8">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('pages.update', $page->id) }}" method="POST" class="space-y-6 px-6 py-6 sm:px-8 sm:py-8">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-100">Title <span class="text-cyan-300">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required maxlength="255" autocomplete="off" aria-describedby="title-help title-error" @error('title') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        <p id="title-help" class="mt-2 text-sm text-gray-400">Choose a short, descriptive title.</p>
                        @error('title')
                            <p id="title-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-semibold text-gray-100">Content <span class="text-cyan-300">*</span></label>
                        <textarea name="content" id="content" required aria-describedby="content-error" @error('content') aria-invalid="true" @enderror class="mt-2 block min-h-56 w-full resize-y rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <p id="content-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-100">Nieuw wachtwoord</label>
                        <input type="password" name="password" id="password" minlength="6" autocomplete="new-password" aria-describedby="password-help password-error" @error('password') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        <p id="password-help" class="mt-2 text-sm text-gray-400">Laat leeg om het huidige wachtwoord te behouden. Minimaal 6 tekens.</p>
                        @error('password')
                            <p id="password-error" class="mt-2 text-sm font-medium text-red-300" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col-reverse gap-3 border-t border-gray-700 pt-6 sm:flex-row sm:justify-end">
                        <a href="{{ route('pages.create') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-gray-600 px-5 py-3 text-sm font-semibold text-gray-200 transition hover:border-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-300">Cancel</a>
                        <button type="submit" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 shadow-sm transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-gray-800">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
