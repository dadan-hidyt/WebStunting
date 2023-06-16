<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelurahanDesaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.data-master.kelurahan-desa.tampil');
    }
    public function tambah(){
        return view('dashboard.data-master.kelurahan-desa.tambah',[
            'title'=>"Tambah Kelurahan Desa"]
        );
    }
}
