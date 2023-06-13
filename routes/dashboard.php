<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\Dashboard\BalitaController;
Route::get('/', HomeController::class)->name('.home');
Route::name('.balita')->prefix('/balita')->group(function (){
    Route::get('/semua.html',[BalitaController::class,'index'])->name('.semua');
    Route::get('/tambah.html',[BalitaController::class,'tambah'])->name('.tambah');
    Route::get('/{id?}/edit.html', [BalitaController::class,'edit'])->name('.edit');
    Route::get('/{id?}/hapus.html', [BalitaController::class,'hapus'])->name('.hapus');
})->name('.balita');
