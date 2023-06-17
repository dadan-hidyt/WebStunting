<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosyanduPembinaController extends Controller
{
    public function index(){
        return view('dashboard.data-master.posyandu.tampil', ['title'=>"Posyandu"]);
    }
}
