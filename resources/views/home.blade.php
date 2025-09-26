<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=shopping_cart" />
</head>
<body class="antialiased text-gray-900">
    @include('partials.header')
    <!-- Hero: Split CTA -->
    <section class="relative overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Left: Maternity Products -->
            <a href="{{ route('services') }}" class="group relative min-h-[420px] lg:min-h-[520px] overflow-hidden">
                <img src="{{ asset('african-pregnant-woman-is-sitting-floor-dressed-with-african-pattern-fabric_156889-8 (1).jpg') }}" alt="Maternity Products" class="absolute inset-0 w-full h-full object-cover"/>
                <div class="absolute inset-0 bg-teal-700/60 transition group-hover:bg-teal-700/50"></div>
                <div class="relative z-10 h-full w-full flex items-center justify-center text-center px-6 py-10">
                    <div class="max-w-md text-white">
                        <!-- Icon -->
                        <div class="mx-auto mb-4 h-12 w-12 grid place-items-center rounded-full bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3.75h2.25l1.5 12.75A1.5 1.5 0 007.5 18h9a1.5 1.5 0 001.47-1.25l1.2-7.25H6.3"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 21a1 1 0 110-2 1 1 0 010 2zm8 0a1 1 0 110-2 1 1 0 010 2z"/></svg>
                        </div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-3">Maternity Products</h1>
                        <p class="text-white/90 mb-6">Discover our carefully designed products to support you through every stage of motherhood.</p>
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/90 text-teal-700 px-5 py-2.5 group-hover:bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3.75h2.25l1.5 12.75A1.5 1.5 0 007.5 18h9a1.5 1.5 0 001.47-1.25l1.2-7.25H6.3"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 21a1 1 0 110-2 1 1 0 010 2zM17 21a1 1 0 110-2 1 1 0 010 2z"/></svg>
                            <span class="font-semibold">Shop Now</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Right: Malkia Konnect -->
            <a href="{{ route('intake.create') }}" class="group relative min-h-[420px] lg:min-h-[520px] overflow-hidden">
                <img src="{{ asset('young-indian-pregnant-woman-standing-studio-setting_1187-448987-removebg-preview.png') }}" alt="Malkia Konnect" class="absolute inset-0 w-full h-full object-cover bg-white"/>
                <div class="absolute inset-0 bg-rose-700/60 transition group-hover:bg-rose-700/50"></div>
                <div class="relative z-10 h-full w-full flex items-center justify-center text-center px-6 py-10">
                    <div class="max-w-md text-white">
                        <!-- Icon -->
                        <div class="mx-auto mb-4 h-12 w-12 grid place-items-center rounded-full bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm-9 7a7 7 0 0110 0"/></svg>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-3">Malkia Konnect</h2>
                        <p class="text-white/90 mb-6">Join our community for support, guidance, and exclusive benefits through WhatsApp.</p>
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/90 text-rose-700 px-5 py-2.5 group-hover:bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                            <span class="font-semibold">Join Now</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </section>

    


    <!-- Featured Products -->
    <section id="featured" class="py-16 lg:py-24 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800">Featured Products</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Bidhaa bora kwa safari yako ya ujauzito na uzazi kutoka Malkia</p>
            </div>

            @php
                $images = [
                    'IMG-20250919-WA0020.jpg',
                    'IMG-20250919-WA0026.jpg',
                    'IMG-20250919-WA0028.jpg',
                    'IMG-20250919-WA0030.jpg',
                    'IMG-20250919-WA0032.jpg',
                    'IMG-20250919-WA0035.jpg',
                    'IMG-20250919-WA0037.jpg',
                ];
            @endphp

            <div class="overflow-hidden">
                <div class="flex gap-4 sm:gap-6 animate-malkia-marquee will-change-transform">
                    <!-- Marquee group A -->
                    <div class="flex gap-4 sm:gap-6 shrink-0">
                        @foreach ($images as $img)
                            <article class="group bg-white rounded-2xl border shadow-sm hover:shadow-lg transition overflow-hidden flex flex-col min-w-[220px] sm:min-w-[260px] md:min-w-[280px]">
                                <div class="relative h-56 sm:h-64 md:h-72 lg:h-80 bg-gray-100 overflow-hidden">
                                    @php $ver = @filemtime(public_path('mimba/' . $img)) ?: time(); @endphp
                                    <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" aria-label="Open shop.malkia.co.tz">
                                        <img src="{{ url('mimba/' . $img) }}?v={{ $ver }}" alt="Malkia product image" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy" decoding="async"/>
                                    </a>
                                </div>
                                <div class="p-3 sm:p-4">
                                    <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-rose-500 hover:bg-rose-600 text-white text-xs sm:text-sm font-medium px-3 sm:px-4 py-2">
                                        <span>Shop Now</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Marquee group B (duplicate for seamless loop) -->
                    <div class="flex gap-4 sm:gap-6 shrink-0" aria-hidden="true">
                        @foreach ($images as $img)
                            <article class="group bg-white rounded-2xl border shadow-sm hover:shadow-lg transition overflow-hidden flex flex-col min-w-[220px] sm:min-w-[260px] md:min-w-[280px]">
                                <div class="relative h-56 sm:h-64 md:h-72 lg:h-80 bg-gray-100 overflow-hidden">
                                    @php $ver = @filemtime(public_path('mimba/' . $img)) ?: time(); @endphp
                                    <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" aria-label="Open shop.malkia.co.tz">
                                        <img src="{{ url('mimba/' . $img) }}?v={{ $ver }}" alt="Malkia product image" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy" decoding="async"/>
                                    </a>
                                </div>
                                <div class="p-3 sm:p-4">
                                    <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-rose-500 hover:bg-rose-600 text-white text-xs sm:text-sm font-medium px-3 sm:px-4 py-2">
                                        <span>Shop Now</span>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Scoped marquee styles -->
            <style>
              @keyframes malkia-marquee {
                0% { transform: translateX(0); }
                100% { transform: translateX(50%); }
              }
              .animate-malkia-marquee { animation: malkia-marquee 40s linear infinite; }
              .animate-malkia-marquee:hover { animation-play-state: paused; }
              @media (prefers-reduced-motion: reduce) {
                .animate-malkia-marquee { animation: none; }
              }
            </style>
        </div>
    </section>

    <!-- Why Join Malkia Konnect? -->
    <section id="why-konnect" class="py-16 lg:py-24 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-[#85C2BE]">Why Join Malkia Konnect?</h2>
                <p class="mt-2 text-[#642321] max-w-2xl mx-auto">Get personalized support through WhatsApp from our team of maternity experts</p>
            </div>

            @php
                $benefits = [
                    [
                        'title' => '24/7 WhatsApp Support',
                        'desc'  => 'Get answers to your questions anytime from our team of experts',
                        'icon'  => 'chat',
                        'color' => 'text-[#85C2BE] bg-[#85C2BE]/10'
                    ],
                    [
                        'title' => 'Weekly Tips & Guidance',
                        'desc'  => 'Personalized advice based on your pregnancy stage and needs',
                        'icon'  => 'calendar',
                        'color' => 'text-[#F89795] bg-[#F89795]/10'
                    ],
                    [
                        'title' => 'Exclusive Discounts',
                        'desc'  => 'Special offers and early access to new products',
                        'icon'  => 'gift',
                        'color' => 'text-[#85C2BE] bg-[#85C2BE]/10'
                    ],
                    [
                        'title' => 'Trusted Community',
                        'desc'  => 'Connect with other moms for encouragement and real stories',
                        'icon'  => 'users',
                        'color' => 'text-[#F89795] bg-[#F89795]/10'
                    ],
                    [
                        'title' => 'Expert Webinars',
                        'desc'  => 'Live sessions with midwives, nutritionists and pediatricians',
                        'icon'  => 'video',
                        'color' => 'text-[#85C2BE] bg-[#85C2BE]/10'
                    ],
                    [
                        'title' => 'Resources Library',
                        'desc'  => 'Curated guides, checklists and postpartum care tips',
                        'icon'  => 'book',
                        'color' => 'text-[#F89795] bg-[#F89795]/10'
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach ($benefits as $b)
                    <div class="bg-white border rounded-2xl shadow-sm hover:shadow-lg transition p-6 text-center">
                        <div class="mx-auto mb-4 h-12 w-12 grid place-items-center rounded-xl {{ $b['color'] }}">
                            @switch($b['icon'])
                                @case('chat')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9M7.5 12h6m-6 6h7.5L21 21V6.75A2.25 2.25 0 0018.75 4.5H5.25A2.25 2.25 0 003 6.75v9A2.25 2.25 0 005.25 18h.75"/></svg>
                                    @break
                                @case('calendar')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3.75v3M17.25 3.75v3M3.75 9.75h16.5M4.5 6.75A1.5 1.5 0 016 5.25h12a1.5 1.5 0 011.5 1.5v12A1.5 1.5 0 0118 20.25H6A1.5 1.5 0 013.75 18.75v-12A1.5 1.5 0 016 4.5zM6 4.5V21M9.75 8.25h4.5"/></svg>
                                    @break
                                @case('gift')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5H3.75m0 0A2.25 2.25 0 016 5.25h12a2.25 2.25 0 012.25 2.25m-16.5 0v12A2.25 2.25 0 006 21.75h12a2.25 2.25 0 012.25-2.25v-12m-9 0v14.25m0-14.25S9.75 4.5 8.25 4.5 6 5.812 6 7.5c0 1.688 1.5 3 3 3s3-1.312 3-3zm0 0s1.5-3 3-3 3 1.312 3 3c0 1.688-1.5 3-3 3s-3-1.312-3-3z"/></svg>
                                    @break
                                @case('users')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25a4.5 4.5 0 119 0M3.75 20.25a8.25 8.25 0 0116.5 0"/></svg>
                                    @break
                                @case('video')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41.81 4.5 2.09A6 6 0 0 1 21.5 4C24 4 26 6 26 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    @break
                                @case('book')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 4.5h9A2.25 2.25 0 0117.25 6.75v12A2.25 2.25 0 0115 21H6A2.25 2.25 0 013.75 18.75v-12A2.25 2.25 0 016 4.5zM6 4.5V21M9.75 8.25h4.5"/></svg>
                                    @break
                            @endswitch
                        </div>
                        <h3 class="font-semibold text-[#642321] mb-1">{{ $b['title'] }}</h3>
                        <p class="text-[#642321]/80 text-sm">{{ $b['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('intake.create') }}" class="inline-flex items-center gap-2 rounded-full bg-[#85C2BE] hover:bg-[#74b5b1] text-white font-medium px-5 py-2.5 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    <span>Join Konnect – It's Free</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials (Carousel) -->
    <section id="testimonials" class="relative py-16 lg:py-24" style="background-color:#85C2BE;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-white">Hear From Our Community</h2>
                <p class="mt-2 text-white/90 max-w-2xl mx-auto">Real stories from mothers who've benefited from Malkia products and support</p>
            </div>

            @php
                $items = [
                    [
                        'quote' => 'The Push to Recover Kit made my postpartum journey so much easier. The support and guidance from Malkia Konnect was invaluable!',
                        'name'  => 'Sarah J.',
                        'role'  => 'First-time mom',
                        'avatar'=> 'https://i.pravatar.cc/80?img=32',
                    ],
                    [
                        'quote' => 'As a C-section mom, the recovery kit was a lifesaver. The scar sheets and support binder made all the difference in my healing process.',
                        'name'  => 'Amina M.',
                        'role'  => 'C-section recovery',
                        'avatar'=> 'https://i.pravatar.cc/80?img=47',
                    ],
                    [
                        'quote' => 'The WhatsApp support group felt like having a midwife in my pocket. I got immediate answers to all my questions, day or night!',
                        'name'  => 'Grace T.',
                        'role'  => 'Konnect member',
                        'avatar'=> 'https://i.pravatar.cc/80?img=15',
                    ],
                    [
                        'quote' => 'Weekly tips were so timely and practical. From trimester nutrition to newborn sleep, I felt guided every step.',
                        'name'  => 'Linda K.',
                        'role'  => 'Expectant mom',
                        'avatar'=> 'https://i.pravatar.cc/80?img=23',
                    ],
                    [
                        'quote' => 'Exclusive discounts helped me afford quality products. Value and care in one place — thank you Malkia!',
                        'name'  => 'Neema P.',
                        'role'  => 'Community member',
                        'avatar'=> 'https://i.pravatar.cc/80?img=5',
                    ],
                ];
            @endphp

            <div x-data="{
                    i: 0,
                    get max(){ return this.$refs.track?.children.length ?? 0 },
                    next(){ this.i = (this.i + 1) % this.max; this.scroll() },
                    prev(){ this.i = (this.i - 1 + this.max) % this.max; this.scroll() },
                    scroll(){
                        const track = this.$refs.track;
                        const card = track?.children[0];
                        if(!track || !card) return;
                        const style = getComputedStyle(track);
                        const gap = parseFloat(style.columnGap || style.gap) || 16;
                        const w = card.getBoundingClientRect().width + gap;
                        track.scrollTo({ left: this.i * w, behavior: 'smooth' });
                    },
                }"
                x-init="
                    $nextTick(()=>{
                        let t = setInterval(()=>next(), 4500);
                        $refs.wrapper.addEventListener('mouseenter', ()=>clearInterval(t));
                        $refs.wrapper.addEventListener('mouseleave', ()=>{ t = setInterval(()=>next(), 4500) });
                    })
                "
                class="relative">

                <!-- Controls removed per request; auto-scroll and swipe still available -->

                <!-- Track -->
                <div x-ref="wrapper" class="overflow-hidden">
                    <div x-ref="track" class="flex gap-4 sm:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-2"
                         style="scrollbar-width:none" x-on:wheel.passive>
                        @foreach($items as $t)
                            <figure class="snap-start shrink-0 w-[90%] sm:w-[48%] lg:w-[32%] bg-white/90 rounded-2xl p-5 text-[#642321] border border-white/70 shadow-md">
                                <blockquote class="italic text-[#642321]">“{{ $t['quote'] }}”</blockquote>
                                <div class="mt-4 flex items-center gap-3">
                                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="h-9 w-9 rounded-full object-cover ring-2 ring-white/70"/>
                                    <figcaption>
                                        <div class="font-semibold">{{ $t['name'] }}</div>
                                        <div class="text-xs text-[#642321]/70">{{ $t['role'] }}</div>
                                    </figcaption>
                                </div>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
