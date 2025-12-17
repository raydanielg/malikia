<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asante - {{ config('app.name', 'Malkia Konnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .scale-in {
            animation: scaleIn 0.5s ease-out forwards;
        }

        @keyframes sharePulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(34,197,94,0.4); }
            50% { transform: scale(1.03); box-shadow: 0 0 0 8px rgba(34,197,94,0); }
        }

        .share-pulse {
            animation: sharePulse 1.6s ease-out infinite;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-white via-rose-50 to-pink-50 text-gray-900">
    <div class="min-h-screen flex items-center justify-center px-3 sm:px-4 py-10 sm:py-12">
        <div class="max-w-2xl w-full text-center space-y-8 sm:space-y-10 fade-in">
            <!-- Success Icon -->
            <div class="flex justify-center">
                <div class="relative scale-in">
                    <div class="absolute inset-0 bg-gradient-to-r from-rose-400 to-pink-500 rounded-full blur-3xl opacity-60"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-xl flex items-center justify-center">
                        <div class="bg-gradient-to-r from-rose-500 to-pink-600 rounded-full p-8 shadow-2xl flex items-center justify-center">
                            <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            <div class="space-y-4 sm:space-y-5">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900">
                    Hongera! 
                    <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-rose-600 bg-clip-text text-transparent">Umefanikiwa</span>
                </h1>
                <p class="text-lg sm:text-2xl text-gray-800 font-semibold">
                    Asante sana kwa kushiriki kwenye dodoso letu!
                </p>
                <p class="text-sm sm:text-base md:text-lg text-gray-700 max-w-xl mx-auto leading-relaxed">
                    Maoni yako ni muhimu sana kwetu na yatatusaidia kuboresha bidhaa na huduma za <span class="font-bold text-purple-700">Malkia Konnect</span> ili zikidhi mahitaji yako vizuri zaidi.
                </p>
            </div>

            <!-- Stats/Info Card -->
            <div class="grid grid-cols-1 gap-4 sm:gap-5 max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-md sm:shadow-lg p-5 sm:p-6 border border-purple-100">
                    <div class="flex justify-center mb-3">
                        <div class="bg-purple-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800">Majibu Yamesave</h3>
                    <p class="text-xs text-gray-600 mt-1">Majibu yako yamehifadhiwa salama</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="/" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-purple-700 font-semibold border-2 border-purple-200 hover:border-purple-400 hover:bg-purple-50 transition-all shadow-md hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Rudi Nyumbani
                </a>
                <a href="{{ route('survey') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-gray-700 font-semibold hover:bg-gray-50 transition-all shadow-lg hover:shadow-xl border-2 border-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Jaza Survey Nyingine
                </a>
            </div>

            <!-- Social Share (Optional) -->
            <div class="pt-8 border-t border-gray-200">
                <p class="text-sm text-gray-500 mb-4">Saidia rafiki yako pia kushiriki maoni yao</p>
                <div class="flex justify-center gap-3">
                    <button onclick="shareOnWhatsApp()" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-500 text-white hover:bg-green-600 transition-all text-sm font-medium share-pulse">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function shareOnWhatsApp() {
            const text = 'Nimeshiriki maoni yangu kwenye dodoso la Malkia Konnect! Wewe pia unaweza kushiriki: ' + window.location.origin + '/survey';
            const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
            window.open(url, '_blank');
        }
        
        // Clear localStorage on success page load
        localStorage.removeItem('malkia_survey_data');
    </script>
</body>
</html>
