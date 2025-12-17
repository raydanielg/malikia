<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak]{ display:none !important; }</style>
</head>
<body class="antialiased text-gray-900 bg-gradient-to-br from-rose-50 via-white to-teal-50 min-h-screen flex items-center justify-center py-8 px-4">
    <main class="w-full max-w-3xl">
        <div class="mb-6 text-center">
            <p class="inline-flex items-center gap-2 rounded-full bg-rose-50 text-rose-700 text-xs font-medium px-3 py-1 border border-rose-100">
                <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                Tunathamini maoni yako
            </p>
            <h1 class="mt-3 text-2xl sm:text-3xl font-extrabold text-gray-900">
                Tusaidie kuboresha Malkia Konnect
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Survey hii itachukua takribani dakika 2–3 tu. Majibu yako yanatusaidia kuboresha bidhaa na huduma zetu.
            </p>
        </div>

        <section x-data="{ step: 1, maxStep: 4 }" class="space-y-4">
            @if (session('survey_ok'))
                <div class="mb-5 rounded-xl bg-green-50 text-green-800 px-4 py-3 border border-green-200 text-sm">
                    {{ session('survey_ok') }}
                </div>
            @endif

            <div class="flex items-center justify-between gap-4 mb-2">
                <div class="flex-1 h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full bg-[#7e22ce] transition-all duration-300" :style="`width: ${(step / maxStep) * 100}%`"></div>
                </div>
                <div class="text-xs font-medium text-gray-600 whitespace-nowrap">
                    Hatua <span x-text="step"></span> ya <span x-text="maxStep"></span>
                </div>
            </div>

            <form method="POST" action="{{ route('survey.submit') }}" class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 lg:p-8 space-y-6">
                @csrf

                <div x-show="step === 1" x-cloak class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">1</span>
                        Kuhusu wewe
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">1. Umri wako uko katika kundi lipi? <span class="text-red-500">*</span></p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @php
                                    $ages = [
                                        'below_18' => 'Chini ya miaka 18',
                                        '18_24' => '18–24',
                                        '25_34' => '25–34',
                                        '35_44' => '35–44',
                                        '45_plus' => '45+',
                                    ];
                                @endphp
                                @foreach($ages as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="age_group" value="{{ $key }}" {{ old('age_group') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('age_group')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">2. Kiasi cha damu yako mara nyingi kikoje? <span class="text-red-500">*</span></p>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-sm">
                                @php
                                    $flows = [
                                        'light' => 'Kidogo',
                                        'medium' => 'Cha kati',
                                        'heavy' => 'Kingi',
                                        'very_heavy' => 'Kingi sana',
                                    ];
                                @endphp
                                @foreach($flows as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="flow_level" value="{{ $key }}" {{ old('flow_level') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('flow_level')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">2</span>
                        Unachotumia sasa
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">3. Ni brand gani ya taulo za kike unayotumia mara nyingi?</label>
                            <input type="text" name="current_brand" value="{{ old('current_brand') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('current_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">4. Kwa nini unachagua brand hiyo? (chagua hadi 2)</p>
                            @php
                                $reasons = [
                                    'price' => 'Bei',
                                    'availability' => 'Inapatikana kirahisi',
                                    'no_leaks' => 'Hainivuji',
                                    'soft' => 'Ni laini',
                                    'habit' => 'Nimeizoea',
                                    'recommended' => 'Nimependekezwa',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($reasons as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="reasons[]" value="{{ $key }}" @checked(collect(old('reasons', []))->contains($key)) class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('reasons')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">3</span>
                        Taulo nzuri ni ipi?
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">5. Ni mambo gani muhimu zaidi kwako kwenye taulo ya kike? (chagua hadi 3)</p>
                            @php
                                $features = [
                                    'absorption' => 'Kufyonza vizuri',
                                    'no_leak' => 'Kuto vuja',
                                    'soft_skin' => 'Laini kwenye ngozi',
                                    'no_irritation' => 'Kuepuka muwasho',
                                    'not_bulky' => 'Isiwe nzito',
                                    'odor_control' => 'Kudhibiti harufu',
                                    'no_slip' => 'Isiteleze',
                                    'breathable' => 'Ipitishe hewa',
                                    'affordable' => 'Bei nafuu',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($features as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="important_features[]" value="{{ $key }}" @checked(collect(old('important_features', []))->contains($key)) class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('important_features')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">6. Unapendelea taulo za aina gani?</p>
                            @php
                                $padTypes = [
                                    'thin' => 'Nyembamba',
                                    'medium' => 'Za kati',
                                    'thick' => 'Nzito mradi inalinda',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($padTypes as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="pad_type" value="{{ $key }}" {{ old('pad_type') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('pad_type')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">7. Taulo zenye mabawa (wings)?</p>
                            @php
                                $wings = [
                                    'must' => 'Lazima',
                                    'nice_to_have' => 'Sio muhimu sana, but ikiwepo ni sawa',
                                    'dont_like' => 'Sipendi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($wings as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="wings_preference" value="{{ $key }}" {{ old('wings_preference') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('wings_preference')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-2">
                            <p class="block text-sm font-medium text-gray-700 mb-1">8. Taulo zenye harufu (scented)?</p>
                            @php
                                $scented = [
                                    'like' => 'Nazipenda',
                                    'neutral' => 'Sina shida',
                                    'dislike' => 'Sizipendi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm">
                                @foreach($scented as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="scented_preference" value="{{ $key }}" {{ old('scented_preference') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('scented_preference')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror

                            <label class="block text-xs text-gray-600 mt-2">Kwa nini?</label>
                            <input type="text" name="scented_reason" value="{{ old('scented_reason') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('scented_reason')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">9. Umewahi kupata muwasho, vipele au michubuko kutokana na taulo?</p>
                            @php
                                $irritation = [
                                    'often' => 'Mara nyingi',
                                    'sometimes' => 'Wakati mwingine',
                                    'rarely' => 'Mara chache',
                                    'never' => 'Sijawahi',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 text-sm">
                                @foreach($irritation as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="irritation_frequency" value="{{ $key }}" {{ old('irritation_frequency') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('irritation_frequency')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 3" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">4</span>
                        Mambo ya kuepuka
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">10. Kitu gani unakichukia zaidi kwenye taulo? (chagua yote yanayokuhusu)</p>
                            @php
                                $dislikes = [
                                    'leaks' => 'Kuvuja',
                                    'bad_smell' => 'Harufu mbaya',
                                    'wet_feel' => 'Kuhisi unyevu',
                                    'too_big' => 'Kuwa kubwa',
                                    'slipping' => 'Kuteleza',
                                    'itching' => 'Kuwasha',
                                    'bad_glue' => 'Gundi mbovu',
                                    'plastic_material' => 'Material ya Plastiki',
                                    'noise' => 'Sauti',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($dislikes as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="dislikes[]" value="{{ $key }}" @checked(collect(old('dislikes', []))->contains($key)) class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('dislikes')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="space-y-2">
                            <p class="block text-sm font-medium text-gray-700 mb-1">11. Umewahi kuacha kutumia brand ya pedi kwa sababu ya uzoefu mbaya?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="stopped_brand" value="yes" {{ old('stopped_brand') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="stopped_brand" value="no" {{ old('stopped_brand') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('stopped_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror

                            <label class="block text-xs text-gray-600 mt-2">Eleza:</label>
                            <textarea name="stopped_brand_explain" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('stopped_brand_explain') }}</textarea>
                            @error('stopped_brand_explain')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 3" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">5</span>
                        Bei & thamani
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">12. Kwa kawaida unanunua taulo kwa bei gani? <span class="text-red-500">*</span></p>
                            @php
                                $prices = [
                                    'under_2000' => 'Chini ya 2,000',
                                    '2000_4000' => '2,000–4,000',
                                    '4000_6000' => '4,000–6,000',
                                    'over_6000' => 'Zaidi ya 6,000',
                                ];
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                @foreach($prices as $key => $label)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="price_range" value="{{ $key }}" {{ old('price_range') === $key ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('price_range')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">13. Uko tayari kulipa zaidi kidogo kwa taulo bora?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="yes" {{ old('pay_more') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="maybe" {{ old('pay_more') === 'maybe' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Labda</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="pay_more" value="no" {{ old('pay_more') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300">
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('pay_more')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">14. Kwa maoni yako, taulo nzuri ni ipi?</label>
                            <input type="text" name="good_pad_definition" value="{{ old('good_pad_definition') }}" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]" />
                            @error('good_pad_definition')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div x-show="step === 4" x-cloak class="border-t border-gray-100 pt-5 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-[#7e22ce]/10 text-[#7e22ce] text-xs font-bold">6</span>
                        Maoni ya kweli
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">15. Kama ungeunda taulo yako bora kabisa, ingekuwaje?</label>
                            <textarea name="ideal_pad" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('ideal_pad') }}</textarea>
                            @error('ideal_pad')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">16. Ni tatizo gani la taulo bado halijatatuliwa kwako?</label>
                            <textarea name="unresolved_problem" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('unresolved_problem') }}</textarea>
                            @error('unresolved_problem')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <p class="block text-sm font-medium text-gray-700 mb-2">17. Je, ungejaribu brand mpya kama itatatua tatizo lako kubwa?</p>
                            <div class="flex flex-wrap gap-4 text-sm">
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="yes" {{ old('try_new_brand') === 'yes' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Ndiyo</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="maybe" {{ old('try_new_brand') === 'maybe' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Labda</span>
                                </label>
                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="try_new_brand" value="no" {{ old('try_new_brand') === 'no' ? 'checked' : '' }} class="h-4 w-4 text-[#7e22ce] border-gray-300" required>
                                    <span>Hapana</span>
                                </label>
                            </div>
                            @error('try_new_brand')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">18. Maoni mengine yoyote:</label>
                            <textarea name="other_comments" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7e22ce]/70 focus:border-[#7e22ce]">{{ old('other_comments') }}</textarea>
                            @error('other_comments')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-gray-100 mt-2">
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-rose-50 text-rose-500 text-xs font-semibold">
                            <span x-text="step"></span>
                        </span>
                        <span>
                            Hatua ya <span x-text="step"></span> / <span x-text="maxStep"></span>
                        </span>
                    </div>

                    <div class="flex items-center gap-3 justify-end">
                        <button
                            type="button"
                            class="px-4 py-2 rounded-full border border-gray-300 text-xs sm:text-sm text-gray-700 hover:bg-gray-50 disabled:opacity-40 disabled:cursor-not-allowed"
                            @click="if(step > 1) step--; window.scrollTo({top: 0, behavior: 'smooth'});"
                            :disabled="step === 1"
                        >
                            Rudi nyuma
                        </button>

                        <button
                            type="button"
                            x-show="step < maxStep"
                            x-cloak
                            class="px-5 py-2 rounded-full bg-[#7e22ce] hover:bg-[#6b21a8] text-white text-xs sm:text-sm font-medium shadow-sm"
                            @click="if(step < maxStep) { step++; window.scrollTo({top: 0, behavior: 'smooth'}); }"
                        >
                            Endelea
                        </button>

                        <div x-show="step === maxStep" x-cloak class="flex flex-col sm:flex-row sm:items-center gap-2">
                            <p class="text-[11px] sm:text-xs text-gray-500 max-w-xs">
                                Kwa kubonyeza "Tuma Dodoso" unakubali kuwa maoni yako yanatumika kuboresha taulo za kike na huduma za Malkia.
                            </p>
                            <button type="submit" class="px-5 py-2 rounded-full bg-[#7e22ce] hover:bg-[#6b21a8] text-white text-xs sm:text-sm font-medium shadow-sm">
                                Tuma Dodoso
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
