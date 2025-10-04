<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fomu ya Mama - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <!-- Background video (blurred) -->
    <div class="fixed inset-0 z-0 overflow-hidden" x-data="{ vids: ['{{ asset('0_Pregnant_Doctor_3840x2160.mp4') }}','{{ asset('5123981_People_Women_3840x2160.mp4') }}'], i: 0 }" x-init="
        const v = $refs.bgv;
        const setSrc = () => { v.src = vids[i]; v.load(); v.play().catch(() => {}); };
        setSrc();
        v.onended = () => { i = (i + 1) % vids.length; setSrc(); };
    ">
        <video x-ref="bgv" class="w-full h-full object-cover blur-md brightness-95" autoplay muted playsinline preload="auto"></video>
        <div class="absolute inset-0 bg-black/20"></div>
    </div>
    <!-- Header (same style as home) -->
    <header class="w-full sticky top-0 z-40 bg-white/70 backdrop-blur border-b">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Logo" class="h-8 w-8 rounded object-cover"/>
                <span class="font-semibold">{{ config('app.name', 'Malkia Konnect') }}</span>
            </a>
        </div>
    </header>

    <main class="py-10 relative z-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8" x-data="{
                lang: 'en',
                t: {
                    en: {
                        welcome: 'Welcome',
                        title: 'Welcome to Malkia Konnect',
                        tagline: 'Your Pocket Midwife',
                        full_name: 'What is your full name?',
                        phone: 'Enter your Whatsapp Phone Number',
                        journey_q: 'Where are you on your motherhood Journey? (Choose one)',
                        pregnant: 'A • I am currently pregnant',
                        hospital_q: 'In which hospital do you plan to deliver your baby?',
                        postpartum: 'B • I have already delivered',
                        baby_weeks_q: 'How many weeks old is your baby?',
                        ttc: 'C • I am trying to conceive',
                        consent1: 'I agree to receive WhatsApp/SMS tips & reminders from Malkia Konnect.',
                        consent2_title: 'I understand that',
                        consent2_body: 'Training and advice from Malkia Konnect are for educational purposes only. They do not replace a doctor, midwife, or emergency services. I will contact a health facility immediately if I experience unusual symptoms.',
                        submit: 'Submit'
                    },
                    sw: {
                        welcome: 'Karibu',
                        title: 'Karibu Malkia Konnect',
                        tagline: 'Mkunga wako mfukoni',
                        full_name: 'Jina lako kamili ni lipi?',
                        phone: 'Weka namba yako ya WhatsApp',
                        journey_q: 'Upo wapi kwenye safari ya uzazi? (Chagua moja)',
                        pregnant: 'A • Mimi ni mjamzito kwa sasa',
                        hospital_q: 'Unapanga kujifungua hospitali gani?',
                        postpartum: 'B • Tayari nimejifungua',
                        baby_weeks_q: 'Mtoto wako ana wiki ngapi?',
                        ttc: 'C • Ninajaribu kupata ujauzito',
                        consent1: 'Nakubali kupokea ushauri na vikumbusho kupitia WhatsApp/SMS kutoka Malkia Konnect.',
                        consent2_title: 'Ninaelewa kwamba',
                        consent2_body: 'Mafunzo na ushauri kutoka Malkia Konnect ni kwa ajili ya elimu tu. Hayachukui nafasi ya daktari, mkunga au huduma za dharura. Nita wasiliana na kituo cha afya mara moja nikipata dalili zisizo za kawaida.',
                        submit: 'Tuma'
                    }
                }
            }" x-init="lang = localStorage.getItem('lang') || 'en'">
            <!-- Section 1: Welcome copy -->
            <div class="text-center mb-8">
                <div class="flex justify-end mb-3">
                    <div class="inline-flex rounded-md border bg-white/70 backdrop-blur">
                        <button type="button" class="px-3 py-1 text-sm" :class="lang==='en' ? 'bg-[#7e22ce] text-white' : 'text-gray-700'" @click="lang='en'; localStorage.setItem('lang','en')">EN</button>
                        <button type="button" class="px-3 py-1 text-sm" :class="lang==='sw' ? 'bg-[#7e22ce] text-white' : 'text-gray-700'" @click="lang='sw'; localStorage.setItem('lang','sw')">SW</button>
                    </div>
                </div>
                <p class="text-xs sm:text-sm uppercase tracking-wide text-gray-600" x-text="t[lang].welcome"></p>
                <h1 class="text-2xl sm:text-3xl font-extrabold mt-1" x-text="t[lang].title"></h1>
                <p class="text-[#7e22ce] mt-1 font-medium text-sm sm:text-base" x-text="t[lang].tagline"></p>
            </div>

            <!-- Section 2: Simple Intake Form -->
            <form method="POST" action="{{ route('intake.store') }}" class="bg-white/70 backdrop-blur-md border rounded-2xl p-5 sm:p-6 shadow-xl mx-auto max-w-3xl"
                  x-data="{ stage: '{{ old('journey_stage', '') }}' }">
                @csrf

                <!-- Full name -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].full_name"></span> <span class="text-red-600">*</span></label>
                    <input name="full_name" required class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" :placeholder="lang==='en' ? 'e.g. Asha Mwita' : 'mf. Asha Mwita'" value="{{ old('full_name') }}" />
                    @error('full_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- WhatsApp Phone -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].phone"></span> <span class="text-red-600">*</span></label>
                    <input name="phone" required class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" :placeholder="lang==='en' ? 'e.g. 07xxxxxxx or +2557xxxxxxx' : 'mf. 07xxxxxxx au +2557xxxxxxx'" value="{{ old('phone') }}" />
                    @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Journey stage -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].journey_q"></span> <span class="text-red-600">*</span></label>
                    <div class="mt-2 grid gap-2">
                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="pregnant" x-model="stage" {{ old('journey_stage')==='pregnant' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].pregnant"></span>
                            </span>
                        </label>
                        <div x-show="stage==='pregnant'" x-transition class="ml-6">
                            <label class="block text-sm sm:text-base font-medium mt-2"><span x-text="t[lang].hospital_q"></span> <span class="text-red-600">*</span></label>
                            <input name="hospital_planned" :required="stage==='pregnant'" class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" placeholder="e.g. Muhimbili National Hospital" value="{{ old('hospital_planned') }}" />
                            @error('hospital_planned')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="postpartum" x-model="stage" {{ old('journey_stage')==='postpartum' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].postpartum"></span>
                            </span>
                        </label>
                        <div x-show="stage==='postpartum'" x-transition class="ml-6">
                            <label class="block text-sm sm:text-base font-medium mt-2"><span x-text="t[lang].baby_weeks_q"></span> <span class="text-red-600">*</span></label>
                            <input type="number" name="baby_weeks_old" :required="stage==='postpartum'" min="0" max="52" class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" placeholder="e.g. 6" value="{{ old('baby_weeks_old') }}" />
                            @error('baby_weeks_old')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="ttc" x-model="stage" {{ old('journey_stage')==='ttc' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].ttc"></span>
                            </span>
                        </label>
                    </div>
                    @error('journey_stage')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror

                <!-- Consent checkboxes -->
                <div class="mb-4">
                    <label class="inline-flex items-start gap-2">
                        <input class="mt-1" type="checkbox" name="agree_comms" value="1" {{ old('agree_comms') ? 'checked' : '' }} required />
                        <span class="text-sm sm:text-base"><span x-text="t[lang].consent1"></span> <span class="text-red-600">*</span></span>
                    </label>
                    @error('agree_comms')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-start gap-2">
                        <input class="mt-1" type="checkbox" name="disclaimer_ack" value="1" {{ old('disclaimer_ack') ? 'checked' : '' }} required />
                        <span class="text-sm sm:text-base">
                            <span class="font-medium" x-text="t[lang].consent2_title"></span> <span class="text-red-600">*</span><br/>
                            <span x-text="t[lang].consent2_body"></span>
                        </span>
                    </label>
                    @error('disclaimer_ack')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Submit -->
                <div class="mt-6 flex justify-end">
                    <button class="inline-flex w-full sm:w-auto justify-center px-5 py-2.5 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8] shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e22ce]/50" x-text="t[lang].submit"></button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const t = {
            en: {
                welcome: 'Welcome',
                title: 'Welcome to Malkia Konnect',
                tagline: 'Your Pocket Midwife',
                full_name: 'What is your full name?',
                phone: 'Enter your Whatsapp Phone Number',
                journey_q: 'Where are you on your motherhood Journey? (Choose one)',
                pregnant: 'A • I am currently pregnant',
                hospital_q: 'In which hospital do you plan to deliver your baby?',
                postpartum: 'B • I have already delivered',
                baby_weeks_q: 'How many weeks old is your baby?',
                ttc: 'C • I am trying to conceive',
                consent1: 'I agree to receive WhatsApp/SMS tips & reminders from Malkia Konnect.',
                consent2_title: 'I understand that',
                consent2_body: 'Training and advice from Malkia Konnect are for educational purposes only. They do not replace a doctor, midwife, or emergency services. I will contact a health facility immediately if I experience unusual symptoms.',
                submit: 'Submit'
            },
            sw: {
                welcome: 'Karibu',
                title: 'Karibu Malkia Konnect',
                tagline: 'Mkunga wako mfukoni',
                full_name: 'Jina lako kamili ni lipi?',
                phone: 'Weka namba yako ya WhatsApp',
                journey_q: 'Upo wapi kwenye safari ya uzazi? (Chagua moja)',
                pregnant: 'A • Mimi ni mjamzito kwa sasa',
                hospital_q: 'Unapanga kujifungua hospitali gani?',
                postpartum: 'B • Tayari nimejifungua',
                baby_weeks_q: 'Mtoto wako ana wiki ngapi?',
                ttc: 'C • Ninajaribu kupata ujauzito',
                consent1: 'Nakubali kupokea ushauri na vikumbusho kupitia WhatsApp/SMS kutoka Malkia Konnect.',
                consent2_title: 'Ninaelewa kwamba',
                consent2_body: 'Mafunzo na ushauri kutoka Malkia Konnect ni kwa ajili ya elimu tu. Hayachukui nafasi ya daktari, mkunga au huduma za dharura. Nita wasiliana na kituo cha afya mara moja nikipata dalili zisizo za kawaida.',
                submit: 'Tuma'
            }
        };
        const lang = localStorage.getItem('lang') || 'en';
    </script>
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
