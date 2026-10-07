<x-app-layout>
    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">
                <div class="border-b border-gray-700 px-6 py-5 sm:px-8">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wide text-cyan-300">Media management</p>
                            <h1 class="mt-1 text-2xl font-bold text-white sm:text-3xl">Add images</h1>
                            <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-300">Upload one or more images to a page folder.</p>
                        </div>
                        <a href="{{ route('images.show') }}" class="rounded-lg border border-gray-600 px-4 py-2 text-sm font-semibold text-gray-200 transition hover:border-cyan-300 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Back to folders</a>
                    </div>
                </div>

                @if(session('success'))
                    <div role="status" class="mx-6 mt-6 rounded-lg border border-green-400/50 bg-green-900/60 p-4 text-sm font-medium text-green-100 sm:mx-8">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div role="alert" class="mx-6 mt-6 rounded-lg border border-red-400/50 bg-red-900/50 p-4 text-sm text-red-100 sm:mx-8">
                        <p class="font-semibold">Please correct the following:</p>
                        <ul class="mt-2 list-disc space-y-1 pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 px-6 py-6 sm:px-8 sm:py-8">
                    @csrf
                    <div>
                        <label for="page_id" class="block text-sm font-semibold text-gray-100">Page <span class="text-cyan-300">*</span></label>
                        @if($selectedPage)
                            <input type="hidden" name="page_id" value="{{ $selectedPage->id }}">
                            <div class="mt-2 flex items-center justify-between gap-4 rounded-lg border border-cyan-300/40 bg-cyan-400/10 px-4 py-3">
                                <span class="font-semibold text-white">{{ $selectedPage->title }}</span>
                                <a href="{{ route('images.show') }}" class="text-sm font-semibold text-cyan-300 underline underline-offset-4 hover:text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">Change</a>
                            </div>
                        @else
                            <select name="page_id" id="page_id" required aria-describedby="page-error" @error('page_id') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                                <option value="">Select a page</option>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" @selected(old('page_id') == $page->id)>{{ $page->title }}</option>
                                @endforeach
                            </select>
                        @endif
                        @error('page_id')<p id="page-error" class="mt-2 text-sm font-medium text-red-300">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-100">Image name <span class="text-cyan-300">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required maxlength="255" aria-describedby="name-error" @error('name') aria-invalid="true" @enderror class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        @error('name')<p id="name-error" class="mt-2 text-sm font-medium text-red-300">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-100">Description <span class="text-cyan-300">*</span></label>
                        <textarea name="description" id="description" required aria-describedby="description-error" @error('description') aria-invalid="true" @enderror class="mt-2 block min-h-32 w-full resize-y rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-gray-100 placeholder-gray-500 shadow-sm transition focus:border-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">{{ old('description') }}</textarea>
                        @error('description')<p id="description-error" class="mt-2 text-sm font-medium text-red-300">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-100">Images <span class="text-cyan-300">*</span></label>
                        <input type="file" name="image[]" id="image" accept="image/jpeg,image/png,image/gif" multiple required aria-describedby="image-help image-error" @error('image.*') aria-invalid="true" @enderror class="mt-2 block w-full cursor-pointer rounded-lg border border-gray-600 bg-gray-900 text-sm text-gray-300 file:mr-4 file:border-0 file:border-r file:border-gray-600 file:bg-gray-700 file:px-4 file:py-3 file:font-semibold file:text-gray-100 hover:file:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-300/70">
                        <p id="image-help" class="mt-2 text-sm text-gray-400">JPEG, PNG or GIF files. You can select multiple images.</p>
                        @error('image.*')<p id="image-error" class="mt-2 text-sm font-medium text-red-300">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex flex-col-reverse gap-3 border-t border-gray-700 pt-6 sm:flex-row sm:justify-end">
                        <a href="{{ route('images.show') }}" class="inline-flex min-h-11 items-center justify-center rounded-lg border border-gray-600 px-5 py-3 text-sm font-semibold text-gray-200 transition hover:border-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-300">Cancel</a>
                        <button type="submit" class="inline-flex min-h-11 items-center justify-center rounded-lg bg-cyan-400 px-5 py-3 text-sm font-bold text-gray-950 shadow-sm transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-gray-800">Upload images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
