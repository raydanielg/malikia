<x-guest-layout :showTopLogo="false" :fullWidth="true">
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-2">
        <!-- Left: Full-height registration form on white -->
        <div class="relative bg-white border-r border-gray-200 flex items-center justify-center p-6 lg:p-10">
            <div class="w-full max-w-lg">
                <h1 class="text-2xl font-semibold mb-6">Unda akaunti</h1>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="phone" :value="__('Namba ya Simu (hiari)')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autocomplete="tel" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-[#7e22ce] text-white font-medium py-2.5 hover:bg-[#6b21a8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e22ce]">Jisajili</button>
                </form>

                <p class="mt-4 text-sm text-gray-600">Tayari una akaunti? <a href="{{ route('login') }}" class="text-[#7e22ce] hover:underline">Ingia hapa</a></p>
            </div>
        </div>

        <!-- Right: Brand panel (purple + yellow) with animated checklist -->
        <div class="relative text-white flex items-center" style="background: radial-gradient(1200px 600px at 80% 20%, rgba(245,158,11,0.25), transparent 50%), linear-gradient(135deg, #6b21a8 0%, #7e22ce 35%, #7e22ce 60%, #f59e0b 120%);">
            <div class="max-w-2xl px-8 lg:px-16">
                <div class="inline-flex items-center gap-3 mb-2">
                    <span class="text-xl font-semibold tracking-wide animate-fade-up">{{ config('app.name', 'Malkia Konnect') }}</span>
                </div>
                <h2 class="text-3xl lg:text-5xl font-extrabold leading-tight mb-3 animate-fade-up" style="--delay:.08s">Karibu nyumbani, mama.</h2>
                <div class="h-1 w-24 bg-[#f59e0b] rounded mb-6"></div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 opacity-0 animate-fade-up" style="--delay:.05s">
                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-yellow-200 text-yellow-900 animate-pop">✓</span>
                        <span class="text-white/95 lg:text-lg">Jamii inayokuelewa na kukusaidia.</span>
                    </li>
                    <li class="flex items-start gap-3 opacity-0 animate-fade-up" style="--delay:.15s">
                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-yellow-200 text-yellow-900 animate-pop">✓</span>
                        <span class="text-white/95 lg:text-lg">Makala sahihi, video na rasilimali za kujifunza.</span>
                    </li>
                    <li class="flex items-start gap-3 opacity-0 animate-fade-up" style="--delay:.25s">
                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-yellow-200 text-yellow-900 animate-pop">✓</span>
                        <span class="text-white/95 lg:text-lg">Matukio na warsha za kukuongeza ujasiri.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>
