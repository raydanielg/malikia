@extends('panel.layouts.app')

@section('content')
    <!-- Header Section -->
    <header class="mb-8 bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-600 rounded-2xl shadow-xl overflow-hidden">
        <div class="relative">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-black bg-opacity-10"></div>
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

            <div class="relative px-8 py-12">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <!-- Left Side - Main Content -->
                    <div class="flex-1">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mr-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-4xl font-bold text-white mb-2">Paneli ya Msimamizi</h1>
                                <p class="text-pink-100 text-lg">Malkia Konnect - Usimamizi wa Fomu na Data</p>
                            </div>
                        </div>

                        <!-- Quick Stats in Header -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-white">{{ $stats['total'] ?? 0 }}</div>
                                <div class="text-pink-100 text-sm">Jumla ya Fomu</div>
                            </div>
                            <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-white">{{ $stats['pending'] ?? 0 }}</div>
                                <div class="text-pink-100 text-sm">Zinasubiri</div>
                            </div>
                            <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-white">{{ $stats['completed'] ?? 0 }}</div>
                                <div class="text-pink-100 text-sm">Zimekamilika</div>
                            </div>
                            <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-white">{{ $stats['unique_users'] ?? 0 }}</div>
                                <div class="text-pink-100 text-sm">Watumiaji</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Actions -->
                    <div class="mt-8 lg:mt-0 lg:ml-8">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button onclick="exportToExcel()" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Pakua Excel
                            </button>

                            <button onclick="refreshData()" class="bg-white bg-opacity-20 text-white border-2 border-white border-opacity-30 px-6 py-3 rounded-lg font-semibold hover:bg-opacity-30 transition-all flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Refresh
                            </button>
                        </div>

                        <!-- Current Date and Time -->
                        <div class="mt-4 text-center lg:text-right">
                            <div class="text-white text-sm opacity-90">
                                <span id="current-date">{{ now()->format('l, F j, Y') }}</span>
                            </div>
                            <div class="text-pink-100 text-xs mt-1">
                                <span id="current-time">{{ now()->format('H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="p-6">
        <div class="mb-8">
            <p class="text-gray-600 mb-6">Karibu katika paneli ya usimamizi wa Malkia Konnect. Hapa unaweza kusimamia fomu, kupitia majibu, na kufuatilia maendeleo ya watumiaji wetu.</p>
        </div>

        <!-- Form Responses Section -->
        <div id="form-responses" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Usimamizi wa Majibu ya Fomu
                    </h3>
                </div>

                @if(App\Models\MotherIntake::count() > 0)
                <div class="p-6">
                    <!-- Status Filter Tabs -->
                    <div class="mb-6">
                        <div class="flex flex-wrap gap-2">
                            <button onclick="filterForms('all')" class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm font-medium">Zote</button>
                            <button onclick="filterForms('pending')" class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg text-sm font-medium hover:bg-yellow-200">Inasubiri</button>
                            <button onclick="filterForms('in_progress')" class="px-4 py-2 bg-blue-100 text-blue-800 rounded-lg text-sm font-medium hover:bg-blue-200">Inaendelea</button>
                            <button onclick="filterForms('completed')" class="px-4 py-2 bg-green-100 text-green-800 rounded-lg text-sm font-medium hover:bg-green-200">Imekamilika</button>
                            <button onclick="filterForms('reviewed')" class="px-4 py-2 bg-purple-100 text-purple-800 rounded-lg text-sm font-medium hover:bg-purple-200">Imepitiwa</button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hali</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jina</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Simu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umri</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hatua</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kipaumbele</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarehe</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vitendo</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="forms-table-body">
                                @foreach($intakes as $intake)
                                <tr class="hover:bg-gray-50 form-row" data-status="{{ $intake->status ?? 'pending' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if(($intake->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif(($intake->status ?? 'pending') == 'in_progress') bg-blue-100 text-blue-800
                                            @elseif(($intake->status ?? 'pending') == 'completed') bg-green-100 text-green-800
                                            @elseif(($intake->status ?? 'pending') == 'reviewed') bg-purple-100 text-purple-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            @switch($intake->status ?? 'pending')
                                                @case('pending')
                                                    Inasubiri
                                                    @break
                                                @case('in_progress')
                                                    Inaendelea
                                                    @break
                                                @case('completed')
                                                    Imekamilika
                                                    @break
                                                @case('reviewed')
                                                    Imepitiwa
                                                    @break
                                                @default
                                                    {{ ucfirst($intake->status ?? 'pending') }}
                                            @endswitch
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $intake->full_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $intake->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $intake->age }} miaka</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($intake->pregnancy_stage == 'Trimester ya Kwanza') bg-blue-100 text-blue-800
                                            @elseif($intake->pregnancy_stage == 'Trimester ya Pili') bg-green-100 text-green-800
                                            @elseif($intake->pregnancy_stage == 'Trimester ya Tatu') bg-purple-100 text-purple-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ $intake->pregnancy_stage ?? 'Haijafahamika' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if(($intake->priority ?? 'medium') == 'low') bg-green-100 text-green-800
                                            @elseif(($intake->priority ?? 'medium') == 'medium') bg-yellow-100 text-yellow-800
                                            @elseif(($intake->priority ?? 'medium') == 'high') bg-orange-100 text-orange-800
                                            @elseif(($intake->priority ?? 'medium') == 'urgent') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            @switch($intake->priority ?? 'medium')
                                                @case('low')
                                                    Chini
                                                    @break
                                                @case('medium')
                                                    Kati
                                                    @break
                                                @case('high')
                                                    Juu
                                                    @break
                                                @case('urgent')
                                                    Haraka
                                                    @break
                                                @default
                                                    {{ ucfirst($intake->priority ?? 'medium') }}
                                            @endswitch
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $intake->created_at->format('M d, Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            @if(($intake->status ?? 'pending') !== 'completed')
                                            <button onclick="markAsCompleted({{ $intake->id }})" class="text-green-600 hover:text-green-900 p-1 rounded" title="Weka kama Imekamilika">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            @endif

                                            @if(($intake->status ?? 'pending') !== 'reviewed')
                                            <button onclick="markAsReviewed({{ $intake->id }})" class="text-purple-600 hover:text-purple-900 p-1 rounded" title="Weka kama Imepitiwa">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            @endif

                                            <button onclick="viewDetails({{ $intake->id }})" class="text-blue-600 hover:text-blue-900 p-1 rounded" title="Angalia Maelezo">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-sm text-gray-500">Jumla ya majibu: {{ $stats['total'] ?? 0 }}</p>
                        <div class="flex space-x-2">
                            <button onclick="exportToExcel()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Excel
                            </button>
                            <button onclick="exportToCSV()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                CSV
                            </button>
                        </div>
                    </div>
                </div>
                @else
                <div class="p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Hakuna majibu ya fomu bado</h3>
                    <p class="mt-1 text-sm text-gray-500">Majibu ya fomu yataonekana hapa yanapopokelewa.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Form Customization Section -->
        <div id="form-customization" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                        Customize Fomu za Wajawazito
                    </h3>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Required Fields -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Mashamba Yanayohitajika</h4>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" checked disabled class="mr-2">
                                    <span class="text-sm text-gray-600">Jina Kamili</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked disabled class="mr-2">
                                    <span class="text-sm text-gray-600">Namba ya Simu</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked disabled class="mr-2">
                                    <span class="text-sm text-gray-600">Barua Pepe</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" checked disabled class="mr-2">
                                    <span class="text-sm text-gray-600">Umri</span>
                                </div>
                            </div>
                        </div>

                        <!-- Optional Fields -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Mashamba ya Hiari</h4>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="due_date_field" class="mr-2">
                                    <span class="text-sm text-gray-600">Tarehe ya Kujifungua</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="location_field" class="mr-2">
                                    <span class="text-sm text-gray-600">Mahali</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="previous_pregnancies_field" class="mr-2">
                                    <span class="text-sm text-gray-600">Mimba za Awali</span>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="custom_field" class="mr-2">
                                    <span class="text-sm text-gray-600">Ongeza Shamba Maalum</span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Settings -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Mipangilio ya Fomu</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lugha</label>
                                    <select class="w-full text-sm border-gray-300 rounded-md">
                                        <option>Kiswahili</option>
                                        <option>English</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Uthibitishaji wa Barua Pepe</label>
                                    <select class="w-full text-sm border-gray-300 rounded-md">
                                        <option>Haihitajiki</option>
                                        <option>Inahitajika</option>
                                    </select>
                                </div>
                                <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm mt-3">
                                    Hifadhi Mipangilio
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div id="form-analytics" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Takwimu na Ripoti
                    </h3>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-blue-600">{{ App\Models\MotherIntake::count() }}</div>
                            <div class="text-sm text-blue-800">Jumla ya Majibu</div>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-green-600">{{ App\Models\MotherIntake::distinct('phone')->count() }}</div>
                            <div class="text-sm text-green-800">Watumiaji Wakipekee</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-purple-600">{{ App\Models\MotherIntake::where('status', 'completed')->count() }}</div>
                            <div class="text-sm text-purple-800">Zimekamilika</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-pink-600">{{ App\Models\MotherIntake::where('status', 'pending')->count() }}</div>
                            <div class="text-sm text-pink-800">Zinasubiri</div>
                        </div>
                    </div>

                    <!-- Status Distribution -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-4">Mgawanyo wa Hali</h4>
                            <div class="space-y-3">
                                @php
                                    $statuses = $statusCounts ?? [];
                                    $total = array_sum($statuses);
                                @endphp

                                @foreach($statuses as $status => $count)
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $status)) }}</span>
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $total > 0 ? ($count / $total) * 100 : 0 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-800">{{ $count }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Priority Distribution -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-4">Mgawanyo wa Kipaumbele</h4>
                            <div class="space-y-3">
                                @php
                                    $priorities = $priorityCounts ?? [];
                                    $total = array_sum($priorities);
                                @endphp

                                @foreach($priorities as $priority => $count)
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">{{ ucfirst($priority) }}</span>
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-red-500 h-2 rounded-full" style="width: {{ $total > 0 ? ($count / $total) * 100 : 0 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-800">{{ $count }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-4">Shughuli za Hivi Karibuni</h4>
                        <div class="space-y-3">
                            @foreach($recentIntakes as $intake)
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-sm">{{ substr($intake->full_name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">{{ $intake->full_name }}</p>
                                        <p class="text-xs text-gray-500">{{ $intake->phone }} • {{ $intake->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="px-2 py-1 text-xs rounded-full
                                        @if($intake->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($intake->status == 'in_progress') bg-blue-100 text-blue-800
                                        @elseif($intake->status == 'completed') bg-green-100 text-green-800
                                        @elseif($intake->status == 'reviewed') bg-purple-100 text-purple-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ $intake->status == 'pending' ? 'Inasubiri' : ($intake->status == 'in_progress' ? 'Inaendelea' : ($intake->status == 'completed' ? 'Imekamilika' : ($intake->status == 'reviewed' ? 'Imepitiwa' : ucfirst($intake->status ?? 'pending')))) }}
                                    </span>
                                    @if($intake->priority == 'urgent')
                                    <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Haraka</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Profile Section -->
        <div id="user-profile" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Wasifu Wangu
                    </h3>
                </div>

                <div class="p-6">
                    <div class="flex flex-col lg:flex-row gap-8">
                        <!-- Profile Information -->
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full flex items-center justify-center">
                                        <span class="text-2xl font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h4>
                                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                                        @if(Auth::user()->phone)
                                        <p class="text-gray-600">{{ Auth::user()->phone }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Jina Kamili</label>
                                        <p class="text-gray-900 bg-white px-3 py-2 rounded border">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Barua Pepe</label>
                                        <p class="text-gray-900 bg-white px-3 py-2 rounded border">{{ Auth::user()->email }}</p>
                                    </div>
                                    @if(Auth::user()->phone)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Namba ya Simu</label>
                                        <p class="text-gray-900 bg-white px-3 py-2 rounded border">{{ Auth::user()->phone }}</p>
                                    </div>
                                    @endif
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tarehe ya Kujiunga</label>
                                        <p class="text-gray-900 bg-white px-3 py-2 rounded border">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Stats -->
                        <div class="lg:w-80">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h4 class="font-semibold text-gray-800 mb-4">Takwimu za Wasifu</h4>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Fomu Zilizoundwa</span>
                                        <span class="font-bold text-blue-600">{{ Auth::user()->motherIntakes()->count() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Fomu Zilizopitiwa</span>
                                        <span class="font-bold text-green-600">{{ Auth::user()->reviewedIntakes()->count() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Mwanachama Tangu</span>
                                        <span class="font-bold text-purple-600">{{ Auth::user()->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">Hali ya Akaunti</span>
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password Section -->
        <div id="change-password" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                        Badili Nenosiri
                    </h3>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('password.update') }}" class="max-w-md">
                        @csrf
                        @method('put')

                        <div class="space-y-4">
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nenosiri la Sasa
                                </label>
                                <input type="password" id="current_password" name="current_password"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       required>
                                @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nenosiri Jipya
                                </label>
                                <input type="password" id="password" name="password"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       required>
                                @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                                    Thibitisha Nenosiri Jipya
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       required>
                                @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Badili Nenosiri
                                </button>

                                @if (session('status') === 'password-updated')
                                <p class="text-sm text-green-600 font-medium">✓ Nenosiri limebadilishwa kikamilifu!</p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- User Management Section -->
        <div id="user-management" class="mb-12">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        Usimamizi wa Watumiaji
                    </h3>
                </div>

                <div class="p-6">
                    <!-- User Statistics -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-blue-600">{{ App\Models\User::count() }}</div>
                            <div class="text-sm text-blue-800">Jumla ya Watumiaji</div>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-green-600">{{ App\Models\User::where('email_verified_at', '!=', null)->count() }}</div>
                            <div class="text-sm text-green-800">Waliothibitisha</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-purple-600">{{ App\Models\User::whereDate('created_at', today())->count() }}</div>
                            <div class="text-sm text-purple-800">Waliojiunga Leo</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-4">
                            <div class="text-2xl font-bold text-pink-600">{{ App\Models\User::where('created_at', '>=', now()->subDays(7))->count() }}</div>
                            <div class="text-sm text-pink-800">Wiki Hii</div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mtumiaji</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maelezo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hali</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarehe ya Kujiunga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vitendo</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(App\Models\User::latest()->get() as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full flex items-center justify-center">
                                                <span class="text-white font-bold text-sm">{{ substr($user->name, 0, 1) }}</span>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($user->phone)
                                                <div>{{ $user->phone }}</div>
                                            @endif
                                            <div class="text-gray-500">{{ $user->motherIntakes()->count() }} fomu</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->email_verified_at)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Imethibitishwa
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Haijathibitishwa
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button onclick="viewUserDetails({{ $user->id }})" class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            @if($user->id !== Auth::id())
                                            <button onclick="toggleUserStatus({{ $user->id }})" class="text-yellow-600 hover:text-yellow-900">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                                </svg>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function filterForms(status) {
    const rows = document.querySelectorAll('.form-row');
    const buttons = document.querySelectorAll('button[onclick*="filterForms"]');

    // Update button styles
    buttons.forEach(btn => {
        btn.className = btn.className.replace(/bg-\w+-\d+ text-\w+-\d+/g, 'bg-gray-100 text-gray-600');
    });

    if (status === 'all') {
        event.target.className = event.target.className.replace(/bg-gray-100 text-gray-600/g, 'bg-blue-500 text-white');
        rows.forEach(row => row.style.display = 'table-row');
    } else {
        event.target.className = event.target.className.replace(/bg-gray-100 text-gray-600/g, 'bg-blue-500 text-white');
        rows.forEach(row => {
            if (row.dataset.status === status) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
}

function markAsCompleted(intakeId) {
    if (confirm('Una uhakika unataka kuweka fomu hii kama imekamilika?')) {
        fetch(`/panel/intake/${intakeId}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Kosa: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Kosa la kifni: ' + error.message);
        });
    }
}

function markAsReviewed(intakeId) {
    if (confirm('Una uhakika unataka kuweka fomu hii kama imepitiwa?')) {
        fetch(`/panel/intake/${intakeId}/review`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Kosa: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Kosa la kifni: ' + error.message);
        });
    }
}

function viewDetails(intakeId) {
    // Open modal or navigate to detail page
    window.location.href = `/panel/intake/${intakeId}`;
}

function viewUserDetails(userId) {
    alert('Kipengele cha kuangalia maelezo ya mtumiaji kitapatikana hivi karibuni!');
}

function toggleUserStatus(userId) {
    if (confirm('Una uhakika unataka kubadili hali ya mtumiaji huyu?')) {
        fetch(`/panel/user/${userId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Kosa: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Kosa la kifni: ' + error.message);
        });
    }
}

function sendNotification() {
    const message = prompt('Ingiza ujumbe wa arifa:');
    if (message && message.trim()) {
        fetch('/panel/send-notification', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                message: message,
                type: 'general'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Arifa imetumwa kikamilifu!');
            } else {
                alert('Kosa: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Kosa la kifni: ' + error.message);
        });
    }
}

function checkSystemHealth() {
    fetch('/panel/system-health', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'healthy') {
            alert('Mfumo unafanya kazi vizuri! ');
        } else {
            alert('Mfumo una matatizo: ' + data.issues.join(', '));
        }
    })
    .catch(error => {
        console.error('Health check error:', error);
        alert('Imeshindwa kupima afya ya mfumo');
    });
}

function showQuickActions() {
    const actions = [
        { name: 'Backup Database', icon: '', action: 'backupDatabase' },
        { name: 'Clear Cache', icon: '', action: 'clearCache' },
        { name: 'System Health', icon: '', action: 'checkSystemHealth' },
        { name: 'Send Test Notification', icon: '', action: 'sendTestNotification' },
        { name: 'Export All Data', icon: '', action: 'exportAllData' }
    ];

    const actionList = actions.map(action =>
        `<button onclick="${action.action}()" class="w-full text-left p-3 hover:bg-gray-100 rounded-lg flex items-center">
            <span class="text-lg mr-3">${action.icon}</span>
            <span>${action.name}</span>
        </button>`
    ).join('');

    // Create modal
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
    modal.innerHTML = `
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Haraka Hatua</h3>
                <button onclick="this.closest('.fixed').remove()" class="text-gray-500 hover:text-gray-700">✕</button>
            </div>
            <div class="space-y-2">
                ${actionList}
            </div>
        </div>
    `;

    document.body.appendChild(modal);
}

function backupDatabase() {
    if (confirm('Una uhakika unataka kufanya backup ya database?')) {
        window.location.href = '/panel/backup-database';
    }
}

function clearCache() {
    if (confirm('Una uhakika unataka kusafisha cache?')) {
        fetch('/panel/clear-cache', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cache imesafishwa kikamilifu!');
                location.reload();
            } else {
                alert('Kosa: ' + data.message);
            }
        });
    }
}

function sendTestNotification() {
    alert('Kipengele cha kutuma arifa ya majaribio kitapatikana hivi karibuni!');
}

function exportAllData() {
    alert('Kipengele cha kupakua data zote kitapatikana hivi karibuni!');
}

function validatePasswordChange() {
    const currentPassword = document.getElementById('current_password').value;
    const newPassword = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;

    if (!currentPassword) {
        alert('Tafadhali ingiza nenosiri la sasa');
        return false;
    }

    if (newPassword.length < 8) {
        alert('Nenosiri jipya lazima liwe na angalau herufi 8');
        return false;
    }

    if (newPassword !== confirmPassword) {
        alert('Nenosiri jipya na uthibitisho havifanani');
        return false;
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    const passwordForm = document.querySelector('form[action*="password.update"]');
    if (passwordForm) {
        passwordForm.addEventListener('submit', function(e) {
            if (!validatePasswordChange()) {
                e.preventDefault();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
            e.preventDefault();
            refreshData();
        }

        if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
            e.preventDefault();
            exportToExcel();
        }

        if ((e.ctrlKey || e.metaKey) && e.key === 'q') {
            e.preventDefault();
            showQuickActions();
        }
    });
});

function exportToExcel() {
    const link = document.createElement('a');
    link.href = "{{ route('panel.export.excel') }}";
    link.download = 'form-responses-' + new Date().toISOString().split('T')[0] + '.xlsx';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function refreshData() {
    // Show loading indicator
    const refreshBtn = event.target.closest('button');
    const originalText = refreshBtn.innerHTML;
    refreshBtn.innerHTML = '<svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Refreshing...';
    refreshBtn.disabled = true;

    // Refresh the page
    setTimeout(() => {
        location.reload();
    }, 1000);
}

function exportToCSV() {
    const link = document.createElement('a');
    link.href = "{{ route('panel.export.csv') }}";
    link.download = 'form-responses-' + new Date().toISOString().split('T')[0] + '.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Auto-refresh data every 30 seconds
setInterval(function() {
    if (window.location.hash === '#form-responses' || window.location.hash === '') {
        // Only refresh if we're on the form responses section
        fetch(window.location.href, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            const newTableBody = newDoc.querySelector('#forms-table-body');
            const currentTableBody = document.querySelector('#forms-table-body');

            if (newTableBody && currentTableBody) {
                currentTableBody.innerHTML = newTableBody.innerHTML;
            }
        })
        .catch(error => console.log('Auto-refresh error:', error));
    }
}, 30000);

// Update clock every second
function updateClock() {
    const now = new Date();
    const timeElement = document.getElementById('current-time');
    const dateElement = document.getElementById('current-date');

    if (timeElement) {
        timeElement.textContent = now.toLocaleTimeString('sw-TZ');
    }

    if (dateElement) {
        dateElement.textContent = now.toLocaleDateString('sw-TZ', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }
}

function refreshData() {
    // Show loading indicator
    const refreshBtn = event.target.closest('button');
    const originalText = refreshBtn.innerHTML;
    refreshBtn.innerHTML = '<svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Refreshing...';
    refreshBtn.disabled = true;

    // Refresh the page
    setTimeout(() => {
        location.reload();
    }, 1000);
}

// Initialize clock
setInterval(updateClock, 1000);
updateClock();
</script>