<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fomu ya Mama - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900">
    <!-- Header (same style as home) -->
    <header class="w-full sticky top-0 z-40 bg-white/80 backdrop-blur border-b">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('LOGO-MALKIA-KONNECT.jpg') }}" alt="Logo" class="h-8 w-8 rounded object-cover"/>
                <span class="font-semibold">{{ config('app.name', 'Malkia Konnect') }}</span>
            </a>
        </div>
    </header>

    <main class="py-10">
        @php($initialStep = 1)@endphp
        @php($initialStep = $errors->hasAny(['pregnancy_stage','due_date','previous_pregnancies']) ? 2 : $initialStep)@endphp
        @php($initialStep = $errors->hasAny(['concerns','interests','interests.*']) ? 3 : $initialStep)@endphp
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8" x-data="{step: {{ $initialStep }}, total:3}">
            <!-- Title & progress (centered) -->
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-extrabold mb-2">Tueleze mahitaji yako</h1>
                <p class="text-gray-700 mb-4">Chukua takribani dakika 1 tu. Tutatumia majibu yako kukupangia rasilimali na ushauri bora.</p>
                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-[#7e22ce]" :style="`width: ${(step/total)*100}%`"></div>
                </div>
                <div class="mt-2 text-sm text-gray-600">Hatua <span x-text="step"></span> ya <span x-text="total"></span></div>
            </div>

            <!-- Form card centered -->
            <form method="POST" action="{{ route('intake.store') }}" class="bg-white border rounded-xl p-6 shadow-sm mx-auto max-w-3xl">
                @csrf

                <!-- Step 1: Basic info -->
                <div x-show="step===1" x-transition>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Jina kamili</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- user icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 10a4 4 0 100-8 4 4 0 000 8z"/><path fill-rule="evenodd" d="M.458 16.042A10 10 0 0110 12a10 10 0 019.542 4.042A.75.75 0 0118.94 17.5a8.5 8.5 0 00-17.88 0 .75.75 0 01-1.102-.958z" clip-rule="evenodd"/></svg>
                                </span>
                                <input name="full_name" required class="w-full border rounded-md pl-10 pr-3 py-2" placeholder="Mf. Asha Mwita" value="{{ old('full_name') }}" />
                            </div>
                            @error('full_name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Namba ya simu</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- phone icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M2.25 6.75c0-1.243 1.007-2.25 2.25-2.25h3A2.25 2.25 0 0 1 9.75 6.75v.75a2.25 2.25 0 0 1-2.25 2.25H6a11.25 11.25 0 0 0 7.5 7.5v-1.5A2.25 2.25 0 0 1 15.75 13.5h.75a2.25 2.25 0 0 1 2.25 2.25v3a2.25 2.25 0 0 1-2.25 2.25H15A15.75 15.75 0 0 1 2.25 6.75z"/></svg>
                                </span>
                                <input name="phone" class="w-full border rounded-md pl-10 pr-3 py-2" placeholder="Mf. 07xxxxxxx au +2557xxxxxxx" value="{{ old('phone') }}" />
                            </div>
                            @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Barua pepe</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- envelope icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M2 4a2 2 0 012-2h12a2 2 0 012 2v1.586a2 2 0 01-.586 1.414l-6.414 6.414a2 2 0 01-2.828 0L2.586 7A2 2 0 012 5.586V4z"/><path d="M18 8.414l-5.293 5.293a4 4 0 01-5.414 0L2 8.414V14a2 2 0 002 2h12a2 2 0 002-2V8.414z"/></svg>
                                </span>
                                <input type="email" name="email" class="w-full border rounded-md pl-10 pr-3 py-2" placeholder="Mf. mama@example.com" value="{{ old('email') }}" />
                            </div>
                            @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Umri</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- number/hashtag icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M9.75 3a.75.75 0 0 1 .743.648L10.5 3.75V6h3V3.75a.75.75 0 0 1 1.493-.102L15 3.75V6h2.25a.75.75 0 0 1 .102 1.493L17.25 7.5H15v3h2.25a.75.75 0 0 1 .102 1.493L17.25 12H15v2.25a.75.75 0 0 1-1.493.102L13.5 14.25V12h-3v2.25a.75.75 0 0 1-1.493.102L9 14.25V12H6.75a.75.75 0 0 1-.102-1.493L6.75 10.5H9v-3H6.75a.75.75 0 0 1-.102-1.493L6.75 6H9V3.75A.75.75 0 0 1 9.75 3z"/></svg>
                                </span>
                                <input type="number" name="age" min="12" max="60" class="w-full border rounded-md pl-10 pr-3 py-2" value="{{ old('age') }}" />
                            </div>
                            @error('age')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Makazi/eneo</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- map pin icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6c0 4.418 6 10 6 10s6-5.582 6-10a6 6 0 00-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z" clip-rule="evenodd"/></svg>
                                </span>
                                <input name="location" class="w-full border rounded-md pl-10 pr-3 py-2" placeholder="Mf. Dar es Salaam" value="{{ old('location') }}" />
                            </div>
                            @error('location')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- Step 2: Pregnancy details -->
                <div x-show="step===2" x-transition>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Hatua uliyo nayo</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- heart icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41.81 4.5 2.09A6 6 0 0 1 21.5 4C24 4 26 6 26 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                </span>
                                <select name="pregnancy_stage" class="w-full border rounded-md pl-10 pr-3 py-2 appearance-none">
                                    <option value="" {{ old('pregnancy_stage')=='' ? 'selected' : '' }}>Chagua</option>
                                    <option {{ old('pregnancy_stage')=='Trimester 1' ? 'selected' : '' }}>Trimester 1</option>
                                    <option {{ old('pregnancy_stage')=='Trimester 2' ? 'selected' : '' }}>Trimester 2</option>
                                    <option {{ old('pregnancy_stage')=='Trimester 3' ? 'selected' : '' }}>Trimester 3</option>
                                    <option {{ old('pregnancy_stage')=='Postpartum' ? 'selected' : '' }}>Postpartum</option>
                                </select>
                            </div>
                            @error('pregnancy_stage')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tarehe ya makisio ya kujifungua</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- calendar icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M6 2a1 1 0 012 0v1h4V2a1 1 0 112 0v1h1a2 2 0 012 2v1H3V5a2 2 0 012-2h1V2z"/><path d="M3 9h14v6a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/></svg>
                                </span>
                                <input type="date" name="due_date" class="w-full border rounded-md pl-10 pr-3 py-2" value="{{ old('due_date') }}" />
                            </div>
                            @error('due_date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Idadi ya mimba zilizopita</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- hashtag icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M9.75 3a.75.75 0 0 1 .743.648L10.5 3.75V6h3V3.75a.75.75 0 0 1 1.493-.102L15 3.75V6h2.25a.75.75 0 0 1 .102 1.493L17.25 7.5H15v3h2.25a.75.75 0 0 1 .102 1.493L17.25 12H15v2.25a.75.75 0 0 1-1.493.102L13.5 14.25V12h-3v2.25a.75.75 0 0 1-1.493.102L9 14.25V12H6.75a.75.75 0 0 1-.102-1.493L6.75 10.5H9v-3H6.75a.75.75 0 0 1-.102-1.493L6.75 6H9V3.75A.75.75 0 0 1 9.75 3z"/></svg>
                                </span>
                                <input type="number" name="previous_pregnancies" min="0" max="20" class="w-full border rounded-md pl-10 pr-3 py-2" value="{{ old('previous_pregnancies') }}" />
                            </div>
                            @error('previous_pregnancies')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- Step 3: Needs -->
                <div x-show="step===3" x-transition>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Masuala yanayokuhusu (andika kwa kifupi)</label>
                            <div class="mt-1 relative">
                                <span class="pointer-events-none absolute top-3 left-3 text-gray-400">
                                    <!-- chat icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M18 13a3 3 0 01-3 3H7l-4 4V5a3 3 0 013-3h9a3 3 0 013 3v8z"/></svg>
                                </span>
                                <textarea name="concerns" rows="4" class="w-full border rounded-md pl-10 pr-3 py-2" placeholder="Mf. kichefuchefu, usingizi, au unyonyeshaji">{{ old('concerns') }}</textarea>
                            </div>
                            @error('concerns')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Ungependa nini zaidi?</label>
                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 gap-2">
                                @php($opts = ['Elimu/kozi', 'Warsha', 'Ushauri wa daktari', 'Ushauri wa lishe', 'Jamii/Group', 'Huduma baada ya kujifungua'])@endphp
                                @php($oldInterests = old('interests', []))@endphp
                                @foreach($opts as $opt)
                                    <label class="inline-flex items-center gap-2 text-sm">
                                        <span class="text-[#f59e0b]">
                                            <!-- sparkles icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l2 4 4 2-4 2-2 4-2-4-4-2 4-2 2-4zm14 2l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3zm-4 8l2 3 3 2-3 2-2 3-2-3-3-2 3-2 2-3z"/></svg>
                                        </span>
                                        <input type="checkbox" name="interests[]" value="{{ $opt }}" class="rounded border-gray-300 text-[#7e22ce] focus:ring-[#7e22ce]" {{ in_array($opt, $oldInterests) ? 'checked' : '' }} />
                                        <span>{{ $opt }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('interests')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <button type="button" @click="step = Math.max(1, step-1)" :disabled="step===1" class="px-5 py-2 rounded-md border disabled:opacity-40">Rudi</button>
                    <div class="flex-1"></div>
                    <button type="button" x-show="step<total" @click="step = Math.min(total, step+1)" class="px-5 py-2 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Endelea</button>
                    <button x-show="step===total" class="px-5 py-2 rounded-md bg-[#7e22ce] text-white hover:bg-[#6b21a8]">Tuma fomu</button>
                </div>
            </form>

            <!-- Helper notes -->
            <div class="mt-6 text-sm text-gray-600 text-center max-w-3xl mx-auto">
                <p>Taarifa zako zitahifadhiwa kwa usalama. Unaweza kusasisha wakati wowote.</p>
            </div>
        </div>
    </main>

    <footer class="border-t py-8 mt-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-600">
            <p>© {{ date('Y') }} {{ config('app.name', 'Malkia Konnect') }}. Haki zote zimehifadhiwa.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-[#7e22ce]">Masharti</a>
                <a href="#" class="hover:text-[#7e22ce]">Faragha</a>
                <a href="#" class="hover:text-[#7e22ce]">Wasiliana nasi</a>
            </div>
        </div>
    </footer>
</body>
</html>
