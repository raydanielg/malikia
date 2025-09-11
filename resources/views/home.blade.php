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
                <a href="{{ route('services') }}" class="hover:text-[#7e22ce]">Huduma</a>
                <a href="#duka" class="hover:text-[#7e22ce]">Duka</a>
                <a href="{{ route('about') }}" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                <a href="{{ route('contact') }}" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
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
                        <a href="{{ route('services') }}" class="hover:text-[#7e22ce]">Huduma</a>
                        <a href="#duka" class="hover:text-[#7e22ce]">Duka</a>
                        <a href="{{ route('about') }}" class="hover:text-[#7e22ce]">Kuhusu Sisi</a>
                        <a href="{{ route('contact') }}" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
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

    <!-- FAQ -->
    <section id="faq" class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Maswali Yanayoulizwa</p>
                <h2 class="text-3xl lg:text-4xl font-extrabold">Maswali na Majibu (FAQ)</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Ikiwa una swali kuhusu {{ config('app.name', 'Malkia Konnect') }}, kuna uwezekano mkubwa majibu yako yapo hapa. Bado una swali? Wasiliana nasi.</p>
            </div>

            <div class="mx-auto max-w-3xl divide-y rounded-2xl border bg-white">
                <!-- Item 1 -->
                <div x-data="{open:false}" class="p-4 sm:p-6">
                    <button @click="open=!open" class="w-full flex items-start gap-3 text-left">
                        <span class="mt-1 h-8 w-8 flex items-center justify-center rounded-lg bg-[#7e22ce]/10 text-[#7e22ce]">
                            <!-- Question mark icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0z"/><path d="M9 13h2v2H9v-2zm1-8a3.5 3.5 0 00-3.5 3.5.75.75 0 001.5 0A2 2 0 0110 6a2 2 0 011.85 1.23c.3.7.16 1.29-.44 1.82-.63.56-1.41.95-1.41 2.2V12h2v-.55c0-.5.43-.77.9-1.13 1.06-.81 1.85-1.92 1.04-3.78A3.5 3.5 0 0010 5z"/></svg>
                        </span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Malkia Konnect ni nini?</h3>
                                <svg :class="open ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            <div x-show="open" x-transition.scale.origin.top.left class="mt-2 text-sm text-gray-600">
                                {{ config('app.name', 'Malkia Konnect') }} ni jukwaa linalokupa elimu, jamii, na ushauri wa kitaalamu kuhusu ujauzito na ulezi.
                            </div>
                        </div>
                    </button>
                </div>

                <!-- Item 2 -->
                <div x-data="{open:false}" class="p-4 sm:p-6">
                    <button @click="open=!open" class="w-full flex items-start gap-3 text-left">
                        <span class="mt-1 h-8 w-8 flex items-center justify-center rounded-lg bg-[#f59e0b]/10 text-[#f59e0b]">
                            <!-- Shield check icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14A1 1 0 003 18h14a1 1 0 00.894-1.447l-7-14z"/><path d="M9 12l-2-2 1.414-1.414L9 9.172l2.586-2.586L13 8l-4 4z"/></svg>
                        </span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Je, taarifa zangu ziko salama?</h3>
                                <svg :class="open ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            <div x-show="open" x-transition.scale.origin.top.left class="mt-2 text-sm text-gray-600">
                                Ndiyo. Tunaheshimu faragha yako na tunatunza taarifa zako kwa usalama kulingana na sera zetu za faragha.
                            </div>
                        </div>
                    </button>
                </div>

                <!-- Item 3 -->
                <div x-data="{open:false}" class="p-4 sm:p-6">
                    <button @click="open=!open" class="w-full flex items-start gap-3 text-left">
                        <span class="mt-1 h-8 w-8 flex items-center justify-center rounded-lg bg-[#10b981]/10 text-[#10b981]">
                            <!-- Sparkles icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l2 4 4 2-4 2-2 4-2-4-4-2 4-2 2-4zm14 2l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3zm-4 8l2 3 3 2-3 2-2 3-2-3-3-2 3-2 2-3z"/></svg>
                        </span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Nitaanza vipi haraka?</h3>
                                <svg :class="open ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            <div x-show="open" x-transition.scale.origin.top.left class="mt-2 text-sm text-gray-600">
                                Anza kwa kujaza <a href="{{ route('intake.create') }}" class="text-[#7e22ce] underline">fomu yetu</a>. Tutakushauri hatua inayofuata kulingana na mahitaji yako.
                            </div>
                        </div>
                    </button>
                </div>

                <!-- Item 4 -->
                <div x-data="{open:false}" class="p-4 sm:p-6">
                    <button @click="open=!open" class="w-full flex items-start gap-3 text-left">
                        <span class="mt-1 h-8 w-8 flex items-center justify-center rounded-lg bg-[#3b82f6]/10 text-[#3b82f6]">
                            <!-- Video icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M15 8.5V6a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-2.5l6 3V5.5l-6 3z"/></svg>
                        </span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Je, kuna warsha au video?</h3>
                                <svg :class="open ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            <div x-show="open" x-transition.scale.origin.top.left class="mt-2 text-sm text-gray-600">
                                Ndiyo, tunayo maktaba ya video na warsha zinazoongozwa na wataalamu mara kwa mara.
                            </div>
                        </div>
                    </button>
                </div>

                <!-- Item 5 -->
                <div x-data="{open:false}" class="p-4 sm:p-6">
                    <button @click="open=!open" class="w-full flex items-start gap-3 text-left">
                        <span class="mt-1 h-8 w-8 flex items-center justify-center rounded-lg bg-[#ef4444]/10 text-[#ef4444]">
                            <!-- Heart icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41.81 4.5 2.09A6 6 0 0 1 21.5 4C24 4 26 6 26 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Msaada wa baada ya kujifungua upoje?</h3>
                                <svg :class="open ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            <div x-show="open" x-transition.scale.origin.top.left class="mt-2 text-sm text-gray-600">
                                Tunakupa mwongozo wa kunyonyesha, usingizi wa mtoto, na ustawi wa akili wa mama.
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Blog -->
    <section id="blog" class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Featured Blog</p>
                <h2 class="text-3xl lg:text-4xl font-extrabold">Makala Zilizochaguliwa</h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Soma makala fupi kutoka kwa wataalamu wetu. Endelea kusoma ili kupata mwongozo sahihi na salama.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Post 1 -->
                <article class="group rounded-2xl overflow-hidden border bg-white hover:shadow-lg transition animate-fade-up" style="--delay:.05s">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('african-pregnant-woman-is-sitting-floor-dressed-with-african-pattern-fabric_156889-8 (1).jpg') }}" alt="Mwongozo wa Trimester ya Kwanza" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" loading="lazy" />
                        <span class="absolute top-3 left-3 text-xs px-2 py-1 rounded bg-[#7e22ce] text-white">Featured</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-1">Mwongozo wa Trimester ya Kwanza</h3>
                        <p class="text-sm text-gray-600 mb-3">Dalili za kawaida, nini cha kula, na vitu muhimu vya kuzingatia katika wiki za mwanzo.</p>
                        <a href="#" class="inline-flex items-center gap-1 text-[#7e22ce] hover:underline">Soma zaidi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M12.293 3.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 11-1.414-1.414L14.586 9H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"/></svg>
                        </a>
                    </div>
                </article>

                <!-- Post 2 -->
                <article class="group rounded-2xl overflow-hidden border bg-white hover:shadow-lg transition animate-fade-up" style="--delay:.10s">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('young-indian-pregnant-woman-standing-studio-setting_1187-448987-removebg-preview.png') }}" alt="Lishe Bora kwa Mama Mjamzito" class="w-full h-full object-cover group-hover:scale-105 transition duration-300 bg-white" loading="lazy" />
                        <span class="absolute top-3 left-3 text-xs px-2 py-1 rounded bg-[#7e22ce] text-white">Featured</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-1">Lishe Bora kwa Mama Mjamzito</h3>
                        <p class="text-sm text-gray-600 mb-3">Jedwali la vyakula muhimu, virutubisho vinavyoshauriwa, na jinsi ya kuepuka njaa ya mara kwa mara.</p>
                        <a href="#" class="inline-flex items-center gap-1 text-[#7e22ce] hover:underline">Soma zaidi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M12.293 3.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 11-1.414-1.414L14.586 9H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"/></svg>
                        </a>
                    </div>
                </article>

                <!-- Post 3 -->
                <article class="group rounded-2xl overflow-hidden border bg-white hover:shadow-lg transition animate-fade-up" style="--delay:.15s">
                    <div class="relative h-48 overflow-hidden">
                        <div class="w-full h-full bg-gradient-to-br from-[#7e22ce] to-[#f59e0b]"></div>
                        <span class="absolute top-3 left-3 text-xs px-2 py-1 rounded bg-[#7e22ce] text-white">Featured</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-lg mb-1">Kujifungua kwa Amani: Maandalizi</h3>
                        <p class="text-sm text-gray-600 mb-3">Vidokezo vya kisaikolojia na kimwili vinavyosaidia kujiandaa kwa siku ya kujifungua.</p>
                        <a href="#" class="inline-flex items-center gap-1 text-[#7e22ce] hover:underline">Soma zaidi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M12.293 3.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 11-1.414-1.414L14.586 9H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"/></svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Features as Progress Steps -->
    <section id="features" class="py-16 lg:py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{start:false}" x-init="setTimeout(()=>start=true, 200)">
            <div class="text-center mb-10">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">How It Helps</p>
                <h2 class="text-3xl lg:text-4xl font-extrabold">Safari yako kwa hatua</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Tunakuongoza hatua kwa hatua: pata elimu sahihi, ungana na jamii yenye upendo, na onana na wataalamu wa karibu.</p>
            </div>

            <!-- Horizontal on lg, vertical on mobile -->
            <div class="relative">
                <!-- Connector line -->
                <div class="hidden lg:block absolute top-7 left-0 right-0 h-1 bg-gray-200 rounded-full"></div>
                <div class="hidden lg:block absolute top-7 left-0 h-1 bg-gradient-to-r from-[#7e22ce] to-[#f59e0b] rounded-full transition-all duration-1000" :style="start ? 'width:100%' : 'width:0%'"></div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    <!-- Step 1 -->
                    <div class="flex lg:block items-start gap-4 animate-fade-up" style="--delay:.05s">
                        <!-- Dot/Number -->
                        <div class="relative shrink-0">
                            <div class="h-14 w-14 rounded-full bg-white border-2 border-[#7e22ce] flex items-center justify-center font-extrabold text-[#7e22ce] shadow-sm">1</div>
                            <!-- Vertical connector for mobile -->
                            <div class="lg:hidden absolute left-1/2 -bottom-10 -translate-x-1/2 w-1 h-10 bg-gray-200"></div>
                            <div class="lg:hidden absolute left-1/2 -bottom-10 -translate-x-1/2 w-1 bg-gradient-to-b from-[#7e22ce] to-[#f59e0b] transition-all duration-1000" :style="start ? 'height:40px' : 'height:0px'"></div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Elimu sahihi</h3>
                            <p class="text-gray-600">Makala, video, na kozi fupi za kila hatua ya ujauzito hadi baada ya kujifungua.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex lg:block items-start gap-4 animate-fade-up" style="--delay:.12s">
                        <div class="relative shrink-0">
                            <div class="h-14 w-14 rounded-full bg-white border-2 border-[#7e22ce] flex items-center justify-center font-extrabold text-[#7e22ce] shadow-sm">2</div>
                            <div class="lg:hidden absolute left-1/2 -bottom-10 -translate-x-1/2 w-1 h-10 bg-gray-200"></div>
                            <div class="lg:hidden absolute left-1/2 -bottom-10 -translate-x-1/2 w-1 bg-gradient-to-b from-[#7e22ce] to-[#f59e0b] transition-all duration-1000 delay-200" :style="start ? 'height:40px' : 'height:0px'"></div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Jamii yenye upendo</h3>
                            <p class="text-gray-600">Uliza maswali na shiriki uzoefu; hupaswi kupita safari hii pekee.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex lg:block items-start gap-4 animate-fade-up" style="--delay:.19s">
                        <div class="relative shrink-0">
                            <div class="h-14 w-14 rounded-full bg-white border-2 border-[#7e22ce] flex items-center justify-center font-extrabold text-[#7e22ce] shadow-sm">3</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Wataalamu wa karibu</h3>
                            <p class="text-gray-600">Unganishwa na wakunga, madaktari na washauri wa lishe kwa ushauri makini.</p>
                        </div>
                    </div>
                </div>

                <!-- Fallback when no items -->
                <div x-show="!items.length" class="mt-6 text-center text-gray-600">
                    Hakuna testimonials kwa sasa. Tutarudisha taarifa hivi karibuni.
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscribe -->
    <section id="newsletter" class="py-16 lg:py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Stay Updated</p>
                <h2 class="text-3xl lg:text-4xl font-extrabold">Jisajili kupokea taarifa muhimu</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Pokea makala, vidokezo vya afya ya uzazi na taarifa za warsha moja kwa moja kwenye barua pepe yako.</p>
            </div>

            @if (session('newsletter_ok'))
                <div class="mx-auto max-w-2xl mb-4 rounded-md bg-green-50 text-green-800 px-4 py-3 border border-green-200">
                    {{ session('newsletter_ok') }}
                </div>
            @endif

            <form method="POST" action="{{ route('newsletter.store') }}" class="mx-auto max-w-2xl">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-1">
                        <label class="sr-only">Jina</label>
                        <input name="name" value="{{ old('name') }}" class="w-full border rounded-md px-3 py-3" placeholder="Jina (hiari)">
                        @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="sr-only">Barua pepe</label>
                        <div class="flex">
                            <input type="email" name="email" value="{{ old('email') }}" class="flex-1 border rounded-l-md px-3 py-3" placeholder="Ingiza barua pepe yako" required>
                            <button class="px-6 py-3 rounded-r-md bg-[#7e22ce] text-white hover:bg-[#6b21a8] whitespace-nowrap">Jisajili</button>
                        </div>
                        @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <p class="mt-3 text-xs text-gray-500">Kwa kujisajili, unakubali kupokea barua pepe kutoka {{ config('app.name', 'Malkia Konnect') }}. Unaweza kujiondoa wakati wowote.</p>
            </form>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
