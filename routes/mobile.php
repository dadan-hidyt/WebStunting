<?php

use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Pwa\IndexController;
use App\Http\Controllers\Pwa\LoginController;
use App\Http\Controllers\Pwa\Masyarakat\AuthController as MasyarakatAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('.index');
Route::get('/login.html', [LoginController::class, 'showLoginForm'])->name('.login');
Route::get('/homepage.html', [IndexController::class, 'showHomePage'])->name('.homepage');


Route::prefix('masyarakat')->name('.masyarakat.')->group(function () {
    Route::get('/register.html',MasyarakatAuthController::class)->name('register');
});
