<x-guest-layout :showTopLogo="false" :fullWidth="true">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-2">
        <!-- Left: Full-height form on white -->
        <div class="relative bg-white border-r border-gray-200 flex items-center justify-center p-6 lg:p-10">
            <div class="w-full max-w-lg">
                <h1 class="text-2xl font-semibold mb-6">Karibu tena</h1>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="login" :value="__('Email au Namba ya Simu')" />
                        <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <x-input-label for="password" :value="__('Password')" />
                            @if (Route::has('password.request'))
                                <a class="text-sm text-[#7e22ce] hover:underline" href="{{ route('password.request') }}">Umesahau nenosiri?</a>
                            @endif
                        </div>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#7e22ce] shadow-sm focus:ring-[#7e22ce]" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Nikumbuke</span>
                    </label>

                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-[#7e22ce] text-white font-medium py-2.5 hover:bg-[#6b21a8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e22ce]">
                        Ingia kwenye akaunti
                    </button>
                </form>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t"></div></div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white px-2 text-gray-500">au</span>
                    </div>
                </div>

                <a href="{{ route('oauth.google.redirect') }}" class="w-full inline-flex justify-center items-center gap-2 border rounded-md py-2.5 text-sm hover:bg-gray-50">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-4 w-4"/>
                    Endelea na Google
                </a>

                <a href="{{ route('register') }}" class="mt-3 w-full inline-flex justify-center items-center gap-2 border border-[#7e22ce] text-[#7e22ce] rounded-md py-2.5 text-sm hover:bg-[#f3e8ff]">
                    Jisajili akaunti mpya
                </a>
            </div>
        </div>

        <!-- Right: Brand panel (purple + yellow) with headline and stats -->
        <div class="relative text-white flex items-center" style="background: radial-gradient(1200px 600px at 80% 20%, rgba(245,158,11,0.25), transparent 50%), linear-gradient(135deg, #6b21a8 0%, #7e22ce 35%, #7e22ce 60%, #f59e0b 120%);">
            <div class="max-w-2xl px-8 lg:px-16">
                <div class="inline-flex items-center gap-3 mb-2">
                    <span class="text-xl font-semibold tracking-wide animate-fade-up">{{ config('app.name', 'Malkia Konnect') }}</span>
                </div>
                <h2 class="text-3xl lg:text-5xl font-extrabold leading-tight mb-3 animate-fade-up" style="--delay:.08s">Jukwaa la afya ya uzazi kwa kila mama.</h2>
                <div class="h-1 w-24 bg-[#f59e0b] rounded mb-4"></div>
                <p class="text-white/90 lg:text-lg mb-6 animate-fade-up" style="--delay:.15s">Elimu, sapoti ya kitaalamu, na jamii yenye upendo — ndani ya {{ config('app.name', 'Malkia Konnect') }}. Mama siyo peke yake.</p>
                <div class="flex items-center gap-4">
                    <div class="flex -space-x-2">
                        <img src="https://i.pravatar.cc/40?img=12" class="h-9 w-9 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                        <img src="https://i.pravatar.cc/40?img=32" class="h-9 w-9 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                        <img src="https://i.pravatar.cc/40?img=25" class="h-9 w-9 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                        <img src="https://i.pravatar.cc/40?img=7" class="h-9 w-9 rounded-full ring-2 ring-[#f59e0b]/60" alt=""/>
                    </div>
                    <div class="text-sm text-white/90">
                        <span class="font-semibold text-[#fef3c7]">Zaidi ya 15.7k</span> · Wateja wenye furaha
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
