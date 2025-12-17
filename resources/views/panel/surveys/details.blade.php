@extends('panel.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Survey Response #{{ $survey->id }}</h1>
            <p class="text-sm text-gray-500">Majibu ya dodoso la taulo za kike - {{ $survey->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('panel.surveys.index') }}" class="px-4 py-2 rounded-md bg-gray-600 text-white text-sm font-semibold hover:bg-gray-700">
                ← Rudi
            </a>
            <form method="POST" action="{{ route('panel.survey.destroy', $survey) }}" onsubmit="return confirm('Una uhakika unataka kufuta?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white text-sm font-semibold hover:bg-red-700">
                    🗑️ Futa
                </button>
            </form>
        </div>
    </div>

    <!-- Metadata Card -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg shadow border border-purple-200 p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <div class="text-xs text-gray-600">Tarehe</div>
                <div class="text-sm font-semibold text-gray-900">{{ $survey->created_at->format('d/m/Y H:i:s') }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-600">IP Address</div>
                <div class="text-sm font-semibold text-gray-900">{{ $survey->ip_address ?? 'N/A' }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-600">User Agent</div>
                <div class="text-sm font-semibold text-gray-900 truncate" title="{{ $survey->user_agent }}">
                    {{ Str::limit($survey->user_agent ?? 'N/A', 40) }}
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
