<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Malkia Konnect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- SEO -->
        @php
            $appName = config('app.name', 'Malkia Konnect');
            $description = trim($__env->yieldContent('meta_description')) ?: 'Malkia Konnect ni jukwaa la kidijitali linalowaunganisha akina mama wajawazito na waliopo kwenye safari ya uzazi. Pata elimu, huduma za kitaalamu, jamii ya akina mama, matukio na rasilimali za kujifunza kwa ujauzito, kujifungua na baada ya kujifungua (postpartum). Mama siyo peke yake.';
            $canonical = url()->current();
            $ogImage = asset('logo.jpg');
        @endphp
        <meta name="description" content="{{ $description }}">
        <link rel="canonical" href="{{ $canonical }}">
        <meta name="theme-color" content="#f53003">

        <!-- Open Graph -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $appName }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:site_name" content="{{ $appName }}">

        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $appName }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $ogImage }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen {{ (!isset($fullWidth) || !$fullWidth) ? 'flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100' : '' }}">
            @if (!isset($showTopLogo) || $showTopLogo)
                <div class="{{ (isset($fullWidth) && $fullWidth) ? 'p-4' : '' }}">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
            @endif

            @if (isset($fullWidth) && $fullWidth)
                <div class="w-full h-full">
                    {{ $slot }}
                </div>
            @else
                <div class="w-full sm:max-w-3xl lg:max-w-6xl mt-6 px-6 py-4 bg-white/0 shadow-none overflow-visible sm:rounded-lg">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </body>
</html>
