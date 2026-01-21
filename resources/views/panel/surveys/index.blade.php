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
                            <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center justify-center gap-2">
                                <a href="{{ route('panel.survey.details', $survey) }}" class="inline-flex items-center justify-center px-3 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition font-medium text-xs shadow-sm hover:shadow w-full sm:w-auto">
                                    View
                                </a>
                                <button onclick="window.open('{{ route('panel.survey.details', $survey) }}', '_blank')" class="inline-flex items-center justify-center px-3 py-2 rounded-lg bg-white text-gray-700 hover:bg-gray-50 transition font-medium text-xs border border-gray-200 shadow-sm hover:shadow w-full sm:w-auto">
                                    Open
                                </button>
                                <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta survey response hii?');" class="w-full sm:w-auto">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition font-medium text-xs shadow-sm hover:shadow w-full sm:w-auto">
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
