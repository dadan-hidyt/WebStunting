
<?php

use App\Http\Controllers\Ajax\DataTableBalitaController;
use Illuminate\Support\Facades\Route;
Route::get('balita',[DataTableBalitaController::class,'index'])->name('.balita.semua');
Route::get('balita/stunting',[DataTableBalitaController::class,'getDataStunting'])->name('.balita.getDataStunting');
