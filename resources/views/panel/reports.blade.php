@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Ripoti na Takwimu</h1>
            <p class="text-sm text-gray-500">Chuja kwa tarehe, tazama grafu, pakua CSV/PDF.</p>
        </div>
        <a href="{{ route('panel') }}" class="text-sm text-blue-600 hover:underline">← Rudi Dashboard</a>
    </div>

    <form method="GET" action="{{ route('panel.reports') }}" class="bg-white rounded-lg shadow border p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            <div>
                <label class="text-sm text-gray-600">Kutoka</label>
                <input type="date" name="from" value="{{ $from }}" class="mt-1 w-full border rounded-md px-3 py-2" />
            </div>
            <div>
                <label class="text-sm text-gray-600">Mpaka</label>
                <input type="date" name="to" value="{{ $to }}" class="mt-1 w-full border rounded-md px-3 py-2" />
            </div>
            <div class="md:col-span-2 flex items-end">
                <button class="px-4 py-2 rounded-md bg-purple-600 text-white text-sm font-semibold hover:bg-purple-700">Chuja</button>
            </div>
            <div class="flex items-end justify-end gap-2">
                <a href="{{ route('panel.reports.csv', ['from'=>$from, 'to'=>$to]) }}" class="px-3 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Pakua CSV</a>
                <a href="{{ route('panel.reports.pdf', ['from'=>$from, 'to'=>$to]) }}" class="px-3 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Pakua PDF</a>
            </div>
        </div>
    </form>

    <!-- Summary Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow border p-4 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $total }}</div>
            <div class="text-gray-500 text-sm">Jumla ya Majibu</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $byStatus['completed'] ?? 0 }}</div>
            <div class="text-gray-500 text-sm">Zimekamilika</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ $byStatus['reviewed'] ?? 0 }}</div>
            <div class="text-gray-500 text-sm">Imepitiwa</div>
        </div>
        <div class="bg-white rounded-lg shadow border p-4 text-center">
            <div class="text-2xl font-bold text-gray-900">{{ array_sum($byPriority) }}</div>
            <div class="text-gray-500 text-sm">Kwa Kipaumbele</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow border p-4">
            <h3 class="font-semibold text-gray-800 mb-3">Mtiririko kwa Siku</h3>
            <canvas id="tsChart" height="120"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <h3 class="font-semibold text-gray-800 mb-3">Hali (Pie)</h3>
            <canvas id="statusChart" height="120"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <h3 class="font-semibold text-gray-800 mb-3">Kipaumbele (Pie)</h3>
            <canvas id="priorityChart" height="120"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow border p-4">
            <h3 class="font-semibold text-gray-800 mb-3">Safari (Pie)</h3>
            <canvas id="stageChart" height="120"></canvas>
        </div>
    </div>

    <!-- Recent table -->
    <div class="bg-white rounded-lg shadow border overflow-hidden">
        <div class="px-5 py-4 border-b"><h3 class="font-semibold text-gray-800">Hivi Karibuni</h3></div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jina</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Simu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Safari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hali</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kipaumbele</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarehe</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recent as $r)
                <tr>
                    <td class="px-6 py-4">{{ $r->full_name }}</td>
                    <td class="px-6 py-4">{{ $r->phone }}</td>
                    <td class="px-6 py-4 capitalize">{{ $r->journey_stage ?? '-' }}</td>
                    <td class="px-6 py-4 capitalize">{{ $r->status ?? '-' }}</td>
                    <td class="px-6 py-4 capitalize">{{ $r->priority ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ optional($r->created_at)->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">Hakuna data katika kipindi hiki.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
const labels = @json($labels);
const series = @json($series);
const byStatus = @json($byStatus);
const byPriority = @json($byPriority);
const byStage = @json($byStage);

// Timeseries Line
new Chart(document.getElementById('tsChart'), {
  type: 'line',
  data: {
    labels,
    datasets: [{
      label: 'Majibu kwa siku',
      data: series,
      borderColor: '#7c3aed',
      backgroundColor: 'rgba(124, 58, 237, 0.2)',
      tension: 0.3,
      fill: true
    }]
  },
  options: {responsive: true, plugins: {legend: {display: true}}}
});

// Pie helpers
const pieOpts = {responsive: true, plugins: {legend: {position: 'bottom'}}};
const palette = ['#10b981','#3b82f6','#f59e0b','#ef4444','#8b5cf6','#06b6d4'];

new Chart(document.getElementById('statusChart'), {
  type: 'pie',
  data: {labels: Object.keys(byStatus), datasets: [{data: Object.values(byStatus), backgroundColor: palette}]},
  options: pieOpts
});

new Chart(document.getElementById('priorityChart'), {
  type: 'pie',
  data: {labels: Object.keys(byPriority), datasets: [{data: Object.values(byPriority), backgroundColor: palette}]},
  options: pieOpts
});

new Chart(document.getElementById('stageChart'), {
  type: 'pie',
  data: {labels: Object.keys(byStage), datasets: [{data: Object.values(byStage), backgroundColor: palette}]},
  options: pieOpts
});
</script>
@endsection
