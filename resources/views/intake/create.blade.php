<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fomu ya Mama - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <style>
        .loader {
          width: 48px;
          height: 48px;
          border-radius: 50%;
          display: inline-block;
          position: relative;
          border: 3px solid;
          border-color: #FFF #FFF transparent transparent;
          box-sizing: border-box;
          animation: rotation 1s linear infinite;
        }
        .loader::after,
        .loader::before {
          content: '';
          box-sizing: border-box;
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          bottom: 0;
          margin: auto;
          border: 3px solid;
          border-color: transparent transparent #FF3D00 #FF3D00;
          width: 40px;
          height: 40px;
          border-radius: 50%;
          box-sizing: border-box;
          animation: rotationBack 0.5s linear infinite;
          transform-origin: center center;
        }
        .loader::before {
          width: 32px;
          height: 32px;
          border-color: #FFF #FFF transparent transparent;
          animation: rotation 1.5s linear infinite;
        }
        @keyframes rotation { 0% { transform: rotate(0deg);} 100% { transform: rotate(360deg);} }
        @keyframes rotationBack { 0% { transform: rotate(0deg);} 100% { transform: rotate(-360deg);} }
    </style>
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
                        hospital_placeholder: 'e.g. Muhimbili National Hospital',
                        pregnancy_weeks_q: 'How many weeks pregnant are you?',
                        postpartum: 'B • I have already delivered',
                        delivery_hospital_q: 'In which hospital did you deliver your baby?',
                        delivery_hospital_placeholder: 'e.g. Muhimbili National Hospital',
                        baby_weeks_q: 'How many weeks old is your baby?',
                        ttc: 'C • I am trying to conceive',
                        ttc_duration_q: 'For how long have you been trying to conceive?',
                        ttc_duration_placeholder: 'e.g. 3 months, 1 year, 6 weeks',
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
                        hospital_placeholder: 'mf. Hospitali ya Taifa Muhimbili',
                        pregnancy_weeks_q: 'Una ujauzito wa wiki ngapi?',
                        postpartum: 'B • Tayari nimejifungua',
                        delivery_hospital_q: 'Ulijifungua hospitali gani?',
                        delivery_hospital_placeholder: 'mf. Hospitali ya Taifa Muhimbili',
                        baby_weeks_q: 'Mtoto wako ana wiki ngapi?',
                        ttc: 'C • Ninajaribu kupata ujauzito',
                        ttc_duration_q: 'Umejaribu kupata ujauzito kwa muda gani?',
                        ttc_duration_placeholder: 'mf. miezi 3, mwaka 1, wiki 6',
                        consent1: 'Nakubali kupokea ushauri na vikumbusho kupitia WhatsApp/SMS kutoka Malkia Konnect.',
                        consent2_title: 'Ninaelewa kwamba',
                        consent2_body: 'Mafunzo na ushauri kutoka Malkia Konnect ni kwa ajili ya elimu tu. Hayachukui nafasi ya daktari, mkunga au huduma za dharura. Nita wasiliana na kituo cha afya mara moja nikipata dalili zisizo za kawaida.',
                        submit: 'Tuma'
                    }
                },
                success: false,
                phone: '',
                init() {
                    this.lang = localStorage.getItem('lang') || 'en';
                    // Blade session fallback
                    const bladeSuccess = {{ session('intake_success') ? 'true' : 'false' }};
                    const bladePhone = '{{ session('intake_phone', '') }}';
                    if (bladeSuccess) { this.success = true; this.phone = bladePhone; return; }
                    // URL params fallback: ?success=1&phone=...
                    const p = new URLSearchParams(window.location.search);
                    if (p.get('success') === '1') {
                        this.success = true;
                        this.phone = p.get('phone') || '';
                    }
                }
            }" x-init="init()">
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
                <p class="text-[#7e22ce] mt-1 font-semibold text-lg sm:text-xl md:text-2xl tracking-wide" x-text="t[lang].tagline"></p>
            </div>

            <!-- Success modal popup -->
            <div x-show="success" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="relative bg-white rounded-2xl shadow-2xl w-[90%] max-w-md p-6 text-center">
                    <h2 class="text-2xl font-bold mb-2">Congratulations!</h2>
                    <p class="text-gray-700">We have received your details.</p>
                    <p class="mt-2 text-sm text-gray-600">WhatsApp: <span class="font-semibold" x-text="phone"></span></p>
                    <div class="mt-6 flex justify-center gap-3">
                        <button type="button" @click="success=false" class="px-5 py-2 rounded-md border">Close</button>
                        <a href="/" class="px-5 py-2 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Go Home</a>
                    </div>
                </div>
            </div>

            <!-- Section 2: Simple Intake Form -->
            <form x-show="!success" method="POST" action="{{ route('intake.store') }}" class="relative bg-white/70 backdrop-blur-md border rounded-2xl p-5 sm:p-6 shadow-xl mx-auto max-w-3xl"
                  x-data="{
                      stage: '{{ old('journey_stage', '') }}',
                      submitting:false,
                      errors:{},
                      async submitForm(e){
                          this.submitting = true;
                          this.errors = {};
                          const form = e.target;
                          const url = form.getAttribute('action');
                          const fd = new FormData(form);
                          const csrf = form.querySelector('input[name=_token]')?.value;
                          try {
                              const res = await fetch(url, {
                                  method: 'POST',
                                  headers: { 'X-CSRF-TOKEN': csrf || '', 'Accept': 'application/json' },
                                  body: fd,
                                  redirect: 'follow',
                              });
                              if (res.status === 422) {
                                  const data = await res.json();
                                  this.errors = data.errors || {};
                                  this.submitting = false;
                                  return;
                              }
                              // Treat any other 2xx/3xx as success
                              this.phone = fd.get('phone') || '';
                              this.success = true;
                          } catch (err) {
                              console.error(err);
                          } finally {
                              this.submitting = false;
                          }
                      }
                  }"
                  @submit.prevent="submitForm($event)">
                @csrf

                <!-- Full name -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].full_name"></span> <span class="text-red-600">*</span></label>
                    <input name="full_name" required class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" :placeholder="lang==='en' ? 'e.g. Asha Mwita' : 'mf. Asha Mwita'" value="{{ old('full_name') }}" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s'\.\-]+$"
                           title="Tafadhali andika majina pekee (herufi, nafasi na alama za kawaida)" inputmode="text" autocomplete="name" />
                    @error('full_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    <template x-if="errors.full_name"><p class="text-sm text-red-600 mt-1" x-text="errors.full_name[0]"></p></template>
                </div>

                <!-- WhatsApp Phone -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].phone"></span> <span class="text-red-600">*</span></label>
                    <input type="tel" name="phone" required class="mt-1 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/40" :placeholder="lang==='en' ? 'e.g. 07xxxxxxx or +2557xxxxxxx' : 'mf. 07xxxxxxx au +2557xxxxxxx'" value="{{ old('phone') }}" inputmode="tel" pattern="^\+?\d{10,15}$" maxlength="16" title="Weka namba ya simu sahihi: tarakimu 10-15, unaweza kuanza na +" />
                    @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    <template x-if="errors.phone"><p class="text-sm text-red-600 mt-1" x-text="errors.phone[0]"></p></template>
                </div>

                <!-- Journey stage -->
                <div class="mb-4">
                    <label class="block text-sm sm:text-base font-medium"><span x-text="t[lang].journey_q"></span> <span class="text-red-600">*</span></label>
                    <div class="mt-2 space-y-4" x-data="{ selectedOption: '{{ old('journey_stage', '') }}' }">
                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="pregnant" x-model="stage" {{ old('journey_stage')==='pregnant' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].pregnant"></span>
                            </span>
                        </label>
                        <!-- Hospital question moved to bottom of options -->
                        <div x-show="stage==='pregnant'" x-transition class="ml-6 p-4 border rounded-lg bg-gray-50">
                            <label class="block text-sm font-medium text-gray-700 mb-2"><span x-text="t[lang].hospital_q"></span> <span class="text-red-600">*</span></label>

                            <!-- First hospital input field -->
                            <input name="hospital_planned" :required="stage==='pregnant'" class="w-full border rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-500" :placeholder="lang==='en' ? t.en.hospital_placeholder : t.sw.hospital_placeholder" value="{{ old('hospital_planned') }}" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,'\-()&]+$" title="Ingiza jina la hospitali" />
                            @error('hospital_planned')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                            <template x-if="errors.hospital_planned"><p class="text-sm text-red-600 mt-1" x-text="errors.hospital_planned[0]"></p></template>

                            <label class="block text-sm font-medium text-gray-700 mb-2"><span x-text="t[lang].pregnancy_weeks_q"></span> <span class="text-red-600">*</span></label>
                            <input type="number" name="pregnancy_weeks" :required="stage==='pregnant'" min="1" max="42" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="e.g. 22" value="{{ old('pregnancy_weeks') }}" />
                            @error('pregnancy_weeks')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                            <template x-if="errors.pregnancy_weeks"><p class="text-sm text-red-600 mt-1" x-text="errors.pregnancy_weeks[0]"></p></template>
                        </div>

                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="postpartum" x-model="stage" {{ old('journey_stage')==='postpartum' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].postpartum"></span>
                            </span>
                        </label>
                        <div x-show="stage==='postpartum'" x-transition class="ml-6 p-4 border rounded-lg bg-gray-50">
                            <label class="block text-sm font-medium text-gray-700 mb-2"><span x-text="t[lang].delivery_hospital_q"></span> <span class="text-red-600">*</span></label>

                            <!-- Delivery hospital input field -->
                            <input name="delivery_hospital" :required="stage==='postpartum'" class="w-full border rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-500" :placeholder="lang==='en' ? t.en.delivery_hospital_placeholder : t.sw.delivery_hospital_placeholder" value="{{ old('delivery_hospital') }}" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,'\-()&]+$" title="Ingiza jina la hospitali uliyojifungulia" />
                            @error('delivery_hospital')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror

                            <label class="block text-sm font-medium text-gray-700 mb-2"><span x-text="t[lang].baby_weeks_q"></span> <span class="text-red-600">*</span></label>
                            <input type="number" name="baby_weeks_old" :required="stage==='postpartum'" min="0" max="52" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="e.g. 6" value="{{ old('baby_weeks_old') }}" />
                            @error('baby_weeks_old')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <label class="flex items-start gap-2 p-3 border rounded-md cursor-pointer hover:bg-gray-50">
                            <input class="mt-1" type="radio" name="journey_stage" value="ttc" x-model="stage" {{ old('journey_stage')==='ttc' ? 'checked' : '' }} required />
                            <span class="leading-6">
                                <span class="font-medium" x-text="t[lang].ttc"></span>
                            </span>
                        </label>
                        <div x-show="stage==='ttc'" x-transition class="ml-6 p-4 border rounded-lg bg-gray-50">
                            <label class="block text-sm font-medium text-gray-700 mb-2"><span x-text="t[lang].ttc_duration_q"></span> <span class="text-red-600">*</span></label>

                            <!-- TTC duration input field -->
                            <input name="ttc_duration" :required="stage==='ttc'" class="w-full border rounded-md px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-500" :placeholder="lang==='en' ? t.en.ttc_duration_placeholder : t.sw.ttc_duration_placeholder" value="{{ old('ttc_duration') }}" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s\.,']+$" title="Ingiza muda uliotumia kujaribu kupata ujauzito" />
                            @error('ttc_duration')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                            </div>
                    </div>
                    @error('journey_stage')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror

                <!-- Consent checkboxes -->
                <div class="mb-4">
                    <label class="inline-flex items-start gap-2">
                        <input class="mt-1" type="checkbox" name="agree_comms" value="1" {{ old('agree_comms') ? 'checked' : '' }} required />
                        <span class="text-sm sm:text-base"><span x-text="t[lang].consent1"></span> <span class="text-red-600">*</span></span>
                    </label>
                    @error('agree_comms')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    <template x-if="errors.agree_comms"><p class="text-sm text-red-600 mt-1" x-text="errors.agree_comms[0]"></p></template>
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
                    <template x-if="errors.disclaimer_ack"><p class="text-sm text-red-600 mt-1" x-text="errors.disclaimer_ack[0]"></p></template>
                </div>

                <!-- Submit -->
                <div class="mt-6 flex justify-end">
                    <button class="inline-flex w-full sm:w-auto justify-center px-5 py-2.5 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8] shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e22ce]/50"
                            :class="submitting ? 'opacity-70 cursor-not-allowed' : ''"
                            x-text="t[lang].submit" :disabled="submitting"></button>
                </div>
                <!-- Submitting overlay -->
                <div x-show="submitting" x-transition.opacity class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-black/40 backdrop-blur-sm rounded-2xl">
                    <span class="loader"></span>
                    <span class="text-white font-medium">Submitting...</span>
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
                hospital_placeholder: 'e.g. Muhimbili National Hospital',
                postpartum: 'B • I have already delivered',
                delivery_hospital_q: 'In which hospital did you deliver your baby?',
                delivery_hospital_placeholder: 'e.g. Muhimbili National Hospital',
                baby_weeks_q: 'How many weeks old is your baby?',
                ttc: 'C • I am trying to conceive',
                ttc_duration_q: 'For how long have you been trying to conceive?',
                ttc_duration_placeholder: 'e.g. 3 months, 1 year, 6 weeks',
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
                hospital_placeholder: 'mf. Hospitali ya Taifa Muhimbili',
                postpartum: 'B • Tayari nimejifungua',
                delivery_hospital_q: 'Ulijifungua hospitali gani?',
                delivery_hospital_placeholder: 'mf. Hospitali ya Taifa Muhimbili',
                baby_weeks_q: 'Mtoto wako ana wiki ngapi?',
                ttc: 'C • Ninajaribu kupata ujauzito',
                ttc_duration_q: 'Umejaribu kupata ujauzito kwa muda gani?',
                ttc_duration_placeholder: 'mf. miezi 3, mwaka 1, wiki 6',
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
