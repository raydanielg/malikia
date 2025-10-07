<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuhusu Sisi - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <!-- Header (same as home) -->
    <header class="w-full sticky top-0 z-40 bg-white/80 backdrop-blur border-b">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Logo" class="h-8 w-8 rounded object-cover"/>
                <span class="font-semibold">{{ config('app.name', 'Malkia Konnect') }}</span>
            </a>
            <nav class="hidden lg:flex items-center gap-6 text-sm">
                <a href="/" class="hover:text-[#7e22ce]">Home</a>
                <a href="{{ route('services') }}" class="hover:text-[#7e22ce]">Huduma</a>
                <a href="{{ route('about') }}" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                <a href="{{ url('/#blog') }}" class="hover:text-[#7e22ce]">Blog</a>
                <a href="{{ url('/#newsletter') }}" class="hover:text-[#7e22ce]">Jarida</a>
            </nav>
            <div class="hidden sm:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded border text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded border text-sm">Ingia</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        <!-- Hero -->
        <section class="bg-gray-50 py-14 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">About Us</p>
                <h1 class="text-3xl lg:text-5xl font-extrabold mb-3">Tunawawezesha akina mama kila hatua</h1>
                <p class="text-gray-700 max-w-3xl mx-auto">{{ config('app.name', 'Malkia Konnect') }} ni jukwaa la elimu, jamii na ushauri wa kitaalamu kwa safari ya ujauzito hadi baada ya kujifungua. Tunakusanya rasilimali bora ili usitembee pekee yako.</p>
            </div>
        </section>

        <!-- Mission / Vision / Values -->
        <section class="py-12 lg:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 border rounded-2xl bg-white">
                    <div class="h-10 w-10 rounded-lg bg-[#7e22ce]/10 text-[#7e22ce] flex items-center justify-center mb-3">
                        <!-- target icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm1 2.07V5a1 1 0 01-2 0V4.07A8.005 8.005 0 004.07 11H5a1 1 0 010 2H4.07A8.005 8.005 0 0011 19.93V19a1 1 0 012 0v.93A8.005 8.005 0 0019.93 13H19a1 1 0 010-2h.93A8.005 8.005 0 0013 4.07z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Dira Yetu</h3>
                    <p class="text-sm text-gray-600">Kutoa mwongozo wa kuaminika kwa kila mzazi ili ukuzaji wa afya na ustawi uwe rahisi na wenye upendo.</p>
                </div>
                <div class="p-6 border rounded-2xl bg-white">
                    <div class="h-10 w-10 rounded-lg bg-[#f59e0b]/10 text-[#f59e0b] flex items-center justify-center mb-3">
                        <!-- light-bulb -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M12 2a7 7 0 00-4 12.9V18h8v-3.1A7 7 0 0012 2zM9 20h6v2H9z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Wajibu Wetu</h3>
                    <p class="text-sm text-gray-600">Kujenga jamii salama yenye taarifa sahihi, kusikiliza na kusaidia kila mama na familia.</p>
                </div>
                <div class="p-6 border rounded-2xl bg-white">
                    <div class="h-10 w-10 rounded-lg bg-[#10b981]/10 text-[#10b981] flex items-center justify-center mb-3">
                        <!-- shield-check -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M12 2l8 4v6c0 5-3.5 9.74-8 10-4.5-.26-8-5-8-10V6zM11 14l-2-2 1.4-1.4L11 11.2l3.6-3.6L16 9l-5 5z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Maadili</h3>
                    <p class="text-sm text-gray-600">Huruma, usalama, faragha, na ubora wa taarifa ndio msingi wa huduma zetu.</p>
                </div>
            </div>
        </section>

        <!-- Team / Experts teaser -->
        <section class="py-8 lg:py-12 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-extrabold mb-6">Wataalamu na Washirika</h2>
                <p class="text-gray-700 max-w-3xl">Tunafanya kazi na wakunga, madaktari, na washauri wa lishe pamoja na mashirika mbalimbali ili kuhakikisha unapata msaada sahihi. Kama ungependa kushirikiana nasi, wasiliana kupitia jarida au ukurasa wa mawasiliano.</p>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <h3 class="text-2xl font-bold mb-3">Jiunge nasi leo</h3>
                <p class="text-gray-600 mb-6">Anza kwa kujaza fomu yetu ya haraka; tutakupa mwongozo unaokufaa.</p>
                <a href="{{ route('intake.create') }}" class="px-6 py-3 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Jaza fomu yetu</a>
            </div>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>
