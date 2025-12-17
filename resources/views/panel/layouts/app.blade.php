<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Malkia Konnect') }} - Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-800 min-h-screen">
    @include('panel.layouts.sidebar')

    <div class="p-4 sm:ml-80 flex flex-col min-h-screen">
        {{-- Top Header / Navbar --}}
        @include('panel.layouts.header')

        {{-- Main Content Wrapper --}}
        <main class="mt-4 flex-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white/60 backdrop-blur-sm">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>