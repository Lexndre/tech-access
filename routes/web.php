<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

Route::get('/', [SurveyController::class, 'index'])->name('survey.index');
Route::post('/submit', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/thank-you', [SurveyController::class, 'thankYou'])->name('survey.thank-you');
