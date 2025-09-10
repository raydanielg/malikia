<x-guest-layout :showTopLogo="false" :fullWidth="true">
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-2">
        <!-- Left: Instruction + form (white) -->
        <div class="relative bg-white border-r border-gray-200 flex items-center justify-center p-6 lg:p-10">
            <div class="w-full max-w-lg">
                <h1 class="text-2xl font-semibold mb-3">Rekebisha nenosiri</h1>
                <p class="mb-6 text-sm text-gray-600">Weka barua pepe yako na tutakutumia kiungo cha kurekebisha nenosiri. Angalia kwenye <strong>Inbox</strong> au <strong>Spam</strong>.</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-[#7e22ce] text-white font-medium py-2.5 hover:bg-[#6b21a8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e22ce]">
                        Tuma kiungo cha kurekebisha
                    </button>
                </form>

                <p class="mt-4 text-sm text-gray-600">Kumbuka nenosiri? <a href="{{ route('login') }}" class="text-[#7e22ce] hover:underline">Rudi kwenye kuingia</a></p>
            </div>
        </div>

        <!-- Right: Brand panel (purple + yellow) -->
        <div class="relative text-white flex items-center" style="background: radial-gradient(1200px 600px at 80% 20%, rgba(245,158,11,0.25), transparent 50%), linear-gradient(135deg, #6b21a8 0%, #7e22ce 35%, #7e22ce 60%, #f59e0b 120%);">
            <div class="max-w-2xl px-8 lg:px-16">
                <div class="inline-flex items-center gap-3 mb-2">
                    <span class="text-xl font-semibold tracking-wide animate-fade-up">{{ config('app.name', 'Malkia Konnect') }}</span>
                </div>
                <h2 class="text-3xl lg:text-5xl font-extrabold leading-tight mb-3 animate-fade-up" style="--delay:.08s">Usalama wa akaunti yako ni muhimu.</h2>
                <div class="h-1 w-24 bg-[#f59e0b] rounded mb-4"></div>
                <p class="text-white/90 lg:text-lg mb-6 animate-fade-up" style="--delay:.15s">Tunakulinda kupitia hatua rahisi za kubadilisha nenosiri. Ukikwama, timu yetu iko tayari kukusaidia.</p>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 opacity-0 animate-fade-up" style="--delay:.20s">
                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-yellow-200 text-yellow-900 animate-pop">✓</span>
                        <span class="text-white/95 lg:text-lg">Haraka na rahisi kutumia.</span>
                    </li>
                    <li class="flex items-start gap-3 opacity-0 animate-fade-up" style="--delay:.30s">
                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-yellow-200 text-yellow-900 animate-pop">✓</span>
                        <span class="text-white/95 lg:text-lg">Kiungo salama cha kubadilisha nenosiri.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>
