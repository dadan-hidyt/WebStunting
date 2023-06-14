<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\Dashboard\Pengukuran;
use \App\Http\Controllers\Dashboard\BalitaController;
use App\Http\Controllers\Dashboard\PengukuranController;

Route::get('/', HomeController::class)->name('.home');
Route::name('.balita')->prefix('/balita')->group(function (){
    Route::get('/semua.html',[BalitaController::class,'index'])->name('.semua');
    Route::get('/tambah.html',[BalitaController::class,'tambah'])->name('.tambah');
    Route::get('/{id?}/edit.html', [BalitaController::class,'edit'])->name('.edit');
    Route::get('/{id?}/hapus.html', [BalitaController::class,'hapus'])->name('.hapus');
});

Route::name('.pengukuran.')->prefix('/pengukuran')->group(function (){
    Route::get('/', [PengukuranController::class, 'index'])->name('index');
    Route::get('/{id_balita}.html', [PengukuranController::class,'ukur'])->name('ukur');
    Route::get('/{anak}/{pengukuran}/delete.html', [PengukuranController::class,'delete'])->scopeBindings()->name('delete');
});
