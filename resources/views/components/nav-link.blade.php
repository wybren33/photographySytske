@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex min-h-11 items-center rounded-lg bg-cyan-400/10 px-4 py-3 text-sm font-semibold leading-5 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-cyan-300 transition duration-150 ease-in-out'
            : 'inline-flex min-h-11 items-center rounded-lg px-4 py-3 text-sm font-semibold leading-5 text-gray-300 hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-cyan-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
