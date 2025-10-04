@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Majibu Yote ya Fomu</h1>
            <p class="text-sm text-gray-500">Orodha ya majibu yote, yenye utafutaji, vichujio na kurasa.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('panel.export.excel') }}" class="px-3 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Pakua Excel</a>
            <a href="{{ route('panel.export.csv') }}" class="px-3 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Pakua CSV</a>
        </div>
    </div>

    <form method="GET" action="{{ route('panel.intakes.index') }}" class="bg-white rounded-lg shadow p-4 border mb-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            <div class="md:col-span-2">
                <label class="text-sm text-gray-600">Tafuta (jina/simu/hospitali)</label>
                <input type="text" name="q" value="{{ $q }}" placeholder="tafuta..." class="mt-1 w-full border rounded-md px-3 py-2" />
            </div>
            <div>
                <label class="text-sm text-gray-600">Hali</label>
                <select name="status" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Zote</option>
                    @foreach(['pending'=>'Inasubiri','in_progress'=>'Inaendelea','completed'=>'Imekamilika','reviewed'=>'Imepitiwa'] as $k=>$v)
                        <option value="{{ $k }}" @selected($status===$k)>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Kipaumbele</label>
                <select name="priority" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Vyote</option>
                    @foreach(['low'=>'Low','medium'=>'Medium','high'=>'High','urgent'=>'Urgent'] as $k=>$v)
                        <option value="{{ $k }}" @selected($priority===$k)>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Safari</label>
                <select name="journey_stage" class="mt-1 w-full border rounded-md px-3 py-2">
                    <option value="">Zote</option>
                    @foreach(['pregnant'=>'Pregnant','postpartum'=>'Postpartum','ttc'=>'Trying to conceive'] as $k=>$v)
                        <option value="{{ $k }}" @selected($stage===$k)>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-3 flex items-center justify-between">
            <div class="text-xs text-gray-500">Matokeo: {{ $intakes->total() }} | Ukurasa {{ $intakes->currentPage() }} / {{ $intakes->lastPage() }}</div>
            <div>
                <button class="px-4 py-2 rounded-md bg-purple-600 text-white text-sm font-semibold hover:bg-purple-700">Tafuta</button>
            </div>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jina</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Simu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Safari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wiki/Hospitali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kipaumbele</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarehe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vitendo</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($intakes as $intake)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $intake->full_name }}</td>
                    <td class="px-6 py-4">{{ $intake->phone }}</td>
                    <td class="px-6 py-4 capitalize">{{ $intake->journey_stage ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($intake->journey_stage==='pregnant')
                            {{ $intake->pregnancy_weeks ? ($intake->pregnancy_weeks.' wks') : '-' }} @if($intake->hospital_planned) • {{ $intake->hospital_planned }} @endif
                        @elseif($intake->journey_stage==='postpartum')
                            {{ $intake->baby_weeks_old ? ($intake->baby_weeks_old.' wks') : '-' }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if(($intake->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-800
                            @elseif(($intake->status ?? 'pending') == 'in_progress') bg-blue-100 text-blue-800
                            @elseif(($intake->status ?? 'pending') == 'completed') bg-green-100 text-green-800
                            @elseif(($intake->status ?? 'pending') == 'reviewed') bg-purple-100 text-purple-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst(str_replace('_',' ', $intake->status ?? 'pending')) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 capitalize">{{ $intake->priority ?? 'medium' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ optional($intake->created_at)->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('panel.intake.details', $intake) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">Angalia</a>
                            <form method="POST" action="{{ route('panel.intake.destroy', $intake) }}" onsubmit="return confirm('Una uhakika unataka kufuta rekodi hii? Hatua hii haiwezi kubatilishwa.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">Futa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">Hakuna majibu kupatikana.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4 border-t bg-gray-50">
            {{ $intakes->links() }}
        </div>
    </div>
</div>
@endsection
