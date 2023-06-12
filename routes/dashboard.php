<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\Dashboard\BalitaController;
Route::get('/', HomeController::class)->name('.home');
Route::name('.balita')->prefix('/balita')->group(function (){
    Route::get('/',[BalitaController::class,'index'])->name('.semua');
    Route::get('/tambah',[BalitaController::class,'tambah'])->name('.tambah');
})->name('.balita');
