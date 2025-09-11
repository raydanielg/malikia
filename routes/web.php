<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MotherIntakeController;
use App\Models\Testimonial;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $testimonials = Testimonial::query()->latest()->take(10)->get();
    return view('home', compact('testimonials'));
});

Route::get('/services', function () {
    return view('services.index');
})->name('services');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
