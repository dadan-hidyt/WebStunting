<?php

namespace App\Http\Controllers\Pwa\IbuHamil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function riwayat(){
        return view('pwa.ibu_hamil.riwayat_pengukuran');
    }
    public function tambah_pengukuran(){
        return view('pwa.ibu_hamil.tambah_pengukuran');
    }
}
