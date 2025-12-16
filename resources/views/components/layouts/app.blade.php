<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body class="bg-[#2FA8E0] text-white font-sans">

            {{-- HEADER --}}
            <header class="bg-[#1C3557] px-8 py-4">
                <h1 class="text-xl font-bold tracking-wide uppercase">
                    Leaderboard
                </h1>
            </header>

            {{ $slot }}

            @livewireScripts
        </body>
</html>
