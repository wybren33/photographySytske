<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('img/homepage/Logo_Sytske_wit.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center bg-gray-950 px-4 py-10 sm:px-6">
            <div class="mb-8 text-center">
                <a href="{{ route('home') }}" class="inline-block rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-4 focus:ring-offset-gray-950">
                    <img src="{{ asset('img/homepage/Logo_Sytske_wit.png') }}" alt="Sytske Puister Photography" class="mx-auto h-auto w-32">
                </a>
                <p class="mt-4 text-xs font-semibold uppercase tracking-[0.2em] text-cyan-300">Beheeromgeving</p>
            </div>

            <div class="w-full max-w-md overflow-hidden rounded-xl border border-gray-700 bg-gray-800 px-6 py-7 shadow-2xl sm:px-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
