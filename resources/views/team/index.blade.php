<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meet the Team - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    @include('partials.header')

    <main>
        <!-- Hero -->
        <section class="bg-gray-50 py-14 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-sm uppercase tracking-wider text-[#7e22ce]">Our Team</p>
                <h1 class="text-3xl lg:text-5xl font-extrabold mb-3">Meet the Team</h1>
                <p class="text-gray-700 max-w-3xl mx-auto">Behind Malkia is a passionate team of health professionals and creators dedicated to supporting mothers.</p>
            </div>
        </section>

        <!-- Team Grid (placeholder content) -->
        <section class="py-12 lg:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $team = [
                            ['name' => 'Jane Doe', 'role' => 'Midwife', 'img' => 'https://i.pravatar.cc/300?img=11'],
                            ['name' => 'John Smith', 'role' => 'Nutritionist', 'img' => 'https://i.pravatar.cc/300?img=22'],
                            ['name' => 'Amina Ali', 'role' => 'Pediatric Nurse', 'img' => 'https://i.pravatar.cc/300?img=33'],
                        ];
                    @endphp
                    @foreach($team as $m)
                        <div class="bg-white border rounded-2xl p-6 text-center shadow-sm">
                            <img src="{{ $m['img'] }}" alt="{{ $m['name'] }}" class="h-28 w-28 rounded-full object-cover mx-auto mb-4">
                            <h3 class="font-semibold text-[#642321]">{{ $m['name'] }}</h3>
                            <p class="text-sm text-[#642321]/70">{{ $m['role'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>
