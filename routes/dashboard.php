<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Dashboard\Pengukuran;
use App\Http\Controllers\Dashboard\BalitaController;
use App\Http\Controllers\Dashboard\KecamatanController;
use App\Http\Controllers\Dashboard\PengukuranController;
use App\Http\Controllers\Dashboard\KelurahanDesaController;
use App\Http\Controllers\Export\ExportBalitaController;

Route::get('/', HomeController::class)->name('.home');
Route::name('.balita')->prefix('/balita')->group(function (){
    Route::get('/semua.html',[BalitaController::class,'index'])->name('.semua');
    Route::get('/tambah.html',[BalitaController::class,'tambah'])->name('.tambah');
    Route::get('/{id?}/edit.html', [BalitaController::class,'edit'])->name('.edit');
    Route::get('/{id?}/hapus.html', [BalitaController::class,'hapus'])->name('.hapus');
    Route::get('/stunting.html', [BalitaController::class,'balitaStunting'])->name('.stunting');
    Route::get('/grafik/{anak}.html', [BalitaController::class, 'grafik'])->name('.grafik')->scopeBindings();
});

Route::name('.export.')->prefix('data/export')->group(function(){
    Route::get('/balita/semua.html',[ExportBalitaController::class,'excel'])->name('semua.excel');
});

Route::name('.data-master.')->prefix('data/master')->group(function(){
    Route::get('/kacamatan.html',[KecamatanController::class,'index'])->name('kecamatan');
    Route::get('/kecamatan/{kecamatan?}/hapus.html',[KecamatanController::class,'hapus'])->name('kecamatan.hapus');
    Route::get('/kecamatan/{kecamatan?}/edit.html',[KecamatanController::class,'edit'])->name('kecamatan.edit');
    Route::get('/kecamatan/tambah.html',[KecamatanController::class,'tambah'])->name('kecamatan.tambah');


    Route::prefix('kelurahan-desa')->name('kelurahan_desa')->group(function (){
        Route::get('/', KelurahanDesaController::class);
    });



});

Route::name('.pengukuran.')->prefix('/pengukuran')->group(function (){
    Route::get('/', [PengukuranController::class, 'index'])->name('index');
    Route::get('/{anak}.html', [PengukuranController::class,'ukur'])->name('ukur');
    Route::get('/{anak}/{pengukuran}/delete.html', [PengukuranController::class,'delete'])->scopeBindings()->name('delete');
});
