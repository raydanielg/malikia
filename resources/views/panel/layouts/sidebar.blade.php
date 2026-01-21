<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-emerald-800 text-emerald-50 border-r border-emerald-900/40" aria-label="Sidenav">
    <div class="overflow-y-auto py-6 px-4 h-full flex flex-col">
        @php
            $isDashboard = request()->routeIs('panel');
            $isIntakes = request()->routeIs('panel.intakes.*');
            $isSurveys = request()->routeIs('panel.surveys.*');
            $isReports = request()->routeIs('panel.reports*');
            $isUsers = request()->routeIs('panel.users.*');
        @endphp
        <!-- Logo Section -->
        <div class="mb-6">
            <a href="{{ route('panel') }}" class="flex items-center gap-3 px-2.5 mb-5">
                <img src="{{ asset('logo.jpg') }}" class="h-10 w-10 rounded-full ring-2 ring-emerald-200/30" alt="Malkia Konnect Logo" />
                <div>
                    <span class="self-center text-lg font-semibold leading-tight text-white">Malkia Konnect</span>
                    <p class="text-xs text-emerald-100/80">Paneli ya Msimamizi</p>
                </div>
            </a>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-1 text-sm text-emerald-50/90 flex-1">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('panel') }}" class="flex items-center px-3 py-2 rounded-xl font-medium transition-colors group {{ $isDashboard ? 'bg-emerald-600/30 text-white ring-1 ring-white/10' : 'text-emerald-50/90 hover:bg-emerald-700/40' }}">
                    <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40 {{ $isDashboard ? 'bg-white/15' : '' }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 tracking-wide">Dashboard</span>
                </a>
            </li>

            <!-- Form Management -->
            <li>
                <button type="button" class="flex items-center justify-between px-3 py-2 w-full rounded-xl transition-colors group {{ ($isIntakes || $isReports || $isSurveys) ? 'bg-emerald-600/20 text-white ring-1 ring-white/10' : 'text-emerald-50/90 hover:bg-emerald-700/40' }}" aria-controls="dropdown-forms" data-collapse-toggle="dropdown-forms">
                    <div class="flex items-center">
                        <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40 {{ ($isIntakes || $isReports || $isSurveys) ? 'bg-white/15' : '' }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="ml-3">Usimamizi wa Fomu</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 text-emerald-50/80" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-forms" class="hidden py-2 space-y-1 pl-4">
                    <li>
                        <a href="{{ route('panel.intakes.index') }}" class="flex items-center px-2 py-1.5 rounded-lg transition-colors {{ $isIntakes ? 'bg-white/10 text-white' : 'text-emerald-50/90 hover:bg-emerald-700/30' }}">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Majibu ya Fomu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.surveys.index') }}" class="flex items-center px-2 py-1.5 rounded-lg transition-colors {{ $isSurveys ? 'bg-white/10 text-white' : 'text-emerald-50/90 hover:bg-emerald-700/30' }}">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Survey - Taulo za Kike
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.reports') }}" class="flex items-center px-2 py-1.5 rounded-lg transition-colors {{ $isReports ? 'bg-white/10 text-white' : 'text-emerald-50/90 hover:bg-emerald-700/30' }}">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Takwimu na Ripoti
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Surveys -->
            <li>
                <a href="{{ route('panel.surveys.index') }}" class="flex items-center px-3 py-2 rounded-xl transition-colors group {{ $isSurveys ? 'bg-emerald-600/30 text-white ring-1 ring-white/10' : 'text-emerald-50/90 hover:bg-emerald-700/40' }}">
                    <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40 {{ $isSurveys ? 'bg-white/15' : '' }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <span class="ml-3 tracking-wide">Surveys</span>
                </a>
            </li>

            <!-- Reports -->
            <li>
                <a href="{{ route('panel.reports') }}" class="flex items-center px-3 py-2 rounded-xl transition-colors group {{ $isReports ? 'bg-emerald-600/30 text-white ring-1 ring-white/10' : 'text-emerald-50/90 hover:bg-emerald-700/40' }}">
                    <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40 {{ $isReports ? 'bg-white/15' : '' }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 tracking-wide">Reports</span>
                </a>
            </li>

            <!-- Users -->
            <li>
                <a href="{{ route('panel.users.index') }}" class="flex items-center px-3 py-2 rounded-xl transition-colors group {{ $isUsers ? 'bg-emerald-600/30 text-white ring-1 ring-white/10' : 'text-emerald-50/90 hover:bg-emerald-700/40' }}">
                    <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40 {{ $isUsers ? 'bg-white/15' : '' }}">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <span class="ml-3 tracking-wide">Users</span>
                </a>
            </li>

            <!-- Settings -->
            <li>
                <button type="button" class="flex items-center justify-between w-full px-3 py-2 rounded-xl text-emerald-50/90 hover:bg-emerald-700/40 transition-colors group" aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings">
                    <div class="flex items-center">
                        <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="ml-3">Settings</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 text-emerald-50/80" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-settings" class="hidden py-2 space-y-1 pl-4">
                    <li>
                        <a href="{{ route('panel') }}#user-profile" class="flex items-center px-2 py-1.5 rounded-lg text-emerald-50/90 hover:bg-emerald-700/30 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Wasifu Wangu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#change-password" class="flex items-center px-2 py-1.5 rounded-lg text-emerald-50/90 hover:bg-emerald-700/30 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            Badili Nenosiri
                        </a>
                    </li>
                </ul>
            </li>

            <!-- User Profile & Settings -->
            <div class="mt-6 border-t border-white/10 pt-4">
                <button type="button" class="flex items-center justify-between w-full px-3 py-2 rounded-xl text-emerald-50/90 hover:bg-emerald-700/40 transition-colors group" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                    <div class="flex items-center">
                        <div class="p-2 rounded-lg bg-emerald-900/30 text-emerald-50 group-hover:bg-emerald-900/40">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="ml-3 text-sm font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200 text-emerald-50/80" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-user" class="hidden py-2 space-y-1 pl-4 text-sm">
                    <li>
                        <a href="{{ route('panel') }}#user-profile" class="flex items-center px-2 py-1.5 rounded-lg text-emerald-50/90 hover:bg-emerald-700/30 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Wasifu Wangu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#change-password" class="flex items-center px-2 py-1.5 rounded-lg text-emerald-50/90 hover:bg-emerald-700/30 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            Badili Nenosiri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.users.index') }}" class="flex items-center px-2 py-1.5 rounded-lg text-emerald-50/90 hover:bg-emerald-700/30 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-emerald-100/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Usimamizi wa Watumiaji
                        </a>
                    </li>
                    <li class="border-t pt-2 mt-2">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center p-2 w-full text-sm font-medium text-red-100 rounded-lg hover:bg-white/10 transition-colors">
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