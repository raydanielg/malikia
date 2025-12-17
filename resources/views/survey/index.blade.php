<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900 bg-gray-50">
    <!-- Header (similar to contact page) -->
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
                <a href="{{ route('survey') }}" class="text-[#7e22ce] font-semibold">Survey</a>
                <a href="{{ route('contact') }}" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
            </nav>
        </div>
    </header>

    <main class="py-10 lg:py-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Intro / Left side -->
            <section class="lg:col-span-1 space-y-4">
                <p class="inline-flex items-center gap-2 rounded-full bg-rose-50 text-rose-700 text-xs font-medium px-3 py-1 border border-rose-100">
                    <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                    Tunathamini maoni yako
                </p>
                <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                    Tusaidie kuboresha
                    <span class="text-[#7e22ce] block">Malkia Konnect Experience</span>
                </h1>
                <p class="text-gray-700 text-sm lg:text-base">
                    Survey hii itakuchukua takribani dakika 2–3 tu. Majibu yako yatatusaidia kuboresha bidhaa,
                    huduma na support unayopokea kupitia Malkia Konnect.
                </p>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[#7e22ce]"></span>
                        <span>Maswali mafupi, rahisi kujibu</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[#7e22ce]"></span>
                        <span>Majibu yako ni ya siri, yatatumika kuboresha huduma pekee</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[#7e22ce]"></span>
                        <span>Unaweza kuacha contact ili tukufuatilie ikiwa ni lazima</span>
                    </li>
                </ul>
            </section>

            <!-- Form -->
            <section class="lg:col-span-2">
                @if (session('survey_ok'))
                    <div class="mb-5 rounded-xl bg-green-50 text-green-800 px-4 py-3 border border-green-200 text-sm">
                        {{ session('survey_ok') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('survey.submit') }}" class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 lg:p-8 space-y-6">
                    @csrf

                    <!-- Section 1: Basic info -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">1</span>
                            Tujue kidogo kukuhusu
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jina kamili <span class="text-red-500">*</span></label>
                                <input name="full_name" value="{{ old('full_name') }}" required class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                                @error('full_name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Namba ya simu</label>
                                <input name="phone" value="{{ old('phone') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                                @error('phone')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Barua pepe</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                                @error('email')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upo hatua gani ya safari yako? <span class="text-red-500">*</span></label>
                                <select name="journey_stage" required class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">
                                    <option value="" disabled {{ old('journey_stage') ? '' : 'selected' }}>Chagua</option>
                                    <option value="pregnant" {{ old('journey_stage') === 'pregnant' ? 'selected' : '' }}>Mjamzito</option>
                                    <option value="postpartum" {{ old('journey_stage') === 'postpartum' ? 'selected' : '' }}>Mama baada ya kujifungua</option>
                                    <option value="ttc" {{ old('journey_stage') === 'ttc' ? 'selected' : '' }}>Najaribu kupata ujauzito (TTC)</option>
                                </select>
                                @error('journey_stage')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Experience rating -->
                    <div class="border-t border-gray-100 pt-5 space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">2</span>
                            Uzoefu wako na Malkia
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-700 mb-2">
                                    Kwa ujumla, unaukaaje uzoefu wako na bidhaa/huduma za Malkia? <span class="text-red-500">*</span>
                                </p>
                                <div class="grid grid-cols-5 gap-2 text-xs">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="flex flex-col items-center gap-1 cursor-pointer">
                                            <input type="radio" name="experience_rating" value="{{ $i }}" {{ old('experience_rating') == $i ? 'checked' : '' }} class="sr-only peer" required />
                                            <span class="w-full rounded-lg border border-gray-300 px-2 py-1.5 peer-checked:bg-[#7e22ce] peer-checked:text-white peer-checked:border-[#7e22ce]">{{ $i }}</span>
                                            @if ($i === 1)
                                                <span class="text-[10px] text-gray-500">Mbaya sana</span>
                                            @elseif ($i === 3)
                                                <span class="text-[10px] text-gray-500">Wastani</span>
                                            @elseif ($i === 5)
                                                <span class="text-[10px] text-gray-500">Nzuri sana</span>
                                            @else
                                                <span class="text-[10px] text-gray-500">&nbsp;</span>
                                            @endif
                                        </label>
                                    @endfor
                                </div>
                                @error('experience_rating')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Ni kwa kiwango gani ungependekeza Malkia kwa rafiki au ndugu? (0–10)
                                </label>
                                <input type="number" name="recommend_score" min="0" max="10" value="{{ old('recommend_score') }}" class="mt-1 w-32 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                                @error('recommend_score')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Open feedback -->
                    <div class="border-t border-gray-100 pt-5 space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">3</span>
                            Maoni ya ziada
                        </h2>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tunawezaje kuboresha zaidi huduma/bidhaa zetu?</label>
                            <textarea name="feedback" rows="4" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" placeholder="Andika maoni au mapendekezo yako...">{{ old('feedback') }}</textarea>
                            @error('feedback')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <p class="text-xs text-gray-500 max-w-sm">
                            Kwa kubonyeza "Tuma Survey" unakubali kuwa maoni yako yanatumika kuimarisha bidhaa na huduma za Malkia.
                        </p>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#7e22ce] hover:bg-[#6b21a8] text-white text-sm font-medium px-6 py-2.5 shadow-sm">
                            <span>Tuma Survey</span>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
