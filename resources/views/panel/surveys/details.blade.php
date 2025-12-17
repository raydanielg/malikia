@extends('panel.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="bg-gradient-to-r from-purple-600 via-pink-600 to-rose-600 rounded-2xl shadow-xl p-6 mb-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center mb-4 lg:mb-0">
                <div class="bg-white bg-opacity-20 rounded-2xl p-4 mr-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white mb-1">📋 Survey Response #{{ $survey->id }}</h1>
                    <p class="text-pink-100 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $survey->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('panel.surveys.index') }}" class="flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-gray-700 font-semibold hover:bg-gray-100 transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Rudi
                </a>
                <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center gap-2 px-5 py-3 rounded-xl bg-red-600 text-white font-semibold hover:bg-red-700 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Futa
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Metadata Card -->
    <div class="bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 rounded-xl shadow-lg border-2 border-purple-200 p-6 mb-6">
        <div class="flex items-center mb-4">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg font-bold text-gray-800">ℹ️ Metadata</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="flex items-start">
                <div class="bg-purple-100 rounded-lg p-3 mr-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xs text-gray-600 mb-1">📅 Tarehe</div>
                    <div class="text-sm font-bold text-gray-900">{{ $survey->created_at->format('d/m/Y H:i:s') }}</div>
                </div>
            </div>
            <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xs text-gray-600 mb-1">🌐 IP Address</div>
                    <div class="text-sm font-bold text-gray-900">{{ $survey->ip_address ?? 'N/A' }}</div>
                </div>
            </div>
            <div class="flex items-start">
                <div class="bg-green-100 rounded-lg p-3 mr-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-xs text-gray-600 mb-1">💻 User Agent</div>
                    <div class="text-sm font-bold text-gray-900 truncate" title="{{ $survey->user_agent }}">
                        {{ Str::limit($survey->user_agent ?? 'N/A', 35) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sehemu ya 1: Kuhusu wewe -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-purple-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">1️⃣ Sehemu ya 1: Kuhusu Wewe</h2>
        </div>
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-sm text-gray-600">1. Umri</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800">{{ $survey->age_group_label }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600">2. Kiasi cha Damu</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">
                        <span class="px-3 py-1 rounded-full bg-rose-100 text-rose-800">{{ $survey->flow_level_label }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sehemu ya 2: Unachotumia sasa -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-green-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">2️⃣ Sehemu ya 2: Unachotumia Sasa</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <div class="text-sm text-gray-600">3. Brand Inayotumika</div>
                <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->current_brand }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-600">4. Sababu za Kuchagua Brand Hiyo</div>
                <div class="mt-1 flex flex-wrap gap-2">
                    @if($survey->reasons && count($survey->reasons) > 0)
                        @foreach($survey->reasons as $reason)
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm">{{ $reason }}</span>
                        @endforeach
                    @else
                        <span class="text-gray-500 text-sm">Hakuna</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Sehemu ya 3: Taulo nzuri ni ipi? -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-blue-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">3️⃣ Sehemu ya 3: Taulo Nzuri ni Ipi?</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <div class="text-sm text-gray-600">5. Mambo Muhimu kwenye Taulo</div>
                <div class="mt-1 flex flex-wrap gap-2">
                    @if($survey->important_features && count($survey->important_features) > 0)
                        @foreach($survey->important_features as $feature)
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-sm">{{ $feature }}</span>
                        @endforeach
                    @else
                        <span class="text-gray-500 text-sm">Hakuna</span>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-sm text-gray-600">6. Aina ya Taulo</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->pad_type ?? 'N/A' }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600">7. Mabawa (Wings)</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->wings_preference ?? 'N/A' }}</div>
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-600">8. Taulo zenye Harufu</div>
                <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->scented_preference ?? 'N/A' }}</div>
                @if($survey->scented_reason)
                    <div class="text-sm text-gray-600 mt-2">Sababu:</div>
                    <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->scented_reason }}</div>
                @endif
            </div>
            <div>
                <div class="text-sm text-gray-600">9. Muwasho/Vipele</div>
                <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->irritation_frequency ?? 'N/A' }}</div>
            </div>
        </div>
    </div>

    <!-- Sehemu ya 4: Mambo ya kuepuka -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-orange-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">4️⃣ Sehemu ya 4: Mambo ya Kuepuka</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <div class="text-sm text-gray-600">10. Vitu Visivyopendeza kwenye Taulo</div>
                <div class="mt-1 flex flex-wrap gap-2">
                    @if($survey->dislikes && count($survey->dislikes) > 0)
                        @foreach($survey->dislikes as $dislike)
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm">{{ $dislike }}</span>
                        @endforeach
                    @else
                        <span class="text-gray-500 text-sm">Hakuna</span>
                    @endif
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-600">11. Kuacha Brand kwa Sababu ya Uzoefu Mbaya</div>
                <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->stopped_brand ?? 'N/A' }}</div>
                @if($survey->stopped_brand_explain)
                    <div class="text-sm text-gray-600 mt-2">Maelezo:</div>
                    <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->stopped_brand_explain }}</div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sehemu ya 5: Bei & thamani -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-teal-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">5️⃣ Sehemu ya 5: Bei & Thamani</h2>
        </div>
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-sm text-gray-600">12. Bei ya Kawaida</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">{{ $survey->price_range_label }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600">13. Kulipa Zaidi kwa Taulo Bora</div>
                    <div class="text-base font-semibold text-gray-900 mt-1">{{ $survey->pay_more ?? 'N/A' }}</div>
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-600">14. Taulo Nzuri ni Ipi?</div>
                <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->good_pad_definition ?? 'N/A' }}</div>
            </div>
        </div>
    </div>

    <!-- Sehemu ya 6: Maoni ya kweli -->
    <div class="bg-white rounded-lg shadow border mb-6">
        <div class="bg-rose-600 text-white px-6 py-3 rounded-t-lg">
            <h2 class="text-lg font-bold">6️⃣ Sehemu ya 6: Maoni ya Kweli</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <div class="text-sm text-gray-600">15. Taulo Bora Kabisa (Ndoto)</div>
                <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->ideal_pad ?? 'N/A' }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-600">16. Tatizo Lisilotatibiwa</div>
                <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->unresolved_problem ?? 'N/A' }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-600">17. Jaribu Brand Mpya?</div>
                <div class="text-base font-semibold text-gray-900 mt-1">
                    @if($survey->try_new_brand === 'yes')
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">✓ Ndiyo</span>
                    @elseif($survey->try_new_brand === 'maybe')
                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">? Labda</span>
                    @else
                        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-800">✗ Hapana</span>
                    @endif
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-600">18. Maoni Mengine</div>
                <div class="text-sm text-gray-900 mt-1 p-3 bg-gray-50 rounded-md">{{ $survey->other_comments ?? 'N/A' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
