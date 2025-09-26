<header x-data="{ open:false }" class="w-full sticky top-0 z-50 bg-white/90 backdrop-blur supports-[backdrop-filter]:bg-white/70 border-b border-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
          <!-- Brand -->
          <a href="/" class="flex items-center gap-2">
              <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Malkia" class="h-8 w-8 rounded object-cover" />
              <span class="text-lg font-semibold tracking-tight">Malkia</span>
          </a>

          <!-- Desktop Menu -->
          <nav class="hidden md:flex items-center gap-6 text-sm">
              <a href="/" class="inline-flex items-center gap-2 hover:text-fuchsia-700">
                  <!-- Home icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a1.5 1.5 0 00-1.5-1.5h-3a1.5 1.5 0 00-1.5 1.5V21a.75.75 0 01-.75.75h-4.5A.75.75 0 013 21V9.75z"/></svg>
                  <span>Home</span>
              </a>
              <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" class="inline-flex items-center gap-2 hover:text-fuchsia-700">
                  <!-- Shopping bag icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5V6a4.5 4.5 0 119 0v1.5m3 0h.75a.75.75 0 01.75.75v10.5A2.25 2.25 0 0118 22.5H6A2.25 2.25 0 013.75 19.5V8.25a.75.75 0 01.75-.75h.75m12 0H6.75m12 0V9M6.75 7.5V9"/></svg>
                  <span>Shop</span>
              </a>
              <a href="{{ route('intake.create') }}" class="inline-flex items-center gap-2 hover:text-fuchsia-700">
                  <!-- Users icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5a6 6 0 10-12 0M21 19.5a6 6 0 00-9-5.197M9 10.5a3 3 0 100-6 3 3 0 000 6zm10.5-1.5a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                  <span>Konnect</span>
              </a>
              <a href="#resources" class="inline-flex items-center gap-2 hover:text-fuchsia-700">
                  <!-- Book open icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75c-2.25-1.5-4.5-1.5-6.75 0V18c2.25-1.5 4.5-1.5 6.75 0m0-11.25c2.25-1.5 4.5-1.5 6.75 0V18c-2.25-1.5-4.5-1.5-6.75 0"/></svg>
                  <span>Resources</span>
              </a>
              <a href="{{ route('about') }}" class="inline-flex items-center gap-2 hover:text-fuchsia-700">
                  <!-- Info circle icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9h1.5m-1.5 3h1.5m-1.5 3h1.5M12 21.75A9.75 9.75 0 1012 2.25a9.75 9.75 0 000 19.5z"/></svg>
                  <span>About</span>
              </a>
          </nav>

          <!-- Actions -->
          <div class="hidden md:flex items-center gap-3 relative">
              <!-- CTA -->
              <a href="{{ route('intake.create') }}" class="inline-flex items-center gap-2 rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 text-white text-sm font-medium px-4 py-2">
                  <span>Join Konnect</span>
              </a>

              <!-- Menu icon (kebab) for possible extra) -->
              <button type="button" class="h-9 w-9 grid place-items-center rounded-full hover:bg-gray-100" aria-label="Menu">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm6 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm6 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
              </button>
          </div>

          <!-- Mobile hamburger -->
          <button @click="open = !open" class="md:hidden inline-flex items-center justify-center h-10 w-10 rounded-md hover:bg-gray-100" aria-label="Toggle menu">
              <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
              <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
          </button>
      </div>

      <!-- Mobile menu panel -->
      <div x-show="open" x-transition.origin.top class="md:hidden border-t border-gray-100 bg-white">
          <nav class="px-4 py-4 flex flex-col gap-3 text-sm">
                  <a href="/" class="py-2 inline-flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a1.5 1.5 0 00-1.5-1.5h-3a1.5 1.5 0 00-1.5 1.5V21a.75.75 0 01-.75.75h-4.5A.75.75 0 013 21V9.75z"/></svg>
                      <span>Home</span>
                  </a>
              <a href="https://shop.malkia.co.tz" target="_blank" rel="noopener" class="py-2 inline-flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5V6a4.5 4.5 0 119 0v1.5m3 0h.75a.75.75 0 01.75.75v10.5A2.25 2.25 0 0118 22.5H6A2.25 2.25 0 013.75 19.5V8.25a.75.75 0 01.75-.75h.75m12 0H6.75m12 0V9M6.75 7.5V9"/></svg>
                  <span>Shop</span>
              </a>
              <a href="{{ route('intake.create') }}" class="py-2 inline-flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5a6 6 0 10-12 0M21 19.5a6 6 0 00-9-5.197M9 10.5a3 3 0 100-6 3 3 0 000 6zm10.5-1.5a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                  <span>Konnect</span>
              </a>
              <a href="#resources" class="py-2 inline-flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75c-2.25-1.5-4.5-1.5-6.75 0V18c2.25-1.5 4.5-1.5 6.75 0m0-11.25c2.25-1.5 4.5-1.5 6.75 0V18c-2.25-1.5-4.5-1.5-6.75 0"/></svg>
                  <span>Resources</span>
              </a>
              <a href="{{ route('about') }}" class="py-2 inline-flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9h1.5m-1.5 3h1.5m-1.5 3h1.5M12 21.75A9.75 9.75 0 1012 2.25a9.75 9.75 0 000 19.5z"/></svg>
                  <span>About</span>
              </a>
                  <div class="pt-3 flex items-center gap-3">
                      <a href="{{ route('intake.create') }}" class="inline-flex items-center gap-2 rounded-full bg-fuchsia-600 hover:bg-fuchsia-700 text-white text-sm font-medium px-4 py-2 grow justify-center">Join Konnect</a>
                  </div>
              </nav>
          </div>

  </header>
