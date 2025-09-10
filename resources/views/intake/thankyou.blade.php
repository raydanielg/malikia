<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asante - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900" x-data="{open:true}">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/50" x-show="open" x-transition.opacity></div>
    <!-- Modal -->
    <div class="fixed inset-0 flex items-center justify-center px-4" x-show="open" x-transition>
        <div class="w-full max-w-3xl bg-white rounded-2xl overflow-hidden shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <!-- Image side -->
                <div class="relative h-48 md:h-full">
                    <img src="{{ asset('african-pregnant-woman-is-sitting-floor-dressed-with-african-pattern-fabric_156889-8 (1).jpg') }}" alt="Malkia Konnect" class="absolute inset-0 w-full h-full object-cover" loading="eager" />
                </div>
                <!-- Content side -->
                <div class="p-6 md:p-8 flex flex-col items-center text-center">
                    <div class="h-14 w-14 rounded-full bg-green-100 text-green-700 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-2.59a.75.75 0 10-1.22-.86l-3.42 4.86-1.65-1.65a.75.75 0 10-1.06 1.06l2.25 2.25a.75.75 0 001.15-.09l3.95-5.57z" clip-rule="evenodd"/></svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-extrabold mb-2">Karibu sana Malkia Konnect!</h1>
                    <p class="text-gray-800 font-medium mb-2">Umeunganishwa rasmi mama.</p>
                    <p class="text-gray-700">Miongozo yako ya kwanza ya binafsi itakufikia WhatsApp ndani ya saa 24.</p>
                    <p class="text-gray-700 mt-2">Tafadhali hifadhi namba hii sasa: <span class="font-semibold">+255 750 333 222</span>, kisha tutumie neno <span class="font-semibold">Malkia</span> ili usikose taarifa.</p>

                    <div class="mt-5 w-full flex flex-col gap-2">
                        <a href="https://wa.me/255750333222?text=Malkia" target="_blank" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-md bg-[#25D366] text-white hover:opacity-90">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M.057 24l1.687-6.163A11.93 11.93 0 0 1 0 11.99C0 5.373 5.373 0 11.99 0 18.607 0 24 5.373 24 11.99c0 6.616-5.393 11.99-12.01 11.99a11.95 11.95 0 0 1-6.104-1.688L.057 24zM6.59 20.013c1.736.995 3.276 1.591 5.4 1.591 5.45 0 9.89-4.436 9.89-9.89 0-5.45-4.44-9.89-9.89-9.89-5.45 0-9.89 4.44-9.89 9.89 0 2.123.657 3.684 1.76 5.4l-.975 3.57 3.705-.67zm11.387-5.464c-.062-.103-.225-.165-.47-.288-.246-.123-1.45-.713-1.678-.795-.225-.082-.39-.123-.556.123-.165.246-.64.795-.783.96-.144.165-.288.185-.534.062-.246-.123-1.04-.382-1.98-1.218-.732-.651-1.226-1.456-1.37-1.702-.144-.246-.015-.379.108-.502.111-.111.246-.288.369-.433.123-.144.165-.246.246-.41.082-.165.041-.308-.02-.431-.062-.123-.556-1.34-.762-1.836-.2-.48-.406-.415-.556-.423l-.473-.008c-.165 0-.431.062-.657.308-.225.246-.86.84-.86 2.037s.882 2.366 1.003 2.532c.123.165 1.733 2.644 4.2 3.707.588.253 1.046.403 1.404.516.59.188 1.127.162 1.552.098.474-.071 1.45-.593 1.654-1.167.205-.574.205-1.066.144-1.167z"/></svg>
                            Fungua WhatsApp
                        </a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-3 rounded-md border">Nenda Dashboard</a>
                        @else
                            <a href="/" class="inline-flex items-center justify-center px-5 py-3 rounded-md border">Rudi Mwanzo</a>
                        @endauth
                        <button @click="open=false" class="inline-flex items-center justify-center px-5 py-3 rounded-md">Funga</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
