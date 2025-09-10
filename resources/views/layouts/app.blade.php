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
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('logo.jpg') }}">

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

        <!-- JSON-LD Structured Data -->
        @php
            $siteUrl = config('app.url', url('/'));
        @endphp
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "{{ $appName }}",
          "url": "{{ $siteUrl }}",
          "logo": "{{ $ogImage }}"
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "name": "{{ $appName }}",
          "url": "{{ $siteUrl }}",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ $siteUrl }}/search?q={query}",
            "query-input": "required name=query"
          }
        }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
