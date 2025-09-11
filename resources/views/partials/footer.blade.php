<footer class="border-t bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Logo" class="h-8 w-8 rounded object-cover"/>
                    <span class="font-semibold">{{ config('app.name', 'Malkia Konnect') }}</span>
                </div>
                <p class="text-sm text-gray-600">Safari salama ya afya ya uzazi. Elimu, jamii, na wataalamu—mahali pamoja.</p>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-3">Kurasa</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-[#7e22ce]">Home</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-[#7e22ce]">Huduma</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#7e22ce]">Kuhusu Sisi</a></li>
                    <li><a href="{{ url('/#blog') }}" class="hover:text-[#7e22ce]">Blog</a></li>
                    <li><a href="{{ url('/#newsletter') }}" class="hover:text-[#7e22ce]">Jarida</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-3">Kisheria</h4>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-[#7e22ce]">Masharti ya matumizi</a></li>
                    <li><a href="#" class="hover:text-[#7e22ce]">Sera ya Faragha</a></li>
                </ul>
            </div>

            <!-- Social -->
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-3">Tufuate</h4>
                <div class="flex items-center gap-3">
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-md border hover:bg-gray-50" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3h10zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.75a.75.75 0 100 1.5.75.75 0 000-1.5z"/></svg>
                    </a>
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-md border hover:bg-gray-50" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M13 3h4a1 1 0 011 1v3h-3a1 1 0 00-1 1v3h4l-1 4h-3v7h-4v-7H8v-4h2V8a5 5 0 015-5z"/></svg>
                    </a>
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-md border hover:bg-gray-50" aria-label="X">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M3 3l7.5 9L3 21h3l6-7.5L18 21h3l-7.5-9L21 3h-3l-6 7.5L6 3H3z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t text-sm text-gray-600 flex flex-col md:flex-row items-center justify-between gap-4">
            <p>© {{ date('Y') }} {{ config('app.name', 'Malkia Konnect') }}. Haki zote zimehifadhiwa.</p>
            <p class="text-gray-500">Developer: <a href="https://www.ezra.amoleck.co.tz" target="_blank" rel="noopener" class="text-[#7e22ce] hover:underline">RayDev</a></p>
        </div>
    </div>
</footer>
