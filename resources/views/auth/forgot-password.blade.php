<x-guest-layout :showTopLogo="false" :fullWidth="true">
    <div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="w-full max-w-md">
            <!-- Logo/Branding -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Malkia Konnect</h1>
                <p class="text-gray-600 mt-2">Weka barua pepe yako kwa ajili ya kubadili nenosiri</p>
            </div>

            <!-- Status Message -->
            <x-auth-session-status class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg" :status="session('status')" />

            <!-- Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Barua pepe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" required autofocus 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="weka barua pepe yako">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('login') }}" class="text-sm text-purple-600 hover:underline">
                            Rudi kwenye ukurasa wa kuingia
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Tuma kiungo cha kubadili nenosiri
                        </button>
                    </div>
                </form>
        </div>
    </div>
</x-guest-layout>
