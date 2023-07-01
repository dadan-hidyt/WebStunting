
<?php

use App\Http\Controllers\Ajax\AnakAjaxController;
use App\Http\Controllers\Ajax\DataTableAkunController;
use App\Http\Controllers\Ajax\DataTableBalitaController;
use App\Http\Controllers\Ajax\DataTableIbuHamilController;
use App\Http\Controllers\Ajax\DataTableKecamatanController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Ajax\DataTableKelurahanDesa;
use App\Http\Controllers\Ajax\DataTableOrangTuaController;
use App\Http\Controllers\Ajax\DataTablePengukuranController;
use App\Http\Controllers\Ajax\DataTablePosyanduController;
use App\Http\Controllers\Ajax\GeneralAjaxHandlerController;
use App\Http\Controllers\Dashboard\ExportController;
use App\Http\Controllers\Global\StatistikController;
Route::get('ibu-hamik/getData', [DataTableIbuHamilController::class,'index'])->name('.ibu-hamil.getData');
Route::get('balita',[DataTableBalitaController::class,'index'])->name('.balita.semua');
Route::get('hasil-pengukuran',[DataTablePengukuranController::class,'index'])->name('.pengukuran.semua');
Route::get('balita/stunting',[DataTableBalitaController::class,'getDataStunting'])->name('.balita.getDataStunting');
Route::get('kecamatan', [DataTableKecamatanController::class,'index'])->name('.kecamatan.semua');
Route::get('akun/get', [DataTableAkunController::class,'index'])->name('.akun.get');
Route::get('kabupaten-kota', [\App\Http\Controllers\Ajax\DataTableKabupatenKota::class,'index'])->name('.kabupaten_kota.semua');
Route::get('kab-kota/get', [GeneralAjaxHandlerController::class,'getStatPengukuranByKabupaten'])->name('.kabupaten_kota.get');
Route::get('kelurahan-desa', [DataTableKelurahanDesa::class,'index'])->name('.kelurahan-desa.semua');
Route::get('posyandu', [DataTablePosyanduController::class,'index'])->name('.posyandu.semua');
Route::get('orang-tua', [DataTableOrangTuaController::class,'index'])->name('.orang-tua.semua');
Route::get('anak/getAnak/{anak?}', [AnakAjaxController::class,'getAnakById'])->name('.anak.getAnak');
Route::get('/export/balita',[ExportController::class,'exportBalita'])->name('.export.export-balita');
Route::get('/export/pengukuran',[ExportController::class,'exportPengukuran'])->name('.export.export-pengukuran');

//ajax statistik
Route::get('/statistik/grafik/kab-kota/stat_by_umur',[\App\Http\Controllers\Global\StatistikController::class,'getByUmur'])->name('.statistik.byUmur');
Route::get('/statistik/grafik/kab-kota/stat_by_jenis_kelamin',[\App\Http\Controllers\Global\StatistikController::class,'getByJenisKelamin'])->name('.statistik.byJenisKelamin');
Route::get('/statistik/grafik/kab-kota/prevalensi',[\App\Http\Controllers\Global\StatistikController::class,'prevalensi'])->name('.statistik.prevalensi');
Route::get('/statistik/grafik/kab-kota/stat_by_kecamatan',[\App\Http\Controllers\Global\StatistikController::class,'byKecamatan'])->name('.statistik.byKecamatan');

//get detail kurva
Route::get('/kurva/get_detail_bb', [StatistikController::class,'getDetailKurvaBb'])->name('.detail_kurva_bb');
Route::get('/kurva/get_detail_tb', [StatistikController::class,'getDetailKurvaTb'])->name('.detail_kurva_tb');
