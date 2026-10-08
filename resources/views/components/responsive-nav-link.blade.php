@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block min-h-12 w-full rounded-lg border border-cyan-300/30 bg-cyan-400/10 px-4 py-3 text-start text-base font-semibold text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300 transition duration-150 ease-in-out'
            : 'block min-h-12 w-full rounded-lg px-4 py-3 text-start text-base font-semibold text-gray-300 hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
