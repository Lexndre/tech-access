<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', [SurveyController::class, 'index'])->name('survey.index');
Route::post('/submit', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/thank-you', [SurveyController::class, 'thankYou'])->name('survey.thank-you');
