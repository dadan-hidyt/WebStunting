<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\AuthController;
use App\Http\Middleware\AdminMiddleware;

Route::get('login',[AuthController::class,'showLoginForm'])->name('auth.login');

Route::prefix('dashboard')->middleware('auth',AdminMiddleware::class)->name('dashboard')->group(base_path('routes/dashboard.php'));
Route::prefix('mobile')->name('mobile')->group(base_path('routes/mobile.php'));
