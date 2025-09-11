<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Huduma Zetu - {{ config('app.name', 'Malkia Konnect') }}</title>
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
                <a href="#" class="hover:text-[#7e22ce]">Duka</a>
                <a href="#" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                <a href="#" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
                <a href="{{ url('/#blog') }}" class="hover:text-[#7e22ce]">Blog</a>
                <a href="#" class="hover:text-[#7e22ce]">Rasilimali</a>
            </nav>
            <div class="hidden sm:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded border text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded border text-sm">Ingia</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded text-sm text-white bg-[#7e22ce] hover:bg-[#6b21a8]">Jisajili</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Our Services</p>
                <h1 class="text-3xl lg:text-5xl font-extrabold">Huduma Zetu</h1>
                <p class="mt-3 text-gray-600 max-w-3xl mx-auto">Orodha pana ya huduma tunazotoa kwa safari yako ya uzazi: elimu, jamii, ushauri wa kitaalamu, na mengi zaidi.</p>
            </div>

            <!-- Filters / tags -->
            <div class="flex flex-wrap items-center gap-2 justify-center mb-8">
                @php
                    $tags = ['Elimu','Jamii','Wataalamu','Warsha','Baada ya kujifungua','Lishe','Afya ya akili','Fitnesi','Mtoto mchanga','Duka'];
                @endphp
                @foreach($tags as $t)
                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">{{ $t }}</span>
                @endforeach
            </div>

            <!-- Services grid with high-quality icons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- 1 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#7e22ce]/10 text-[#7e22ce] flex items-center justify-center">
                        <!-- academic-cap -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M11.7 2.1a1 1 0 01.6 0l9 3a1 1 0 010 1.9l-3.3 1.1V14a5 5 0 11-10 0V8.1L2.7 7a1 1 0 010-1.9l9-3z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Kozi: Trimester 1</h3>
                    <p class="text-sm text-gray-600">Mwongozo wa wiki kwa wiki, dalili, vipimo, na vidokezo vya usalama.</p>
                </div>
                <!-- 2 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#f59e0b]/10 text-[#f59e0b] flex items-center justify-center">
                        <!-- users -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M16 11a4 4 0 10-4-4 4 4 0 004 4zM8 11a4 4 0 10-4-4 4 4 0 004 4zM2 18a4 4 0 014-4h4a4 4 0 014 4v2H2zM14 20v-2a6 6 0 0110 0v2z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Jamii ya Malkia</h3>
                    <p class="text-sm text-gray-600">Group za mazungumzo, maswali na majibu, na sapoti ya kila siku.</p>
                </div>
                <!-- 3 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#10b981]/10 text-[#10b981] flex items-center justify-center">
                        <!-- stethoscope like -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M7 2a1 1 0 011 1v4a3 3 0 106 0V3a1 1 0 112 0v4a5 5 0 11-10 0V3a1 1 0 011-1zm11 9a3 3 0 100 6 3 3 0 000-6zm-4.4 6.8A6.5 6.5 0 014 11V9a1 1 0 012 0v2a4.5 4.5 0 108.999.001V14a1 1 0 11-2 0v-1.086A6.502 6.502 0 0113.6 17.8z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Ushauri wa mkunga</h3>
                    <p class="text-sm text-gray-600">Session 1:1 na mkunga kwa maswali maalum na tathmini.</p>
                </div>
                <!-- 4 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#3b82f6]/10 text-[#3b82f6] flex items-center justify-center">
                        <!-- video camera -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M15 8.5V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-2.5l6 3V5.5z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Warsha za uzazi</h3>
                    <p class="text-sm text-gray-600">Warsha za moja kwa moja mtandaoni zikiongozwa na wataalamu.</p>
                </div>
                <!-- 5 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#ef4444]/10 text-[#ef4444] flex items-center justify-center">
                        <!-- heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41.81 4.5 2.09A6 6 0 0 1 21.5 4C24 4 26 6 26 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Huduma baada ya kujifungua</h3>
                    <p class="text-sm text-gray-600">Kunyonyesha, usingizi wa mtoto, afya ya akili na miadi za ufuatiliaji.</p>
                </div>
                <!-- 6 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#8b5cf6]/10 text-[#8b5cf6] flex items-center justify-center">
                        <!-- shopping bag -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M6 7V6a6 6 0 1112 0v1h2a1 1 0 011 1v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a1 1 0 011-1h2zm2 0h8V6a4 4 0 10-8 0v1z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Lishe ya mama</h3>
                    <p class="text-sm text-gray-600">Mipango ya chakula, virutubisho vinavyoshauriwa, na ushauri wa diet.</p>
                </div>
                <!-- 7 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#06b6d4]/10 text-[#06b6d4] flex items-center justify-center">
                        <!-- face smile -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm-3 8a1.5 1.5 0 11-1.5 1.5A1.5 1.5 0 019 10zm9 0a1.5 1.5 0 11-1.5 1.5A1.5 1.5 0 0118 10zM7 15a5 5 0 0010 0z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Afya ya akili</h3>
                    <p class="text-sm text-gray-600">Ushauri na rasilimali za kuimarisha ustawi wa hisia wakati wa ujauzito.</p>
                </div>
                <!-- 8 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#f59e0b]/10 text-[#f59e0b] flex items-center justify-center">
                        <!-- clipboard-check -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M9 2h6a2 2 0 012 2v2h-2V4H9v2H7V4a2 2 0 012-2zm-2 6h10v12a2 2 0 01-2 2H9a2 2 0 01-2-2zm3.5 7.5L8 15l-1.5 1.5L12 22l8-8-1.5-1.5L12 19z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Maandalizi ya kujifungua</h3>
                    <p class="text-sm text-gray-600">Mpango wa kuzalisha, begi la hospitali, dalili za kuanza leba.</p>
                </div>
                <!-- 9 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#22c55e]/10 text-[#22c55e] flex items-center justify-center">
                        <!-- baby -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M12 3a5 5 0 015 5v1h1a3 3 0 110 6h-1a5 5 0 11-10 0H6a3 3 0 110-6h1V8a5 5 0 015-5z"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Mtoto mchanga (0-3m)</h3>
                    <p class="text-sm text-gray-600">Kuoga, kubadilisha, dalili za hatari, na chanjo.</p>
                </div>
                <!-- 10 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#7e22ce]/10 text-[#7e22ce] flex items-center justify-center">
                        <!-- film -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M4 4h16v16H4zM8 4v16M16 4v16M4 8h16M4 16h16"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Kozi za video</h3>
                    <p class="text-sm text-gray-600">Maktaba ya video ya mada mbalimbali inayoweza kutazamwa wakati wowote.</p>
                </div>
                <!-- 11 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#e11d48]/10 text-[#e11d48] flex items-center justify-center">
                        <!-- cart -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M3 4h2l3 12h10l3-8H8"/><circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Duka la mama</h3>
                    <p class="text-sm text-gray-600">Bidhaa zilizopendekezwa na wataalamu kwa kila hatua ya safari yako.</p>
                </div>
                <!-- 12 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-xl transition duration-300">
                    <div class="h-12 w-12 rounded-xl bg-[#25d366]/10 text-[#25d366] flex items-center justify-center">
                        <!-- phone -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M2.25 6.75h3A2.25 2.25 0 018 9v.75A2.25 2.25 0 016 12H6a11.25 11.25 0 007.5 7.5h0A2.25 2.25 0 0115.75 18v-.75A2.25 2.25 0 0118 15h3"/></svg>
                    </div>
                    <h3 class="mt-4 font-semibold">Huduma ya simu/WhatsApp</h3>
                    <p class="text-sm text-gray-600">Usaidizi wa haraka kupitia ujumbe mfupi au sauti.</p>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
