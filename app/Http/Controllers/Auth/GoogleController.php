<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;

class GoogleController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('status', 'Imeshindikana kuingia kwa Google. Tafadhali jaribu tena.');
        }

        // Try to find by google_id first
        $user = User::where('google_id', $googleUser->getId())->first();

        // If not found, try to match by email
        if (!$user && $googleUser->getEmail()) {
            $user = User::where('email', $googleUser->getEmail())->first();
        }

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName() ?: ($googleUser->user['given_name'] ?? 'Mtumiaji').' '.Str::random(4),
                'email' => $googleUser->getEmail() ?? Str::uuid().'@example.local',
                'password' => Hash::make(Str::random(16)),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(),
            ]);
        } else {
            // Update google fields if missing
            $user->forceFill([
                'google_id' => $user->google_id ?: $googleUser->getId(),
                'avatar' => $googleUser->getAvatar() ?: $user->avatar,
            ])->save();

            if (is_null($user->email_verified_at) && $googleUser->getEmail()) {
                $user->forceFill(['email_verified_at' => now()])->save();
            }
        }

        Auth::login($user, true);

        return redirect()->intended(route('dashboard'));
    }
}
