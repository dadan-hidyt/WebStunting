<?php

use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Pwa\IndexController;
use App\Http\Controllers\Pwa\LoginController;
use App\Http\Controllers\Pwa\Masyarakat\AnakController;
use App\Http\Controllers\Pwa\Masyarakat\AuthController as MasyarakatAuthController;
use App\Http\Controllers\Pwa\Masyarakat\PageController;
use App\Http\Controllers\Pwa\PengukuranController;
use App\Http\Controllers\Pwa\Posyandu\PageController as PosyanduPageController;
use App\Http\Middleware\LogedinMasyarakatMiddleware;
use App\Http\Middleware\MobileMasyarakatMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('.index');

Route::middleware(LogedinMasyarakatMiddleware::class)->get('/login', [LoginController::class, 'showLoginForm'])->name('.login');

Route::middleware(LogedinMasyarakatMiddleware::class)->get('/masyarkaat/register',MasyarakatAuthController::class)->name('.masyarakat.register');
Route::get('/posyandu/register',MasyarakatAuthController::class)->name('.posyandu.register');




Route::get('/homepage', [IndexController::class, 'showHomePage'])->name('.homepage');
Route::get('/ukur/{anak}', [PengukuranController::class, 'ukur'])->name('.ukur_bb_tb');
Route::get('/full_report_pengukuran/{anak}', [PengukuranController::class,'full_report'])->name('.full_report');
Route::get('/cek_ideal',[PageController::class,'cekIdeal'])->name('.cek_ideal');
Route::get('/detail_anak/{anak}',[PageController::class,'detailAnak'])->name('.detail_anak');
Route::get('/{anak}/riwayat_panjang_badan',[PageController::class,'riwayatPB'])->name('.riwayat_pb');
Route::get('/{anak}/riwayat_bb',[PageController::class,'riwayatBB'])->name('.riwayat_bb');
Route::get('/pengukuran', [PengukuranController::class,'pengukuran'])->name('.pengukuran_anak');



Route::prefix('masyarakat')->middleware([MobileMasyarakatMiddleware::class])->name('.masyarakat.')->group(function () {
    Route::get('/data_anak',[PageController::class,'dataAnak'])->name('data_anak');
    Route::get('/anak/tambah_data', [AnakController::class,'tambah'])->name('tambah_anak');
    Route::get('/anak/{anak}/edit', [AnakController::class,'edit'])->name('edit_anak');
    Route::get('/anak/{anak}/hapus', [AnakController::class,'hapus'])->name('hapus_anak');
});


Route::prefix('posyandu')->name('.posyandu.')->group(function(){
    Route::get('data_orang_tua',[PosyanduPageController::class,'dataOrtu'])->name('data_orang_tua');
    Route::get('data_orang_tua/new',[PosyanduPageController::class,'tambahOrangTua'])->name('tambah_orang_tua');
    Route::get('data_orang_tua/{orangTua}/edit',[PosyanduPageController::class,'editOrangTua'])->name('edit_orang_tua');
    Route::get('data_orang_tua/{orangTua}/delete',[PosyanduPageController::class,'deleteOrangTua'])->name('delete_orang_tua');
    
    Route::get('data_anak',[PosyanduPageController::class,'dataAnak'])->name('data_anak');
    Route::get('data_anak/new',[PosyanduPageController::class,'tambahAnak'])->name('tambah_anak');
    Route::get('data_anak/{anak}/edit',[PosyanduPageController::class,'editAnak'])->name('edit_anak');
    Route::get('data_anak/{anak}/delete',[PosyanduPageController::class,'deleteAnak'])->name('hapus_anak');
}); 