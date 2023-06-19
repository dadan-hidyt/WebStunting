
<?php

use App\Http\Controllers\Ajax\AnakAjaxController;
use App\Http\Controllers\Ajax\DataTableBalitaController;
use App\Http\Controllers\Ajax\DataTableKecamatanController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Ajax\DataTableKelurahanDesa;
use App\Http\Controllers\Ajax\DataTableOrangTuaController;
use App\Http\Controllers\Ajax\DataTablePengukuranController;
use App\Http\Controllers\Ajax\DataTablePosyanduController;
use App\Http\Controllers\Dashboard\ExportController;

Route::get('balita',[DataTableBalitaController::class,'index'])->name('.balita.semua');
Route::get('hasil-pengukuran',[DataTablePengukuranController::class,'index'])->name('.pengukuran.semua');
Route::get('balita/stunting',[DataTableBalitaController::class,'getDataStunting'])->name('.balita.getDataStunting');
Route::get('kecamatan', [DataTableKecamatanController::class,'index'])->name('.kecamatan.semua');
Route::get('kabupaten-kota', [\App\Http\Controllers\Ajax\DataTableKabupatenKota::class,'index'])->name('.kabupaten_kota.semua');
Route::get('kelurahan-desa', [DataTableKelurahanDesa::class,'index'])->name('.kelurahan-desa.semua');
Route::get('posyandu', [DataTablePosyanduController::class,'index'])->name('.posyandu.semua');
Route::get('orang-tua', [DataTableOrangTuaController::class,'index'])->name('.orang-tua.semua');
Route::get('anak/getAnak/{anak?}', [AnakAjaxController::class,'getAnakById'])->name('.anak.getAnak');
Route::get('/export/balita',[ExportController::class,'exportBalita'])->name('.export.export-balita');
Route::get('/export/pengukuran',[ExportController::class,'exportPengukuran'])->name('.export.export-pengukuran');