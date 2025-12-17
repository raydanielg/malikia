@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="bg-gradient-to-r from-rose-500 via-pink-500 to-purple-600 rounded-2xl shadow-xl p-6 mb-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center mb-4 lg:mb-0">
                <div class="bg-white bg-opacity-20 rounded-2xl p-4 mr-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white mb-1">Survey Responses</h1>
                    <p class="text-pink-100">Dodoso la Taulo za Kike - Majibu yote</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('panel.surveys.export.excel') }}" class="flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-green-600 font-semibold hover:bg-green-50 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Excel
                </a>
                <a href="{{ route('panel.surveys.export.csv') }}" class="flex items-center gap-2 px-5 py-3 rounded-xl bg-white bg-opacity-20 text-white border-2 border-white border-opacity-30 font-semibold hover:bg-opacity-30 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    CSV
                </a>
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
    <div class="bg-white rounded-lg shadow border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarehe</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Umri</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Flow</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Brand</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bei</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jaribu Mpya?</th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($surveys as $survey)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-900">#{{ $survey->id }}</td>
                    <td class="px-4 py-3 text-sm text-gray-600">{{ $survey->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                            {{ $survey->age_group_label }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs bg-rose-100 text-rose-800">
                            {{ $survey->flow_level_label }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $survey->current_brand }}</td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                            {{ $survey->price_range_label }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if($survey->try_new_brand === 'yes')
                            <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">✓ Ndiyo</span>
                        @elseif($survey->try_new_brand === 'maybe')
                            <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">? Labda</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-800">✗ Hapana</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('panel.survey.details', $survey) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                👁️ Ona
                            </a>
                            <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    🗑️ Futa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                        Hakuna majibu ya survey bado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $surveys->links() }}
    </div>
</div>
@endsection
