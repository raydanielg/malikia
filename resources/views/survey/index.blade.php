<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey - Malkia Konnect</title>

    {{-- Primary SEO Meta Tags --}}
    <meta name="title" content="Survey - Malkia Konnect">
    <meta name="description" content="Nimeshiriki maoni yangu kuhusu taulo za kike. Kama pedi zimewahi kukuangusha, huu ni wakati wako wa kusema kupitia dodoso la Malkia Konnect.">

    {{-- Open Graph / Facebook / WhatsApp --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://malkia.co.tz/survey">
    <meta property="og:title" content="Survey - Malkia Konnect">
    <meta property="og:description" content="Nimeshiriki maoni yangu kuhusu taulo za kike. Kama pedi zimewahi kukuangusha, huu ni wakati wako wa kusema.">
    <meta property="og:image" content="{{ asset('WhatsApp Image 2025-12-17 at 8.34.39 PM.jpeg') }}">
    <meta property="og:image:alt" content="Malkia Konnect survey - taulo za kike">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Survey - Malkia Konnect">
    <meta name="twitter:description" content="Nimeshiriki maoni yangu kuhusu taulo za kike. Kama pedi zimewahi kukuangusha, huu ni wakati wako wa kusema.">
    <meta name="twitter:image" content="{{ asset('WhatsApp Image 2025-12-17 at 8.34.39 PM.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak]{ display:none !important; }
        
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
        }
        
        @keyframes celebrate {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.1) rotate(-5deg); }
            50% { transform: scale(1.15) rotate(5deg); }
            75% { transform: scale(1.1) rotate(-5deg); }
        }
        
        .confetti-piece {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #ec4899;
            animation: confetti 3s ease-out forwards;
            pointer-events: none;
            z-index: 9999;
        }
        
        .celebrate-btn {
            animation: celebrate 0.6s ease-in-out;
        }
    </style>
</head>
<body class="antialiased text-gray-900">
    <div
        class="min-h-screen py-8 sm:py-12 px-4 sm:px-6 lg:px-8 bg-cover bg-center bg-no-repeat flex items-start justify-center"
        style="background-image: url('{{ asset('cute-love-hearts-white-wallpaper-valentines-day-celebration_1017-49256.jpg') }}');"
    >
        <main class="w-full max-w-4xl mx-auto bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/60 p-4 sm:p-6 lg:p-8">
            <!-- Header Section -->
            <div class="mb-8 text-center space-y-4">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900">
                    Hello mama!
                </h1>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Tuambie ukweli wako kuhusu taulo za kike (pedi). <span class="text-rose-600 font-bold">Dakika 2 zako</span> zitatusaidia kutengeneza taulo zisizovuja, zisizowasha na zinazokujali kweli.
                </p>
            </div>

            <section x-data="{ 
                step: 1, 
                maxStep: 4,
                celebrating: false,
                formData: {},
                init() {
                    // Load saved data from localStorage
                    const saved = localStorage.getItem('malkia_survey_data');
                    if (saved) {
                        try {
                            this.formData = JSON.parse(saved);
                            this.restoreFormData();
                        } catch (e) {
                            console.error('Error loading saved data:', e);
                        }
                    }
                    
                    // Auto-save on input change
                    this.$watch('formData', () => {
                        this.saveFormData();
                    });
                },
                saveFormData() {
                    const form = document.querySelector('form');
                    if (!form) return;
                    
                    const formData = new FormData(form);
                    const data = {};
                    
                    for (let [key, value] of formData.entries()) {
                        if (key.endsWith('[]')) {
                            const baseKey = key.slice(0, -2);
                            if (!data[baseKey]) data[baseKey] = [];
                            data[baseKey].push(value);
                        } else {
                            data[key] = value;
                        }
                    }
                    
                    localStorage.setItem('malkia_survey_data', JSON.stringify(data));
                },
                restoreFormData() {
                    const form = document.querySelector('form');
                    if (!form || !this.formData) return;
                    
                    Object.keys(this.formData).forEach(key => {
                        const value = this.formData[key];
                        
                        if (Array.isArray(value)) {
                            value.forEach(v => {
                                const checkbox = form.querySelector(`input[name='${key}[]'][value='${v}']`);
                                if (checkbox) checkbox.checked = true;
                            });
                        } else {
                            const input = form.querySelector(`[name='${key}']`);
                            if (input) {
                                if (input.type === 'radio') {
                                    const radio = form.querySelector(`input[name='${key}'][value='${value}']`);
                                    if (radio) radio.checked = true;
                                } else {
                                    input.value = value;
                                }
                            }
                        }
                    });
                },
                clearSavedData() {
                    localStorage.removeItem('malkia_survey_data');
                    this.formData = {};
                },
                limitSelection(group, max, event) {
                    const form = document.querySelector('form');
                    if (!form) return;

                    let selector = '';
                    if (group === 'reasons') {
                        selector = 'input[name="reasons[]"]';
                    } else if (group === 'important_features') {
                        selector = 'input[name="important_features[]"]';
                    }

                    if (!selector) return;

                    const checkedCount = form.querySelectorAll(selector + ':checked').length;
                    if (checkedCount > max) {
                        // Revert the last change if over limit
                        if (event && event.target) {
                            event.target.checked = false;
                        }
                    }
                },
                celebrate() {
                    this.celebrating = true;
                    this.createConfetti();
                    setTimeout(() => this.celebrating = false, 600);
                },
                createConfetti() {
                    const colors = ['#ec4899', '#f472b6', '#fb7185', '#fda4af', '#7e22ce', '#a855f7'];
                    for(let i = 0; i < 50; i++) {
                        setTimeout(() => {
                            const confetti = document.createElement('div');
                            confetti.className = 'confetti-piece';
                            confetti.style.left = Math.random() * 100 + '%';
                            confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                            confetti.style.animationDelay = Math.random() * 0.3 + 's';
                            confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                            document.body.appendChild(confetti);
                            setTimeout(() => confetti.remove(), 3500);
                        }, i * 30);
                    }
                }
            }" 
            x-on:input.debounce.500ms="saveFormData()"
            class="space-y-4">
            <div class="flex items-center justify-between gap-4 mb-2">
                <div class="flex-1 h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full bg-[#7e22ce] transition-all duration-300" :style="`width: ${(step / maxStep) * 100}%`"></div>
                </div>
                <div class="text-xs font-medium text-gray-600 whitespace-nowrap">
                    Hatua <span x-text="step"></span> ya <span x-text="maxStep"></span>
                </div>
            </div>

            <form method="POST" action="{{ route('survey.submit') }}" class="bg-white border border-gray-200 rounded-2xl shadow-2xl p-4 sm:p-6 lg:p-8 space-y-6">
                @csrf

                <div class="rounded-2xl bg-rose-50/60 border border-rose-100 p-3 sm:p-4 flex items-center gap-3 sm:gap-4">
                    <div class="relative h-16 w-16 sm:h-20 sm:w-20 rounded-xl overflow-hidden bg-rose-100 flex-shrink-0">
                        <img
                            x-show="step === 1"
                            x-cloak
                            src="{{ asset('puberty/young-african-american-woman-holding-sanitary-napkin-isolated-beige-background-having-some-great-idea-concept-creativity_1187-228077.jpg') }}"
                            alt="Mwanamke mwenye taulo za kike"
                            class="absolute inset-0 h-full w-full object-cover transform scale-105"
                            loading="lazy"
                        >
                        <img
                            x-show="step === 2"
                            x-cloak
                            src="{{ asset('puberty/puberty-girl-choosing-sanitary-pads-tampons_1308-132920.jpg') }}"
                            alt="Msichana akichagua taulo za kike"
                            class="absolute inset-0 h-full w-full object-cover transform scale-105"
                            loading="lazy"
                        >
                        <img
                            x-show="step === 3"
                            x-cloak
                            src="{{ asset('puberty/hesitant-dark-skinned-woman-holds-unused-clean-sanitary-napkin-tampon-chooses-best-intimate-product-menstruation-cares-about-health-isolated-blue-wall-women-hygiene-gynecology-concept_273609-38307.jpg') }}"
                            alt="Mwanamke akifikiria kuhusu pedi"
                            class="absolute inset-0 h-full w-full object-cover transform scale-105"
                            loading="lazy"
                        >
                        <img
                            x-show="step === 4"
                            x-cloak
                            src="{{ asset('puberty/satisfied-lovely-woman-with-crisp-hairstyle-holds-sanitary-napkin_273609-30559.jpg') }}"
                            alt="Mwanamke mwenye furaha na taulo za kike"
                            class="absolute inset-0 h-full w-full object-cover transform scale-105"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-tr from-rose-900/40 via-rose-700/10 to-transparent"></div>
                    </div>

                    <div class="flex-1 text-[11px] sm:text-xs text-rose-900 space-y-1">
                        <p x-show="step === 1" x-cloak class="font-semibold">
                            Hatua 1: Tuambie kidogo kuhusu wewe na periods zako.
                        </p>
                        <p x-show="step === 1" x-cloak>
                            Hii inatusaidia kuelewa mahitaji ya damu kidogo, ya kati au nyingi ili kubuni pedi sahihi.
                        </p>

                        <p x-show="step === 2" x-cloak class="font-semibold">
                            Hatua 2: Brand unayotumia na kile unachopenda.
                        </p>
                        <p x-show="step === 2" x-cloak>
                            Tunataka kujua nini kinakufanya uiamini pedi fulani – bei, usalama, au faraja.
                        </p>

                        <p x-show="step === 3" x-cloak class="font-semibold">
                            Hatua 3: Vitu unavyokataa kabisa kwenye pedi.
                        </p>
                        <p x-show="step === 3" x-cloak>
                            Muwasho, kuvuja au plastiki nyingi? Tuambie ili tuweze kuepuka hayo kwenye bidhaa.
                        </p>

                        <p x-show="step === 4" x-cloak class="font-semibold">
                            Hatua 4: Ndoto yako ya pedi bora.
                        </p>
                        <p x-show="step === 4" x-cloak>
                            Hapa ndipo unaweka maoni ya mwisho – tunataka pedi inayokuaminisha kila mwezi.
                        </p>
                    </div>
                </div>

                <div x-show="step === 1" x-cloak class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">1</span>
                        Kuhusu wewe
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">1. Umri wako uko katika kundi lipi? <span class="text-red-500">*</span></p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @php
                                    $ages = [
                                        'below_18' => 'Chini ya miaka 18',
                                        '18_24' => '18–24',
                                        '25_34' => '25–34',
                                        '35_44' => '35–44',
                                        '45_plus' => '45+',
                                    ];
                                @endphp
                                @foreach($ages as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="age_group" value="{{ $key }}" {{ old('age_group') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('age_group')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">2. Kiasi cha damu yako mara nyingi kikoje? <span class="text-red-500">*</span></p>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-sm">
                                @php
                                    $flows = [
                                        'light' => 'Kidogo',
                                        'medium' => 'Cha kati',
                                        'heavy' => 'Kingi',
                                        'very_heavy' => 'Kingi sana',
                                    ];
                                @endphp
                                @foreach($flows as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="flow_level" value="{{ $key }}" {{ old('flow_level') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('flow_level')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">2</span>
                        Unachotumia sasa
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">3. Ni brand gani ya taulo za kike unayotumia mara nyingi?</label>
                            <input type="text" name="current_brand" value="{{ old('current_brand') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('current_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">4. Kwa nini unachagua brand hiyo? (chagua hadi 2)</p>
                            @php
                                $reasons = [
                                    'price' => 'Bei',
                                    'availability' => 'Inapatikana kirahisi',
                                    'no_leaks' => 'Hainivuji',
                                    'soft' => 'Ni laini',
                                    'habit' => 'Nimeizoea',
                                    'recommended' => 'Nimependekezwa',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($reasons as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input
                                            type="checkbox"
                                            name="reasons[]"
                                            value="{{ $key }}"
                                            @checked(collect(old('reasons', []))->contains($key))
                                            class="h-4 w-4 text-[#7e22ce] border-gray-300"
                                            @change="limitSelection('reasons', 2, $event)"
                                        >
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('reasons')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">3</span>
                        Taulo nzuri ni ipi?
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">5. Ni mambo gani muhimu zaidi kwako kwenye taulo ya kike? (chagua hadi 3)</p>
                            @php
                                $features = [
                                    'absorption' => 'Kufyonza vizuri',
                                    'no_leak' => 'Kuto vuja',
                                    'soft_skin' => 'Laini kwenye ngozi',
                                    'no_irritation' => 'Kuepuka muwasho',
                                    'not_bulky' => 'Isiwe nzito',
                                    'odor_control' => 'Kudhibiti harufu',
                                    'no_slip' => 'Isiteleze',
                                    'breathable' => 'Ipitishe hewa',
                                    'affordable' => 'Bei nafuu',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($features as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input
                                            type="checkbox"
                                            name="important_features[]"
                                            value="{{ $key }}"
                                            @checked(collect(old('important_features', []))->contains($key))
                                            class="h-4 w-4 text-[#7e22ce] border-gray-300"
                                            @change="limitSelection('important_features', 3, $event)"
                                        >
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('important_features')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">6. Unapendelea taulo za aina gani?</p>
                            @php
                                $padTypes = [
                                    'thin' => 'Nyembamba',
                                    'medium' => 'Za kati',
                                    'thick' => 'Nzito mradi inalinda',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($padTypes as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="pad_type" value="{{ $key }}" {{ old('pad_type') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('pad_type')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">7. Taulo zenye mabawa (wings)?</p>
                            @php
                                $wings = [
                                    'must' => 'Lazima',
                                    'nice_to_have' => 'Sio muhimu sana, but ikiwepo ni sawa',
                                    'dont_like' => 'Sipendi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($wings as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="wings_preference" value="{{ $key }}" {{ old('wings_preference') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('wings_preference')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-2">
                            <p class="block text-sm font-medium text-gray-700 mb-1">8. Taulo zenye harufu (scented)?</p>
                            @php
                                $scented = [
                                    'like' => 'Nazipenda',
                                    'neutral' => 'Sina shida',
                                    'dislike' => 'Sizipendi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($scented as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="scented_preference" value="{{ $key }}" {{ old('scented_preference') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('scented_preference')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror

                            <label class="block text-xs text-gray-600 mt-2">Kwa nini?</label>
                            <input type="text" name="scented_reason" value="{{ old('scented_reason') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('scented_reason')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">9. Umewahi kupata muwasho, vipele au michubuko kutokana na taulo?</p>
                            @php
                                $irritation = [
                                    'often' => 'Mara nyingi',
                                    'sometimes' => 'Wakati mwingine',
                                    'rarely' => 'Mara chache',
                                    'never' => 'Sijawahi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 text-sm">
                                @foreach($irritation as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="irritation_frequency" value="{{ $key }}" {{ old('irritation_frequency') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('irritation_frequency')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 3" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">4</span>
                        Mambo ya kuepuka
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">10. Kitu gani unakichukia zaidi kwenye taulo? (chagua yote yanayokuhusu)</p>
                            @php
                                $dislikes = [
                                    'leaks' => 'Kuvuja',
                                    'bad_smell' => 'Harufu mbaya',
                                    'wet_feel' => 'Kuhisi unyevu',
                                    'too_big' => 'Kuwa kubwa',
                                    'slipping' => 'Kuteleza',
                                    'itching' => 'Kuwasha',
                                    'bad_glue' => 'Gundi mbovu',
                                    'plastic_material' => 'Material ya Plastiki',
                                    'noise' => 'Sauti',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($dislikes as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="dislikes[]" value="{{ $key }}" @checked(collect(old('dislikes', []))->contains($key)) class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('dislikes')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-2">
                            <p class="block text-sm font-medium text-gray-700 mb-1">11. Umewahi kuacha kutumia brand ya pedi kwa sababu ya uzoefu mbaya?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="stopped_brand" value="yes" {{ old('stopped_brand') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="stopped_brand" value="no" {{ old('stopped_brand') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('stopped_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror

                            <label class="block text-xs text-gray-600 mt-2">Eleza:</label>
                            <textarea name="stopped_brand_explain" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('stopped_brand_explain') }}</textarea>
                            @error('stopped_brand_explain')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 3" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">5</span>
                        Bei & thamani
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">12. Kwa kawaida unanunua taulo kwa bei gani? <span class="text-red-500">*</span></p>
                            @php
                                $prices = [
                                    'under_2000' => 'Chini ya 2,000',
                                    '2000_4000' => '2,000–4,000',
                                    '4000_6000' => '4,000–6,000',
                                    'over_6000' => 'Zaidi ya 6,000',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($prices as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="price_range" value="{{ $key }}" {{ old('price_range') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('price_range')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">13. Uko tayari kulipa zaidi kidogo kwa taulo bora?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="yes" {{ old('pay_more') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="maybe" {{ old('pay_more') === 'maybe' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Labda</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="no" {{ old('pay_more') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('pay_more')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">14. Kwa maoni yako, taulo nzuri ni ipi?</label>
                            <input type="text" name="good_pad_definition" value="{{ old('good_pad_definition') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('good_pad_definition')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 4" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">6</span>
                        Maoni ya kweli
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">15. Kama ungeunda taulo yako bora kabisa, ingekuwaje?</label>
                            <textarea name="ideal_pad" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('ideal_pad') }}</textarea>
                            @error('ideal_pad')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">16. Ni tatizo gani la taulo bado halijatatuliwa kwako?</label>
                            <textarea name="unresolved_problem" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('unresolved_problem') }}</textarea>
                            @error('unresolved_problem')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">17. Je, ungejaribu brand mpya kama itatatua tatizo lako kubwa?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="yes" {{ old('try_new_brand') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="maybe" {{ old('try_new_brand') === 'maybe' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Labda</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="no" {{ old('try_new_brand') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('try_new_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">18. Maoni mengine yoyote:</label>
                            <textarea name="other_comments" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('other_comments') }}</textarea>
                            @error('other_comments')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-gray-100 mt-2">
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-rose-50 text-rose-500 text-xs font-semibold">
                            <span x-text="step"></span>
                        </span>
                        <span>
                            Hatua ya <span x-text="step"></span> / <span x-text="maxStep"></span>
                        </span>
                    </div>

                    <div class="flex items-center gap-3 justify-end">
                        <button
                            type="button"
                            class="px-4 py-2 rounded-full border border-gray-300 text-xs sm:text-sm text-gray-700 hover:bg-gray-50 disabled:opacity-40 disabled:cursor-not-allowed"
                            @click="if(step > 1) step--; window.scrollTo({top: 0, behavior: 'smooth'});"
                            :disabled="step === 1"
                        >
                            Rudi nyuma
                        </button>

                        <button
                            type="button"
                            x-show="step < maxStep"
                            x-cloak
                            class="px-5 py-2 rounded-full bg-[#7e22ce] hover:bg-[#6b21a8] text-white text-xs sm:text-sm font-medium shadow-sm"
                            @click="if(step < maxStep) { step++; window.scrollTo({top: 0, behavior: 'smooth'}); }"
                        >
                            Endelea
                        </button>

                        <button 
                            type="submit" 
                            x-show="step === maxStep" 
                            x-cloak 
                            @click="celebrate()"
                            :class="celebrating ? 'celebrate-btn' : ''"
                            class="px-6 py-2.5 rounded-full bg-[#7e22ce] hover:bg-[#6b21a8] text-white text-sm font-semibold shadow-lg hover:shadow-xl transition-all duration-200"
                        >
                            🎉 Tuma Dodoso
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
