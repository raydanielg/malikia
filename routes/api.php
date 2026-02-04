<?php

use App\Http\Controllers\MotherIntakeApiController;
use App\Http\Controllers\SurveyResponseApiController;
use Illuminate\Support\Facades\Route;

Route::get('/mother-intakes', [MotherIntakeApiController::class, 'index']);
Route::get('/mother-intakes/{motherIntake}', [MotherIntakeApiController::class, 'show']);

Route::get('/survey-responses', [SurveyResponseApiController::class, 'index']);
Route::get('/survey-responses/{surveyResponse}', [SurveyResponseApiController::class, 'show']);
