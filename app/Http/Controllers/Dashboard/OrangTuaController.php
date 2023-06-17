<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    public function index(){
        return view('dashboard.data-master.orang-tua.tampil', [
            'title' => "Orang Tua",
        ]);
    }
    public function delete(){

    }
    public function edit(){

    }
    public function tambah(){
        return view('dashboard.data-master.orang-tua.tambah',[
            'title' => "Tambah Orang Tua"
        ]);
    }
}
