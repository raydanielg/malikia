<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gradient-to-b from-pink-50 to-purple-50 border-r border-pink-200" aria-label="Sidenav">
    <div class="overflow-y-auto py-5 px-4 h-full bg-white/80 backdrop-blur-sm">
        <!-- Logo Section -->
        <div class="mb-8">
            <a href="{{ route('panel') }}" class="flex items-center pl-2.5 mb-5">
                <img src="{{ asset('logo.jpg') }}" class="h-8 mr-3 sm:h-10 rounded-full shadow-lg" alt="Malkia Konnect Logo" />
                <div>
                    <span class="self-center text-xl font-bold text-gray-800">Malkia Konnect</span>
                    <p class="text-xs text-gray-500">Paneli ya Msimamizi</p>
                </div>
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="mb-6 space-y-3">
            <div class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-lg p-3 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-90">Fomu Zilizopokelewa</p>
                        <p class="text-2xl font-bold">{{ App\Models\MotherIntake::count() }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 rounded-lg p-3 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-90">Wajawazito Waliojisajili</p>
                        <p class="text-2xl font-bold">{{ App\Models\MotherIntake::distinct('phone')->count() }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg p-3 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-90">Zinasubiri Mapitio</p>
                        <p class="text-2xl font-bold">{{ App\Models\MotherIntake::where('status', 'pending')->count() }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg p-3 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm opacity-90">Zimekamilika</p>
                        <p class="text-2xl font-bold">{{ App\Models\MotherIntake::where('status', 'completed')->count() }}</p>
                    </div>
                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('panel') }}" class="flex items-center p-3 text-base font-medium text-gray-900 rounded-xl bg-white shadow-sm hover:shadow-md transition-all duration-200 hover:bg-pink-50 group">
                    <div class="p-2 bg-pink-100 rounded-lg group-hover:bg-pink-200 transition-colors">
                        <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <!-- Form Management -->
            <li>
                <button type="button" class="flex items-center justify-between p-3 w-full text-base font-medium text-gray-900 rounded-xl bg-white shadow-sm hover:shadow-md transition-all duration-200 hover:bg-purple-50 group" aria-controls="dropdown-forms" data-collapse-toggle="dropdown-forms">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="ml-3">Usimamizi wa Fomu</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-forms" class="hidden py-2 space-y-2 pl-4">
                    <li>
                        <a href="{{ route('panel.intakes.index') }}" class="flex items-center p-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Majibu ya Fomu
                            @if(App\Models\MotherIntake::count() > 0)
                                <span class="ml-auto bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ App\Models\MotherIntake::count() }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#form-analytics" class="flex items-center p-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Takwimu na Ripoti
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Recent Form Submissions -->
            @if(App\Models\MotherIntake::count() > 0)
            <li>
                <div class="p-3 bg-white rounded-xl shadow-sm">
                    <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Majibu ya Hivi Karibuni
                    </h4>
                    <div class="space-y-2 max-h-40 overflow-y-auto">
                        @foreach(App\Models\MotherIntake::latest()->take(3)->get() as $intake)
                        <div class="text-xs bg-gray-50 rounded-lg p-2 hover:bg-gray-100 transition-colors">
                            <div class="font-medium text-gray-800">{{ Str::limit($intake->full_name, 15) }}</div>
                            <div class="text-gray-500">{{ $intake->phone }}</div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400">{{ $intake->created_at->diffForHumans() }}</span>
                                <span class="px-1 py-0.5 text-xs rounded-full
                                    @if($intake->status == 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($intake->status == 'in_progress') bg-blue-100 text-blue-700
                                    @elseif($intake->status == 'completed') bg-green-100 text-green-700
                                    @elseif($intake->status == 'reviewed') bg-purple-100 text-purple-700
                                    @else bg-gray-100 text-gray-700
                                    @endif">
                                    {{ $intake->status == 'pending' ? 'Inasubiri' : ($intake->status == 'in_progress' ? 'Inaendelea' : ($intake->status == 'completed' ? 'Imekamilika' : ($intake->status == 'reviewed' ? 'Imepitiwa' : ucfirst($intake->status ?? 'pending')))) }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('panel') }}#form-responses" class="text-xs text-blue-600 hover:text-blue-800 mt-2 inline-block">
                        Angalia zote →
                    </a>
                </div>
            </li>
            @endif

            <!-- Quick Actions -->
            <li>
                <div class="p-3 bg-white rounded-xl shadow-sm">
                    <h4 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Haraka Hatua
                    </h4>
                    <div class="space-y-2">
                        <button onclick="exportFormData()" class="w-full text-left text-xs bg-blue-50 text-blue-700 rounded-lg p-2 hover:bg-blue-100 transition-colors">
                            <div class="font-medium">Export Data</div>
                            <div class="text-blue-500">Pakua ripoti ya Excel</div>
                        </button>
                        <button onclick="sendNotification()" class="w-full text-left text-xs bg-green-50 text-green-700 rounded-lg p-2 hover:bg-green-100 transition-colors">
                            <div class="font-medium">Tuma Arifa</div>
                            <div class="text-green-500">Watumiaji wote</div>
                        </button>
                    </div>
                </div>
            </li>
        </ul>

            <!-- User Profile & Settings -->
            <li>
                <button type="button" class="flex items-center justify-between p-3 w-full text-base font-medium text-gray-900 rounded-xl bg-white shadow-sm hover:shadow-md transition-all duration-200 hover:bg-blue-50 group" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="ml-3">{{ Auth::user()->name }}</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-user" class="hidden py-2 space-y-2 pl-4">
                    <li>
                        <a href="{{ route('panel') }}#user-profile" class="flex items-center p-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Wasifu Wangu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#change-password" class="flex items-center p-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            Badili Nenosiri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel') }}#user-management" class="flex items-center p-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    window.location.href = '{{ route("panel") }}#export-data';
}

function sendNotification() {
    alert('Kipengele cha kutuma arifa kitapatikana hivi karibuni!');
}
</script>