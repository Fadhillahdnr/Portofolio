<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portfolio') }}</title>

    <link rel="shortcut icon" href="/favicon.ico">

    @vite(['resources/css/app.css','resources/css/bootstrap-icons.css','resources/css/css.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    @include('layouts.navigation')

    <!-- IMPORTANT: HAPUS container wrapper -->
    <main class="relative">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>