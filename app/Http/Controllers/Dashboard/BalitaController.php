<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index(){
        return view('dashboard.balita.semua',[
            'title' => "Balita",
        ]);
    }

    public function tambah(){
        return view('dashboard.balita.tambah',[
            'title' => "Tambah Balita"
        ]);
    }

}
