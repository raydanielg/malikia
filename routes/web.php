<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MotherIntakeController;
use App\Models\Testimonial;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

// Company pages
Route::get('/team', function () {
    return view('team.index');
})->name('team');

// Survey page
Route::get('/survey', function () {
    return view('survey.index');
})->name('survey');

Route::post('/survey', function (Request $request) {
    $validated = $request->validate([
        'full_name' => ['required', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:25'],
        'email' => ['nullable', 'email', 'max:255'],
        'journey_stage' => ['required', 'in:pregnant,postpartum,ttc'],
        'experience_rating' => ['required', 'integer', 'min:1', 'max:5'],
        'recommend_score' => ['nullable', 'integer', 'min:0', 'max:10'],
        'feedback' => ['nullable', 'string', 'max:5000'],
    ]);

    // For now we just acknowledge; storage/notifications can be added later

    return back()->with('survey_ok', 'Asante kwa kushiriki kwenye survey yetu. Maoni yako yatatusaidia kuboresha huduma zetu.');
})->name('survey.submit');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/panel', [App\Http\Controllers\PanelController::class, 'index'])->name('panel');

// Panel Routes
Route::middleware(['auth', 'verified'])->prefix('panel')->name('panel.')->group(function () {
    Route::post('/intake/{intake}/complete', [App\Http\Controllers\PanelController::class, 'markAsCompleted'])->name('intake.complete');
    Route::post('/intake/{intake}/review', [App\Http\Controllers\PanelController::class, 'markAsReviewed'])->name('intake.review');
    Route::get('/intake/{intake}', [App\Http\Controllers\PanelController::class, 'showDetails'])->name('intake.details');
    Route::delete('/intake/{intake}', [App\Http\Controllers\PanelController::class, 'destroy'])->name('intake.destroy');
    Route::get('/intakes', [App\Http\Controllers\PanelController::class, 'listIntakes'])->name('intakes.index');
    Route::get('/export/excel', [App\Http\Controllers\PanelController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export/csv', [App\Http\Controllers\PanelController::class, 'exportCSV'])->name('export.csv');

    // Reports
    Route::get('/reports', [App\Http\Controllers\PanelController::class, 'reports'])->name('reports');
    Route::get('/reports/csv', [App\Http\Controllers\PanelController::class, 'reportsCsv'])->name('reports.csv');
    Route::get('/reports/pdf', [App\Http\Controllers\PanelController::class, 'reportsPdf'])->name('reports.pdf');

    // User management routes
    Route::post('/user/{user}/toggle-status', [App\Http\Controllers\PanelController::class, 'toggleUserStatus'])->name('user.toggle');
    Route::get('/user/{user}', [App\Http\Controllers\PanelController::class, 'showUserDetails'])->name('user.details');
    Route::get('/users', [App\Http\Controllers\PanelController::class, 'usersIndex'])->name('users.index');
    Route::post('/users', [App\Http\Controllers\PanelController::class, 'usersStore'])->name('users.store');

    // System management routes
    Route::post('/send-notification', [App\Http\Controllers\PanelController::class, 'sendNotification'])->name('notification.send');
    Route::get('/system-health', [App\Http\Controllers\PanelController::class, 'systemHealth'])->name('system.health');
    Route::post('/clear-cache', [App\Http\Controllers\PanelController::class, 'clearCache'])->name('cache.clear');
    Route::get('/backup-database', [App\Http\Controllers\PanelController::class, 'backupDatabase'])->name('backup.database');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/auth', [\App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/auth', [\App\Http\Controllers\Auth\AuthController::class, 'login']);

    // Password reset routes
    Route::get('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware(['auth'])->group(function () {
    // Password Update Route
    Route::put('/password/update', [\App\Http\Controllers\Auth\AuthController::class, 'updatePassword'])->name('password.update');

    // Logout Route
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])
        ->name('logout');
});

// Intake form
Route::get('/join', [MotherIntakeController::class, 'create'])->name('intake.create');
Route::post('/join', [MotherIntakeController::class, 'store'])->name('intake.store');
Route::get('/asante', [MotherIntakeController::class, 'thankyou'])->name('intake.thankyou');

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
