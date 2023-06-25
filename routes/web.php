<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\AuthController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\Auth\LoginController;
Route::view('/','welcome')->name('index');
//login controller
Route::get('login',LoginController::class)->middleware('guest')->name('auth.login');
Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');
/**
 * public chart
 */
Route::prefix('statistik')->name('statistik.')->group(function (){
    Route::get('/grafik/kasus', \App\Http\Controllers\Global\StatistikController::class)->name('index');
});

//dashboard
Route::prefix('dashboard')->middleware('auth',AdminMiddleware::class)->name('dashboard')->group(base_path('routes/dashboard.php'));
//for mobile app  route
Route::prefix('mobile')->name('mobile')->group(base_path('routes/mobile.php'));
//route ajax
Route::prefix('data/ajax')->name('ajax')->group(base_path('routes/ajax.php'));

?>