@extends('panel.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="mb-6">
        <a href="{{ route('panel') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
            &larr; Rudi kwenye Paneli
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
            <div class="text-sm font-medium">{{ session('success') }}</div>
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3">
            <div class="text-sm font-medium">{{ session('error') }}</div>
        </div>
    @endif

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
                    @if($intake->email)<div class="flex justify-between"><dt class="text-gray-500">Barua Pepe</dt><dd class="text-gray-900">{{ $intake->email }}</dd></div>@endif
                    @if($intake->age)<div class="flex justify-between"><dt class="text-gray-500">Umri</dt><dd class="text-gray-900">{{ $intake->age }} miaka</dd></div>@endif
                </dl>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Safari ya Uzazi</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Hatua</dt><dd class="text-gray-900">{{ ucfirst($intake->journey_stage ?? '-') }}</dd></div>

                    @if(($intake->journey_stage ?? '') === 'pregnant')
                        <div class="flex justify-between"><dt class="text-gray-500">Hospitali Unayopanga</dt><dd class="text-gray-900">{{ $intake->hospital_planned ?? '-' }}</dd></div>
                        @if($intake->hospital_alternative)<div class="flex justify-between"><dt class="text-gray-500">Hospitali Mbadala</dt><dd class="text-gray-900">{{ $intake->hospital_alternative }}</dd></div>@endif
                        <div class="flex justify-between"><dt class="text-gray-500">Wiki za Ujauzito</dt><dd class="text-gray-900">{{ $intake->pregnancy_weeks ?? '-' }}</dd></div>
                    @elseif(($intake->journey_stage ?? '') === 'postpartum')
                        <div class="flex justify-between"><dt class="text-gray-500">Hospitali ya Kujifungulia</dt><dd class="text-gray-900">{{ $intake->delivery_hospital ?? '-' }}</dd></div>
                        @if($intake->birth_hospital)<div class="flex justify-between"><dt class="text-gray-500">Hospitali Halisi ya Kuzaliwa</dt><dd class="text-gray-900">{{ $intake->birth_hospital }}</dd></div>@endif
                        <div class="flex justify-between"><dt class="text-gray-500">Wiki za Mtoto</dt><dd class="text-gray-900">{{ $intake->baby_weeks_old ?? '-' }}</dd></div>
                    @elseif(($intake->journey_stage ?? '') === 'ttc')
                        <div class="flex justify-between"><dt class="text-gray-500">Muda wa Kujaribu Kupata Mtoto</dt><dd class="text-gray-900">{{ $intake->ttc_duration ?? '-' }}</dd></div>
                    @endif
                </dl>
            </div>

            <div class="md:col-span-2">
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Ridhaa na Taarifa Zaidi</h2>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Ninakubali kupokea ushauri (WhatsApp/SMS)</dt><dd class="text-gray-900">{{ ($intake->agree_comms ?? false) ? 'Ndiyo' : 'Hapana' }}</dd></div>
                    <div class="flex justify-between"><dt class="text-gray-500">Ninakubali tamko la ufafanuzi</dt><dd class="text-gray-900">{{ ($intake->disclaimer_ack ?? false) ? 'Ndiyo' : 'Hapana' }}</dd></div>
                    @if($intake->location)<div class="flex justify-between"><dt class="text-gray-500">Mahali</dt><dd class="text-gray-900">{{ $intake->location }}</dd></div>@endif
                    @if($intake->previous_pregnancies)<div class="flex justify-between"><dt class="text-gray-500">Mimba za Awali</dt><dd class="text-gray-900">{{ $intake->previous_pregnancies }}</dd></div>@endif
                </dl>

                @if($intake->notes)
                <div class="mt-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Maelezo ya Ziada</h3>
                    <div class="bg-gray-50 p-3 rounded text-sm text-gray-700">{{ $intake->notes }}</div>
                </div>
                @endif
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
