<?php

use App\Http\Controllers\Dashboard\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Dashboard\Pengukuran;
use App\Http\Controllers\Dashboard\BalitaController;
use App\Http\Controllers\Dashboard\ExportController;
use App\Http\Controllers\Dashboard\IbuHamilController;
use App\Http\Controllers\Dashboard\KabupatenKotaController;
use App\Http\Controllers\Dashboard\KecamatanController;
use App\Http\Controllers\Dashboard\PengukuranController;
use App\Http\Controllers\Dashboard\KelurahanDesaController;
use App\Http\Controllers\Export\ExportBalitaController;
use App\Http\Controllers\Dashboard\OrangTuaController;
use App\Http\Controllers\Dashboard\PosyanduPembinaController;
use App\Http\Controllers\Import\ImportBalitaController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Models\KabupatenKota;

Route::get('/', HomeController::class)->name('.home');
Route::name('.balita')->prefix('/balita')->group(function () {
    Route::get('/semua', [BalitaController::class, 'index'])->name('.semua');
    Route::get('/tambah', [BalitaController::class, 'tambah'])->name('.tambah');
    Route::get('/{id?}/edit', [BalitaController::class, 'edit'])->name('.edit');
    Route::get('/{id?}/hapus', [BalitaController::class, 'hapus'])->name('.hapus');
    Route::get('/stunting', [BalitaController::class, 'balitaStunting'])->name('.stunting');
    Route::get('/grafik/{anak}', [BalitaController::class, 'grafik'])->name('.grafik')->scopeBindings();
});

Route::name('.export.')->prefix('data/export')->group(function () {
    Route::get('/balita/semua', [ExportBalitaController::class, 'excel'])->name('semua.excel');
});

Route::name('.data-master.')->prefix('data/master')->group(function () {
    Route::get('/kacamatan', [KecamatanController::class, 'index'])->name('kecamatan');
    Route::get('/kecamatan/{kecamatan?}/hapus', [KecamatanController::class, 'hapus'])->name('kecamatan.hapus');
    Route::get('/kecamatan/{kecamatan?}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::get('/kecamatan/tambah', [KecamatanController::class, 'tambah'])->name('kecamatan.tambah');


    Route::prefix('kelurahan-desa')->name('kelurahan_desa')->group(function () {
        Route::get('/', KelurahanDesaController::class);
        Route::get('tambah', [KelurahanDesaController::class, 'tambah'])->name('.tambah');
        Route::get('/{kelurahanDesa}/delete', [KelurahanDesaController::class, 'delete'])->name('.delete');
        Route::get('/{kelurahanDesa}/edit', [KelurahanDesaController::class, 'edit'])->name('.edit');
    });

    Route::prefix('kabupaten-kota')->name('kabupaten_kota')->group(function () {
        Route::get('/', [KabupatenKotaController::class, 'index']);
        Route::get('tambah', [KabupatenKotaController::class, 'tambah'])->name('.tambah');
        Route::get('/{kabupatenKota}/delete', [KabupatenKotaController::class, 'delete'])->name('.delete');
        Route::get('/{kabupatenKota}/edit', [KabupatenKotaController::class, 'edit'])->name('.edit');
    });
    Route::prefix('posyandu')->name('posyandu')->group(function () {
        Route::get('/', [PosyanduPembinaController::class, 'index']);
        Route::get('tambah', [PosyanduPembinaController::class, 'tambah'])->name('.tambah');
        Route::get('/{posyanduPembina}/delete', [PosyanduPembinaController::class, 'delete'])->name('.delete');
        Route::get('/{posyanduPembina}/edit', [PosyanduPembinaController::class, 'edit'])->name('.edit');
    });

    Route::prefix('orang-tua')->name('orang_tua')->group(function () {
        Route::get('/', [OrangTuaController::class, 'index']);
        Route::get('tambah', [OrangTuaController::class, 'tambah'])->name('.tambah');
        Route::get('/{orangTua}/delete', [OrangTuaController::class, 'delete'])->name('.delete');
        Route::get('/{orangTua}/edit', [OrangTuaController::class, 'edit'])->name('.edit');
    });
});

Route::name('.pengukuran.')->prefix('/pengukuran')->group(function () {
    Route::get('/hasil-analisa/{anak}/{pengukuran}', [PengukuranController::class, 'hasilAnalisa'])->scopeBindings()->name('hasil_analisa');
    Route::get('/hasil-pengukuran', [PengukuranController::class, 'hasilPengukuran'])->name('hasil-pengukuran');
    Route::get('/input-pengukuran', [PengukuranController::class, 'inputPengukuranByNik'])->name('input-pengukuran');
    Route::get('/', [PengukuranController::class, 'index'])->name('index');
    Route::get('/{anak}', [PengukuranController::class, 'ukur'])->name('ukur');
    Route::get('/{anak}/{pengukuran}/delete', [PengukuranController::class, 'delete'])->scopeBindings()->name('delete');
});

Route::prefix('/export-import')->name('.export-import.')->group(function () {
    Route::view('/', 'dashboard.export-import.index', [
        'kabupaten_kota' => KabupatenKota::all(),
    ])->name('index');
    Route::get('/import/import-balita', [ImportBalitaController::class, 'index'])->name('import-balita');
    Route::post('/import/import-balita', [ImportBalitaController::class, 'index'])->name('import-balita-post');
});

Route::middleware(SuperAdminMiddleware::class)->group(function () {
    Route::prefix('manage/user')->name('.akun.')->group(function () {
        Route::get('/', [AkunController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [AkunController::class, 'edit'])->scopeBindings()->name('edit');
        Route::get('/{user}/delete', [AkunController::class, 'delete'])->scopeBindings()->name('delete');
    Route::get('/{user}/change_active',[AkunController::class,'changeActive'])->name('change_active');
    });
});

Route::prefix('/ibu-hamil')->name('.ibu-hamil.')->group(function(){
    Route::get('/', [IbuHamilController::class,'index'])->name('index');
    Route::get('/tambah', [IbuHamilController::class,'tambah'])->name('tambah');
    Route::get('/{ibuHamil}/edit', [IbuHamilController::class,'edit'])->name('edit');
    Route::get('/{ibuHamil}/delete', [IbuHamilController::class,'delete'])->name('delete');
    Route::get('/{ibuHamil}/pengukuran', [IbuHamilController::class,'pegukuran'])->name('pengukuran');
    Route::get('/{ibuHamil}/pengukuran/{pengukuranIbuHamil}/delete', [IbuHamilController::class,'deletePengukuran'])->name('deletePengukuran');
});