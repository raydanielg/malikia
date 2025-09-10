<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <!-- Header -->
    <header class="w-full sticky top-0 z-40 bg-white/80 backdrop-blur border-b">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand -->
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Logo" class="h-8 w-8 rounded object-cover"/>
                <span class="font-semibold">{{ config('app.name', 'Malkia Konnect') }}</span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-6 text-sm">
                <a href="/" class="hover:text-[#7e22ce]">Home</a>
                <a href="#services" class="hover:text-[#7e22ce]">Huduma</a>
                <a href="#duka" class="hover:text-[#7e22ce]">Duka</a>
                <a href="#kuhusu" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                <a href="#wasiliana" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
                <a href="#blog" class="hover:text-[#7e22ce]">Blog</a>
                <a href="#rasilimali" class="hover:text-[#7e22ce]">Rasilimali</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded border text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded border text-sm">Ingia</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded text-sm text-white bg-[#7e22ce] hover:bg-[#6b21a8]">Jisajili</a>
                @endauth
            </div>

            <!-- Mobile toggle -->
            <div class="lg:hidden">
                <input id="nav-toggle" type="checkbox" class="peer hidden" />
                <label for="nav-toggle" class="inline-flex items-center justify-center h-10 w-10 rounded-md hover:bg-gray-100 cursor-pointer">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </label>
                <!-- Mobile menu panel -->
                <div class="peer-checked:block hidden absolute top-16 inset-x-0 bg-white border-b shadow-sm">
                    <nav class="px-4 py-4 flex flex-col gap-3 text-sm">
                        <a href="/" class="hover:text-[#7e22ce]">Home</a>
                        <a href="#services" class="hover:text-[#7e22ce]">Huduma</a>
                        <a href="#duka" class="hover:text-[#7e22ce]">Duka</a>
                        <a href="#kuhusu" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                        <a href="#wasiliana" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
                        <a href="#blog" class="hover:text-[#7e22ce]">Blog</a>
                        <a href="#rasilimali" class="hover:text-[#7e22ce]">Rasilimali</a>
                        <div class="pt-2 flex flex-col gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded border text-sm">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 rounded border text-sm">Ingia</a>
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded text-sm text-white bg-[#7e22ce] hover:bg-[#6b21a8]">Jisajili</a>
                            @endauth
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative overflow-hidden">
        <div class="mx-auto max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-10 items-center px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div>
                <h1 class="text-4xl lg:text-6xl font-extrabold leading-tight mb-2 animate-fade-up">Karibu Malkia Konnect</h1>
                <p class="text-xl lg:text-2xl font-semibold text-gray-800 mb-4 animate-fade-up" style="--delay:.05s">"Your Pocket Midwife"</p>
                <p class="text-lg text-gray-700 mb-2 max-w-2xl animate-fade-up" style="--delay:.08s">Motherhood has no manual, but you don’t have to go through it alone.</p>
                <p class="text-lg text-gray-700 mb-8 max-w-2xl animate-fade-up" style="--delay:.12s">In just one minute, let us know your needs and we will guide you step by step.</p>
                <div class="flex flex-wrap gap-3 animate-fade-up" style="--delay:.15s">
                    <a href="{{ route('intake.create') }}" class="px-6 py-3 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Jaza fomu yetu</a>
                    <a href="{{ route('login') }}" class="px-6 py-3 rounded-md border border-[#7e22ce] text-[#7e22ce] hover:bg-[#f3e8ff]">Ingia</a>
                </div>
                <div class="mt-8 flex items-center gap-4 animate-fade-up" style="--delay:.25s">
                    <div class="flex -space-x-2">
                        <img src="https://i.pravatar.cc/48?img=12" class="h-10 w-10 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                        <img src="https://i.pravatar.cc/48?img=32" class="h-10 w-10 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                        <img src="https://i.pravatar.cc/48?img=7" class="h-10 w-10 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                    </div>
                    <p class="text-sm text-gray-600"><span class="font-semibold">15.7k+</span> wametupatia nyota 5</p>
                </div>
            </div>
            <div x-data="{
                    slides: [
                        '{{ asset('african-pregnant-woman-is-sitting-floor-dressed-with-african-pattern-fabric_156889-8 (1).jpg') }}',
                        '{{ asset('young-indian-pregnant-woman-standing-studio-setting_1187-448987-removebg-preview.png') }}'
                    ],
                    i: 0,
                    next(){ this.i = (this.i + 1) % this.slides.length },
                }" x-init="setInterval(() => next(), 5000)" class="relative w-full h-[320px] lg:h-[480px] overflow-hidden">
                <template x-for="(src, idx) in slides" :key="idx">
                    <img :src="src" alt="Slideshow" class="absolute inset-0 w-full h-full object-cover"
                         x-show="i === idx"
                         x-transition:enter="transform transition ease-out duration-700"
                         x-transition:enter-start="translate-x-full opacity-0"
                         x-transition:enter-end="translate-x-0 opacity-100"
                         x-transition:leave="transform transition ease-in duration-700"
                         x-transition:leave-start="translate-x-0 opacity-100"
                         x-transition:leave-end="-translate-x-full opacity-0"
                    />
                </template>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Our Services</p>
                <h2 class="text-3xl lg:text-4xl font-extrabold">Huduma Zetu</h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Tunatoa huduma shirikishi kwa mama kabla, wakati na baada ya kujifungua. Chagua unachohitaji, tutakupa mwongozo unaofaa.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.05s">
                    <div class="h-12 w-12 rounded-lg bg-[#7e22ce]/10 text-[#7e22ce] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Academic Cap Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M11.7 2.1a1 1 0 01.6 0l9 3a1 1 0 010 1.9l-3.29 1.1A4 4 0 0118 11.17V14a1 1 0 11-2 0v-2.83a2 2 0 00-1.34-1.89L12 8.53 5 10.86V14a1 1 0 11-2 0v-3.5L1.7 9a1 1 0 010-1.9l9-3z"/><path d="M6 15.5a1 1 0 011.316-.949l4 1.25a2 2 0 001.368 0l4-1.25A1 1 0 0118 16.5V18a4 4 0 11-8 0v-1.5l-3-.94V18a6 6 0 0012 0v-1.5a1 1 0 112 0V18a8 8 0 11-16 0v-2.5z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Elimu na Kozi</h3>
                    <p class="text-sm text-gray-600">Mafunzo mafupi ya hatua zote za safari ya uzazi—kuanzia ujauzito hadi kulea.</p>
                </div>
                <!-- Card 2 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.10s">
                    <div class="h-12 w-12 rounded-lg bg-[#f59e0b]/10 text-[#f59e0b] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Users Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M16 11c1.657 0 3-1.79 3-4s-1.343-4-3-4-3 1.79-3 4 1.343 4 3 4zM8 11c1.657 0 3-1.79 3-4S9.657 3 8 3 5 4.79 5 7s1.343 4 3 4zm0 2c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4zm8 0c-.29 0-.57.03-.84.08A5.977 5.977 0 0120 18v2h-6v-2c0-2.21 1.79-4 4-4z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Jamii na Vikundi</h3>
                    <p class="text-sm text-gray-600">Community yenye usaidizi—uliza, jibu, na shiriki safari yako na akina mama wengine.</p>
                </div>
                <!-- Card 3 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.15s">
                    <div class="h-12 w-12 rounded-lg bg-[#10b981]/10 text-[#10b981] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Stethoscope (custom path) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M7 2a1 1 0 011 1v4a3 3 0 106 0V3a1 1 0 112 0v4a5 5 0 11-10 0V3a1 1 0 011-1zm11 9a3 3 0 100 6 3 3 0 000-6zm-4.4 6.8A6.5 6.5 0 014 11V9a1 1 0 012 0v2a4.5 4.5 0 108.999.001V14a1 1 0 11-2 0v-1.086A6.502 6.502 0 0113.6 17.8z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Ushauri wa Wataalamu</h3>
                    <p class="text-sm text-gray-600">Unganishwa na wakunga, madaktari na washauri wa lishe kwa ushauri wa moja kwa moja.</p>
                </div>
                <!-- Card 4 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.20s">
                    <div class="h-12 w-12 rounded-lg bg-[#3b82f6]/10 text-[#3b82f6] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Video Camera Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M15 8.5V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-2.5l6 3V5.5l-6 3z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Warsha na Video</h3>
                    <p class="text-sm text-gray-600">Vipindi vinavyoongozwa na wataalamu na maktaba ya video kwa muda wowote.</p>
                </div>
                <!-- Card 5 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.25s">
                    <div class="h-12 w-12 rounded-lg bg-[#ef4444]/10 text-[#ef4444] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Heart Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41.81 4.5 2.09A6 6 0 0 1 21.5 4C24 4 26 6 26 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Huduma Baada ya Kujifungua</h3>
                    <p class="text-sm text-gray-600">Mwongozo wa afya ya mama na mtoto, kunyonyesha, usingizi, na ustawi wa akili.</p>
                </div>
                <!-- Card 6 -->
                <div class="group p-6 border rounded-2xl bg-white hover:shadow-lg transition duration-300 animate-fade-up" style="--delay:.30s">
                    <div class="h-12 w-12 rounded-lg bg-[#8b5cf6]/10 text-[#8b5cf6] flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <!-- Shopping Bag Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6"><path d="M6 7V6a6 6 0 1112 0v1h2a1 1 0 011 1v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a1 1 0 011-1h2zm2 0h8V6a4 4 0 10-8 0v1z"/></svg>
                    </div>
                    <h3 class="font-semibold mb-1">Duka la Mama</h3>
                    <p class="text-sm text-gray-600">Vifaa na bidhaa muhimu zilizopendekezwa na wataalamu kwa kila hatua.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-16 lg:py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white rounded-xl border animate-fade-up" style="--delay:.05s">
                    <div class="h-10 w-10 rounded bg-[#f59e0b]/20 text-[#7e22ce] flex items-center justify-center font-bold mb-4">1</div>
                    <h3 class="font-semibold mb-2">Elimu sahihi</h3>
                    <p class="text-gray-600 text-sm">Makala, video, na kozi fupi za kila hatua ya ujauzito hadi baada ya kujifungua.</p>
                </div>
                <div class="p-6 bg-white rounded-xl border animate-fade-up" style="--delay:.12s">
                    <div class="h-10 w-10 rounded bg-[#f59e0b]/20 text-[#7e22ce] flex items-center justify-center font-bold mb-4">2</div>
                    <h3 class="font-semibold mb-2">Jamii yenye upendo</h3>
                    <p class="text-gray-600 text-sm">Uliza maswali na shiriki uzoefu; hupaswi kupita safari hii pekee.</p>
                </div>
                <div class="p-6 bg-white rounded-xl border animate-fade-up" style="--delay:.19s">
                    <div class="h-10 w-10 rounded bg-[#f59e0b]/20 text-[#7e22ce] flex items-center justify-center font-bold mb-4">3</div>
                    <h3 class="font-semibold mb-2">Wataalamu wa karibu</h3>
                    <p class="text-gray-600 text-sm">Unganishwa na wakunga, madaktari na washauri wa lishe kwa ushauri makini.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold mb-4">Jiunge sasa na uanze safari yenye amani.</h2>
            <p class="text-gray-600 mb-8">Ni bure kuanza — unaweza kubadilisha au kufuta akaunti yako wakati wowote.</p>
            <a href="{{ route('register') }}" class="px-8 py-3 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Jisajili bure</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-600">
            <p>© {{ date('Y') }} {{ config('app.name', 'Malkia Konnect') }}. Haki zote zimehifadhiwa.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-[#7e22ce]">Masharti</a>
                <a href="#" class="hover:text-[#7e22ce]">Faragha</a>
                <a href="#" class="hover:text-[#7e22ce]">Wasiliana nasi</a>
            </div>
        </div>
    </footer>
</body>
</html>
