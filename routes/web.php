<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\AuthController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\Auth\LoginController;
Route::view('/','welcome')->name('index');
//login controller
Route::get('login',LoginController::class)->middleware('guest')->name('auth.login');

Route::prefix('statistik')->name('statistik.')->group(function (){
    Route::get('/grafik.html', \App\Http\Controllers\Global\StatistikController::class);
});

//dashboard
Route::prefix('dashboard')->middleware('auth',AdminMiddleware::class)->name('dashboard')->group(base_path('routes/dashboard.php'));
Route::prefix('mobile')->name('mobile')->group(base_path('routes/mobile.php'));
Route::prefix('data/ajax')->name('ajax')->group(base_path('routes/ajax.php'));
