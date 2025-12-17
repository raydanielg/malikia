@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="bg-gradient-to-r from-rose-500 via-pink-500 to-purple-600 rounded-2xl shadow-2xl p-8 mb-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.4&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-start mb-6 lg:mb-0">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-4 mr-4 shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <h1 class="text-4xl font-extrabold text-white">Survey Responses</h1>
                        <span class="px-3 py-1 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-white text-sm font-semibold">
                            {{ $stats['total'] }} Total
                        </span>
                    </div>
                    <p class="text-pink-100 text-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Dodoso la Taulo za Kike - Majibu yote
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <button onclick="window.print()" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-gray-800 font-semibold hover:bg-gray-50 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print
                </button>
                <a href="{{ route('panel.surveys.export.excel') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-green-700 font-semibold hover:bg-green-50 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>
                <a href="{{ route('panel.surveys.export.csv') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-gray-800 font-semibold hover:bg-gray-50 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    Export CSV
                </a>
                <button onclick="location.reload()" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-white text-gray-800 font-semibold hover:bg-gray-50 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-5 text-white hover:shadow-xl transition-all hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm opacity-90 mb-1">Jumla</div>
                    <div class="text-3xl font-bold">{{ $stats['total'] }}</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg p-5 text-white hover:shadow-xl transition-all hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm opacity-90 mb-1">Leo</div>
                    <div class="text-3xl font-bold">{{ $stats['today'] }}</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl shadow-lg p-5 text-white hover:shadow-xl transition-all hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm opacity-90 mb-1">Wiki Hii</div>
                    <div class="text-3xl font-bold">{{ $stats['this_week'] }}</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-rose-500 to-pink-600 rounded-xl shadow-lg p-5 text-white hover:shadow-xl transition-all hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm opacity-90 mb-1">Mwezi Huu</div>
                    <div class="text-3xl font-bold">{{ $stats['this_month'] }}</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('panel.surveys.index') }}" class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 mb-6">
        <div class="flex items-center mb-4">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-800">Vichujio (Filters)</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Tafuta Brand
                </label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tafuta brand..." class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all" />
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Umri
                </label>
                <select name="age_group" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                    <option value="">Zote</option>
                    <option value="below_18" @selected(request('age_group')==='below_18')>Chini ya 18</option>
                    <option value="18_24" @selected(request('age_group')==='18_24')>18–24</option>
                    <option value="25_34" @selected(request('age_group')==='25_34')>25–34</option>
                    <option value="35_44" @selected(request('age_group')==='35_44')>35–44</option>
                    <option value="45_plus" @selected(request('age_group')==='45_plus')>45+</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Kiasi cha Damu
                </label>
                <select name="flow_level" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-rose-500 focus:ring-2 focus:ring-rose-200 transition-all">
                    <option value="">Zote</option>
                    <option value="light" @selected(request('flow_level')==='light')>Kidogo</option>
                    <option value="medium" @selected(request('flow_level')==='medium')>Cha kati</option>
                    <option value="heavy" @selected(request('flow_level')==='heavy')>Kingi</option>
                    <option value="very_heavy" @selected(request('flow_level')==='very_heavy')>Kingi sana</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Bei
                </label>
                <select name="price_range" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all">
                    <option value="">Zote</option>
                    <option value="under_2000" @selected(request('price_range')==='under_2000')>< 2,000</option>
                    <option value="2000_4000" @selected(request('price_range')==='2000_4000')>2,000–4,000</option>
                    <option value="4000_6000" @selected(request('price_range')==='4000_6000')>4,000–6,000</option>
                    <option value="over_6000" @selected(request('price_range')==='over_6000')>> 6,000</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700 mb-2">&nbsp;</label>
                <button class="w-full px-6 py-2 rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Tafuta
                </button>
            </div>
        </div>
        <div class="mt-4 flex items-center justify-between text-sm">
            <div class="text-gray-600 flex items-center">
                <svg class="w-4 h-4 mr-1 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="font-semibold">{{ $surveys->total() }}</span> matokeo | Ukurasa <span class="font-semibold">{{ $surveys->currentPage() }}</span> / {{ $surveys->lastPage() }}
            </div>
        </div>
    </form>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                ID
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Tarehe
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Umri
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                Flow
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Brand
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Bei
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Jaribu Mpya?
                            </div>
                        </th>
                        <th class="px-4 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($surveys as $survey)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-bold text-purple-600">#{{ $survey->id }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $survey->created_at->format('d/m/Y H:i') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $survey->age_group_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ $survey->flow_level_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            <div class="text-sm font-semibold text-gray-900">{{ $survey->current_brand }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $survey->price_range_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($survey->try_new_brand === 'yes')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Ndiyo
                                </span>
                            @elseif($survey->try_new_brand === 'maybe')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Labda
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Hapana
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center">
                            <div class="flex flex-wrap items-center justify-center gap-2">
                                <a href="{{ route('panel.survey.details', $survey) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition font-medium text-xs border border-blue-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </a>
                                <button onclick="window.open('{{ route('panel.survey.details', $survey) }}', '_blank')" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-50 text-gray-700 hover:bg-gray-100 transition font-medium text-xs border border-gray-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                    </svg>
                                    Print
                                </button>
                                <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta survey response hii?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 transition font-medium text-xs border border-red-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500 text-lg font-medium">Hakuna majibu ya survey bado</p>
                                <p class="text-gray-400 text-sm mt-2">Survey responses zitaonekana hapa baada ya watu kujaza dodoso</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $surveys->links() }}
    </div>
</div>
@endsection
