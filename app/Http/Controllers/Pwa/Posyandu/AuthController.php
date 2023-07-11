<?php

namespace App\Http\Controllers\Pwa\Posyandu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function daftarPosyandu(){
        return view('pwa.posyandu.register');
    }
}
