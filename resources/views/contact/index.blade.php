<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wasiliana Nasi - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <!-- Header (same style as home) -->
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
                <a href="{{ route('contact') }}" class="hover:text-[#7e22ce]">Wasiliana Nasi</a>
            </nav>
        </div>
    </header>

    <main class="py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <h1 class="text-3xl font-extrabold mb-2">Wasiliana Nasi</h1>
                <p class="text-gray-700">Tuma ujumbe wako; tutakujibu ndani ya muda mfupi kadri iwezekanavyo.</p>

                <div class="mt-6 space-y-3 text-sm text-gray-700">
                    <p><strong>Barua pepe:</strong> {{ config('mail.from.address') }}</p>
                    <p><strong>Namba ya simu:</strong> +255 750 333 222</p>
                    <p><strong>Anuani:</strong> Dar es Salaam, Tanzania</p>
                </div>
            </div>

            <div class="lg:col-span-2">
                @if (session('contact_ok'))
                    <div class="mb-4 rounded-md bg-green-50 text-green-800 px-4 py-3 border border-green-200">
                        {{ session('contact_ok') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="p-6 border rounded-2xl bg-white">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Jina</label>
                            <input name="name" value="{{ old('name') }}" required class="mt-1 w-full border rounded-md px-3 py-2" />
                            @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Barua pepe</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full border rounded-md px-3 py-2" />
                            @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Mada</label>
                            <input name="subject" value="{{ old('subject') }}" required class="mt-1 w-full border rounded-md px-3 py-2" />
                            @error('subject')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Ujumbe</label>
                            <textarea name="message" rows="5" required class="mt-1 w-full border rounded-md px-3 py-2">{{ old('message') }}</textarea>
                            @error('message')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="px-6 py-3 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Tuma Ujumbe</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
