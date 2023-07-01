<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    public function index(){
        return view('dashboard.ibu-hamil.index')->with('title',"Ibu Hamil");
    }
    public function tambah(){
        return view('dashboard.ibu-hamil.tambah')->with('title',"Tambah Data");
    }
}
