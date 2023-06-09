<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\AuthController;

Route::get('login',[AuthController::class,'showLoginForm'])->name('auth.login');

Route::prefix('dashboard')->name('dashboard')->group(base_path('routes/dashboard.php'));
Route::prefix('mobile')->name('mobile')->group(base_path('routes/mobile.php'));
