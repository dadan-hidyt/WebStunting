<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    public function index(){
        return view('dashboard.data-master.kabupaten_kota.tampil');
    }
    public function tambah(){
        return view('dashboard.data-master.kabupaten_kota.tambah');
    }
    public function edit(KabupatenKota $kabupatenKota){
        return view('dashboard.data-master.kabupaten_kota.edit',compact('kabupatenKota'));
    }
    public function delete(){

    }
}
