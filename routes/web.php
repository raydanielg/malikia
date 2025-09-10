<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MotherIntakeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// OAuth: Google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('oauth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('oauth.google.callback');

// Intake form
Route::get('/fomu', [MotherIntakeController::class, 'create'])->name('intake.create');
Route::post('/fomu', [MotherIntakeController::class, 'store'])->name('intake.store');
Route::get('/asante', [MotherIntakeController::class, 'thankyou'])->name('intake.thankyou');
