<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Portfolio Muhamad Fadhillah Dinurahman — Full Stack Developer, Mobile Developer, dan IoT Engineer."><meta name="theme-color" content="#070b14">
    <title>Muhamad Fadhillah Dinurahman — Developer Portfolio</title><link rel="shortcut icon" href="/favicon.ico">
    @vite(['resources/css/app.css','resources/css/bootstrap-icons.css','resources/css/css.css', 'resources/js/app.js']) @livewireStyles
</head>
<body class="bg-[#070b14] font-sans text-slate-100 antialiased selection:bg-cyan-300 selection:text-slate-950">
    <a href="#main-content" class="skip-link">Lewati ke konten utama</a>
    @include('layouts.navigation')
    <main id="main-content" class="relative overflow-hidden">{{ $slot }}</main>
    @livewireScripts
</body>
</html>
