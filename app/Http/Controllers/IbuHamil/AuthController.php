<?php

namespace App\Http\Controllers\IbuHamil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function daftarIbuHamil(){
        return view('pwa.ibu_hamil.register')->with('title', "Daftar Ibu Hamil");
    }
}
