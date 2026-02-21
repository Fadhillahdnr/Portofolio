<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 overflow-x-hidden">

    {{-- ================= NAVIGATION ================= --}}
    @include('layouts.navigation')

    {{-- ================= PAGE WRAPPER ================= --}}
    <div class="relative">

        {{-- OPTIONAL HEADER --}}
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow relative z-30">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- ================= CONTENT ================= --}}
        <main class="relative z-10">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts
</body>
</html>