<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-800">

    {{-- Navbar (fixed) --}}
    @include('admin.layouts.navigation')

    {{-- Content --}}
    <main class="min-h-screen max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        @yield('content')
    </main>

</body>
</html>
