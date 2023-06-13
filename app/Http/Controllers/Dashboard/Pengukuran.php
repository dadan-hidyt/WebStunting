<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class Pengukuran extends Controller
{
    public function index($id = null){
        $balita = Anak::with(['orangTua'])->findOrFail($id)->first();
        return view('dashboard.pengukuran.index',compact('balita'));
    }
}
