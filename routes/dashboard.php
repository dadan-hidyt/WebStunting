<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', HomeController::class)->name('.home');
