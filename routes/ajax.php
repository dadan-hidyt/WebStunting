
<?php

use App\Http\Controllers\Ajax\DataTableBalitaController;
use Illuminate\Support\Facades\Route;
Route::get('balita',[DataTableBalitaController::class,'index'])->name('.balita.getDataStunting');
Route::get('balita/stunting',[DataTableBalitaController::class,'getDataStunting'])->name('.balita.getData');
