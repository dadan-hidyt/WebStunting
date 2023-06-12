<?php

use App\Http\Controllers\Ajax\DataTableBalitaController;
use Illuminate\Support\Facades\Route;
Route::get('balita',[DataTableBalitaController::class,'index'])->name('.balita.getData');
