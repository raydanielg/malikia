@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="bg-white rounded-xl shadow border border-gray-200 px-6 py-4 mb-6">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-3">
                <h1 class="text-xl font-semibold text-gray-900">Survey Responses</h1>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                    {{ $stats['total'] }} Total
                </span>
                <span class="hidden md:inline text-sm text-gray-500">Dodoso la Taulo za Kike - Majibu yote</span>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button onclick="window.print()" class="px-3 py-2 rounded-lg bg-gray-50 text-gray-700 font-medium hover:bg-gray-100 transition border border-gray-200">Print</button>
                <a href="{{ route('panel.surveys.export.excel') }}" class="px-3 py-2 rounded-lg bg-emerald-50 text-emerald-700 font-medium hover:bg-emerald-100 transition border border-emerald-200">Export Excel</a>
                <a href="{{ route('panel.surveys.export.csv') }}" class="px-3 py-2 rounded-lg bg-gray-50 text-gray-700 font-medium hover:bg-gray-100 transition border border-gray-200">Export CSV</a>
                <button onclick="location.reload()" class="px-3 py-2 rounded-lg bg-gray-50 text-gray-700 font-medium hover:bg-gray-100 transition border border-gray-200">Refresh</button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
            <div class="text-xs text-gray-500">Jumla</div>
            <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $stats['total'] }}</div>
        </div>
        <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
            <div class="text-xs text-gray-500">Leo</div>
            <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $stats['today'] }}</div>
        </div>
        <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
            <div class="text-xs text-gray-500">Wiki Hii</div>
            <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $stats['this_week'] }}</div>
        </div>
        <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
            <div class="text-xs text-gray-500">Mwezi Huu</div>
            <div class="mt-1 text-2xl font-semibold text-gray-900">{{ $stats['this_month'] }}</div>
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
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
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
                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2a2 2 0 01-2 2h-2a2 2 0 01-2-2zm0 0V7a3 3 0 013-3h0a3 3 0 013 3v10"></path>
                    </svg>
                    Onyesha
                </label>
                <select name="per_page" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all">
                    <option value="20" @selected(request('per_page','20')==='20')>20</option>
                    <option value="50" @selected(request('per_page')==='50')>50</option>
                    <option value="100" @selected(request('per_page')==='100')>100</option>
                    <option value="200" @selected(request('per_page')==='200')>200</option>
                    <option value="all" @selected(request('per_page')==='all')>Zote</option>
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
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Tarehe
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Umri
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Flow
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Brand
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Bei
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Jaribu Mpya?
                        </th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($surveys as $survey)
                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100/70 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-bold text-purple-600">#{{ $survey->id }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600">{{ $survey->created_at->format('d/m/Y H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                {{ $survey->age_group_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">
                                {{ $survey->flow_level_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            <div class="text-sm font-semibold text-gray-900">{{ $survey->current_brand }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                {{ $survey->price_range_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($survey->try_new_brand === 'yes')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    Ndiyo
                                </span>
                            @elseif($survey->try_new_brand === 'maybe')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                    Labda
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    Hapana
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center">
                            <div class="flex flex-wrap items-center justify-center gap-2">
                                <a href="{{ route('panel.survey.details', $survey) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition font-medium text-xs">
                                    View
                                </a>
                                <button onclick="window.open('{{ route('panel.survey.details', $survey) }}', '_blank')" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-50 text-gray-700 hover:bg-gray-100 transition font-medium text-xs border border-gray-200">
                                    Open
                                </button>
                                <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta survey response hii?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition font-medium text-xs">
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
