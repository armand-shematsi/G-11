<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('welcome');
});

//homepage
Route::get('/dashboard', function () {
    return view('dashboard');
});

//form
Route::post('/form', [ChallengeController::class, 'create'])->name('form.submit');
Route::view('/form', 'form')->name('form.show');  // This handles displaying the form

//dash
Route::get('/dashboard', [ChallengeController::class, 'index'])->name('dashboard');

//analytics
Route::get('/analytics', [AnalyticsController::class, 'index']);
Route::get('/charts', [ChartController::class, 'showCharts'])->name('charts');
