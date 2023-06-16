<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Dashboard\Pengukuran;
use App\Http\Controllers\Dashboard\BalitaController;
use App\Http\Controllers\Dashboard\KabupatenKotaController;
use App\Http\Controllers\Dashboard\KecamatanController;
use App\Http\Controllers\Dashboard\PengukuranController;
use App\Http\Controllers\Dashboard\KelurahanDesaController;
use App\Http\Controllers\Export\ExportBalitaController;
use App\Http\Controllers\Dashboard\OrangTuaController;
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
        Route::get('tambah.html',[KelurahanDesaController::class,'tambah'])->name('.tambah');
        Route::get('/{kelurahanDesa}/delete.html', [KelurahanDesaController::class,'delete'])->name('.delete');
        Route::get('/{kelurahanDesa}/edit.html', [KelurahanDesaController::class,'edit'])->name('.edit');
    });

    Route::prefix('kabupaten-kota')->name('kabupaten_kota')->group(function (){
        Route::get('/', [KabupatenKotaController::class,'index']);
        Route::get('tambah.html',[KabupatenKotaController::class,'tambah'])->name('.tambah');
        Route::get('/{kabupatenKota}/delete.html', [KabupatenKotaController::class,'delete'])->name('.delete');
        Route::get('/{kabupatenKota}/edit.html', [KabupatenKotaController::class,'edit'])->name('.edit');
    });

    Route::prefix('orang-tua')->name('orang_tua')->group(function (){
        Route::get('/', [OrangTuaController::class,'index']);
        Route::get('tambah.html',[OrangTuaController::class,'tambah'])->name('.tambah');
        Route::get('/{kelurahanDesa}/delete.html', [OrangTuaController::class,'delete'])->name('.delete');
        Route::get('/{kelurahanDesa}/edit.html', [OrangTuaController::class,'edit'])->name('.edit');
    });



});

Route::name('.pengukuran.')->prefix('/pengukuran')->group(function (){
    Route::get('/hasil-analisa/{anak}/{pengukuran}.html',[PengukuranController::class,'hasilAnalisa'])->scopeBindings()->name('hasil_analisa');
    Route::get('/hasil-pengukuran.html', [PengukuranController::class,'hasilPengukuran'])->name('hasil-pengukuran');
    Route::get('/input-pengukuran.html', [PengukuranController::class,'inputPengukuranByNik'])->name('input-pengukuran');
    Route::get('/', [PengukuranController::class, 'index'])->name('index');
    Route::get('/{anak}.html', [PengukuranController::class,'ukur'])->name('ukur');
    Route::get('/{anak}/{pengukuran}/delete.html', [PengukuranController::class,'delete'])->scopeBindings()->name('delete');
});

