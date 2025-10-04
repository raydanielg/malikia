@extends('panel.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="mb-6">
        <a href="{{ route('panel') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
            &larr; Rudi kwenye Paneli
        </a>
    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h1 class="text-xl font-semibold text-gray-800">Majibu ya Fomu</h1>
            <p class="text-sm text-gray-500">ID: {{ $intake->id }} • Iliyowasilishwa: {{ optional($intake->created_at)->format('M d, Y H:i') }}</p>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Taarifa Binafsi</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Jina Kamili</dt><dd class="text-gray-900">{{ $intake->full_name ?? '-' }}</dd></div>
                    <div class="flex justify-between"><dt class="text-gray-500">Namba ya Simu</dt><dd class="text-gray-900">{{ $intake->phone ?? '-' }}</dd></div>
                </dl>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Safari ya Uzazi</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Hatua</dt><dd class="text-gray-900">{{ ucfirst($intake->journey_stage ?? '-') }}</dd></div>
                    @if(($intake->journey_stage ?? '') === 'pregnant')
                        <div class="flex justify-between"><dt class="text-gray-500">Wiki za Ujauzito</dt><dd class="text-gray-900">{{ $intake->pregnancy_weeks ?? '-' }}</dd></div>
                        <div class="flex justify-between"><dt class="text-gray-500">Hospitali Unayopanga</dt><dd class="text-gray-900">{{ $intake->hospital_planned ?? '-' }}</dd></div>
                    @elseif(($intake->journey_stage ?? '') === 'postpartum')
                        <div class="flex justify-between"><dt class="text-gray-500">Wiki za Mtoto</dt><dd class="text-gray-900">{{ $intake->baby_weeks_old ?? '-' }}</dd></div>
                    @endif
                </dl>
            </div>

            <div class="md:col-span-2">
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Ridhaa</h2>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Ninakubali kupokea ushauri (WhatsApp/SMS)</dt><dd class="text-gray-900">{{ ($intake->agree_comms ?? false) ? 'Ndiyo' : 'Hapana' }}</dd></div>
                    <div class="flex justify-between"><dt class="text-gray-500">Ninakubali tamko la ufafanuzi</dt><dd class="text-gray-900">{{ ($intake->disclaimer_ack ?? false) ? 'Ndiyo' : 'Hapana' }}</dd></div>
                </dl>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t flex items-center justify-between">
            <form action="{{ route('panel.intake.complete', $intake) }}" method="POST" class="inline-flex">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded">Weka Imekamilika</button>
            </form>

            <div class="flex items-center gap-3">
                <form action="{{ route('panel.intake.review', $intake) }}" method="POST" class="inline-flex">
                    @csrf
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold px-4 py-2 rounded">Weka Imepitiwa</button>
                </form>
                <a href="{{ route('panel.export.excel') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded">Pakua Excel</a>
                <a href="{{ route('panel.export.csv') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded">Pakua CSV</a>
            </div>
        </div>
    </div>
</div>
@endsection
