@extends('panel.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Usimamizi wa Watumiaji</h1>
            <p class="text-sm text-gray-500">Ongeza na simamia watumiaji. Wote wana ufikiaji wa admin.</p>
        </div>
        <a href="{{ route('panel') }}" class="text-sm text-blue-600 hover:underline">← Rudi Dashboard</a>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Add Admin Form -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow border p-5">
                <h2 class="font-semibold text-gray-800 mb-4">Ongeza Mtumiaji (Admin)</h2>
                <form method="POST" action="{{ route('panel.users.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-600">Jina Kamili</label>
                        <input type="text" name="name" class="mt-1 w-full border rounded-md px-3 py-2" required value="{{ old('name') }}" />
                        @error('name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Barua Pepe</label>
                        <input type="email" name="email" class="mt-1 w-full border rounded-md px-3 py-2" required value="{{ old('email') }}" />
                        @error('email')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Namba ya Simu (hiari)</label>
                        <input type="text" name="phone" class="mt-1 w-full border rounded-md px-3 py-2" value="{{ old('phone') }}" />
                        @error('phone')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Nenosiri (ukiacha tupu litatengenezwa)</label>
                        <input type="text" name="password" class="mt-1 w-full border rounded-md px-3 py-2" />
                        @error('password')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold px-4 py-2 rounded">Hifadhi</button>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow border overflow-hidden">
                <div class="px-5 py-4 border-b">
                    <form method="GET" action="{{ route('panel.users.index') }}" class="flex items-center gap-3">
                        <input type="text" name="q" value="{{ $q }}" placeholder="Tafuta jina/barua pepe/simu" class="flex-1 border rounded-md px-3 py-2" />
                        <button class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded">Tafuta</button>
                    </form>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jina</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Barua Pepe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Simu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Imethibitishwa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Imeundwa</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->email_verified_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $user->email_verified_at ? 'Ndiyo' : 'Hapana' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ optional($user->created_at)->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Hakuna watumiaji bado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-5 py-4 border-t bg-gray-50">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
