<?php

use App\Http\Controllers\MotherIntakeApiController;
use Illuminate\Support\Facades\Route;

Route::get('/mother-intakes', [MotherIntakeApiController::class, 'index']);
Route::get('/mother-intakes/{motherIntake}', [MotherIntakeApiController::class, 'show']);
