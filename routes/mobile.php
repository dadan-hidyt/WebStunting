<?php

use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Pwa\IndexController;
use App\Http\Controllers\Pwa\LoginController;
use App\Http\Controllers\Pwa\Masyarakat\AuthController as MasyarakatAuthController;
use App\Http\Controllers\Pwa\Masyarakat\PageController;
use App\Http\Middleware\LogedinMasyarakatMiddleware;
use App\Http\Middleware\MobileMasyarakatMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('.index');

Route::middleware(LogedinMasyarakatMiddleware::class)->get('/login', [LoginController::class, 'showLoginForm'])->name('.login');

Route::middleware(LogedinMasyarakatMiddleware::class)->get('/masyarkaat/register',MasyarakatAuthController::class)->name('.masyarakat.register');

Route::get('/homepage', [IndexController::class, 'showHomePage'])->name('.homepage');

Route::prefix('masyarakat')->middleware([MobileMasyarakatMiddleware::class])->name('.masyarakat.')->group(function () {
    Route::get('/data_anak',[PageController::class,'dataAnak'])->name('data_anak');
    Route::get('/detail_anak/{anak}',[PageController::class,'detailAnak'])->name('detail_anak');
    Route::get('/{anak}/riwayat_bb',[PageController::class,'riwayatBB'])->name('riwayat_bb');
    Route::get('/{anak}/riwayat_panjang_badan',[PageController::class,'riwayatPB'])->name('riwayat_pb');
});
