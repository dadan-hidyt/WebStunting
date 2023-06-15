<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
        return view('dashboard.data-master.kecamatan.tampil');
    }
    public function hapus(Kecamatan $kecamatan){
        return $kecamatan;
    }
    public function tambah(){
        return view('dashboard.data-master.kecamatan.tambah');
    }
    public function edit(Kecamatan $kecamatan) {
        return $kecamatan;
    }
}
