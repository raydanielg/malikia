@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Survey Responses - Taulo za Kike</h1>
            <p class="text-sm text-gray-500">Orodha ya majibu yote ya dodoso la taulo za kike.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('panel.surveys.export.excel') }}" class="px-3 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">
                📊 Pakua Excel
            </a>
            <a href="{{ route('panel.surveys.export.csv') }}" class="px-3 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                📄 Pakua CSV
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow border p-4">
            <div class="text-sm text-gray-500">Jumla</div>
            <div class="text-2xl font-bold text-purple-600">{{ $stats['total'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <div class="text-sm text-gray-500">Leo</div>
            <div class="text-2xl font-bold text-green-600">{{ $stats['today'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <div class="text-sm text-gray-500">Wiki Hii</div>
            <div class="text-2xl font-bold text-blue-600">{{ $stats['this_week'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <div class="text-sm text-gray-500">Mwezi Huu</div>
            <div class="text-2xl font-bold text-rose-600">{{ $stats['this_month'] }}</div>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('panel.surveys.index') }}" class="bg-white rounded-lg shadow p-4 border mb-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            <div>
                <label class="text-sm text-gray-600">Tafuta Brand</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tafuta brand..." class="mt-1 w-full border rounded-md px-3 py-2" />
            </div>
            <div>
                <label class="text-sm text-gray-600">Umri</label>
                <select name="age_group" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Zote</option>
                    <option value="below_18" @selected(request('age_group')==='below_18')>Chini ya 18</option>
                    <option value="18_24" @selected(request('age_group')==='18_24')>18–24</option>
                    <option value="25_34" @selected(request('age_group')==='25_34')>25–34</option>
                    <option value="35_44" @selected(request('age_group')==='35_44')>35–44</option>
                    <option value="45_plus" @selected(request('age_group')==='45_plus')>45+</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Kiasi cha Damu</label>
                <select name="flow_level" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Zote</option>
                    <option value="light" @selected(request('flow_level')==='light')>Kidogo</option>
                    <option value="medium" @selected(request('flow_level')==='medium')>Cha kati</option>
                    <option value="heavy" @selected(request('flow_level')==='heavy')>Kingi</option>
                    <option value="very_heavy" @selected(request('flow_level')==='very_heavy')>Kingi sana</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Bei</label>
                <select name="price_range" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Zote</option>
                    <option value="under_2000" @selected(request('price_range')==='under_2000')>< 2,000</option>
                    <option value="2000_4000" @selected(request('price_range')==='2000_4000')>2,000–4,000</option>
                    <option value="4000_6000" @selected(request('price_range')==='4000_6000')>4,000–6,000</option>
                    <option value="over_6000" @selected(request('price_range')==='over_6000')>> 6,000</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">&nbsp;</label>
                <button class="mt-1 w-full px-4 py-2 rounded-md bg-purple-600 text-white text-sm font-semibold hover:bg-purple-700">
                    🔍 Tafuta
                </button>
            </div>
        </div>
        <div class="mt-3 text-xs text-gray-500">
            Matokeo: {{ $surveys->total() }} | Ukurasa {{ $surveys->currentPage() }} / {{ $surveys->lastPage() }}
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
