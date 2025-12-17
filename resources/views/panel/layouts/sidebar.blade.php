<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-emerald-900 text-emerald-50" aria-label="Sidenav">
    <div class="overflow-y-auto py-5 px-4 h-full">
        <!-- Logo Section -->
        <div class="mb-8">
            <a href="{{ route('panel') }}" class="flex items-center pl-2.5 mb-5">
                <img src="{{ asset('logo.jpg') }}" class="h-9 mr-3 rounded-full" alt="Malkia Konnect Logo" />
                <div>
                    <span class="self-center text-lg font-semibold text-white">Malkia Konnect</span>
                    <p class="text-xs text-emerald-200">Paneli ya Msimamizi</p>
                </div>
            </a>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-1 text-sm">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('panel') }}" class="flex items-center px-3 py-2 rounded-lg bg-emerald-800 text-white font-medium hover:bg-emerald-700 transition-colors group">
                    <div class="p-2 bg-emerald-700 rounded-md group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-5 h-5 text-emerald-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <!-- Form Management -->
            <li>
                <button type="button" class="flex items-center justify-between px-3 py-2 w-full rounded-lg bg-emerald-800/60 text-emerald-50 hover:bg-emerald-700 transition-colors group" aria-controls="dropdown-forms" data-collapse-toggle="dropdown-forms">
                    <div class="flex items-center">
                        <div class="p-2 bg-emerald-700 rounded-md group-hover:bg-emerald-600 transition-colors">
                            <svg class="w-5 h-5 text-emerald-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="ml-3">Usimamizi wa Fomu</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-forms" class="hidden py-2 space-y-1 pl-4">
                    <li>
                        <a href="{{ route('panel.intakes.index') }}" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Majibu ya Fomu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.surveys.index') }}" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Survey - Taulo za Kike
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.reports') }}" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Takwimu na Ripoti
                        </a>
                    </li>
                </ul>
            </li>

            <!-- User Profile & Settings -->
            <div class="mt-8 border-t border-emerald-800 pt-4">
                <button type="button" class="flex items-center justify-between w-full px-3 py-2 rounded-lg text-emerald-50 hover:bg-emerald-800/70 transition-colors group" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                    <div class="flex items-center">
                        <div class="p-2 bg-emerald-800 rounded-md group-hover:bg-emerald-700 transition-colors">
                            <svg class="w-5 h-5 text-emerald-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="ml-3 text-sm font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-user" class="hidden py-2 space-y-1 pl-4 text-sm">
                    <li>
                        <a href="{{ route('panel') }}#user-profile" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Wasifu Wangu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#change-password" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            Badili Nenosiri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.users.index') }}" class="flex items-center px-2 py-1.5 rounded-md text-emerald-100 hover:bg-emerald-800/60 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Usimamizi wa Watumiaji
                        </a>
                    </li>
                    <li class="border-t pt-2 mt-2">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center p-2 w-full text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4"></path>
                                </svg>
                                Ondoka
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
    </div>
</aside>

<script>
function exportFormData() {
    window.location.href = '{{ route("panel.export.excel") }}';
}

async function sendNotification() {
    try {
        const res = await fetch('{{ route('panel.notification.send') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });
        const data = await res.json();
        if (data && data.success) {
            alert(data.message || 'Arifa imetumwa kikamilifu!');
        } else {
            alert((data && data.message) || 'Imeshindikana kutuma arifa.');
        }
    } catch (e) {
        alert('Hitilafu imetokea wakati wa kutuma arifa.');
    }
}
</script>