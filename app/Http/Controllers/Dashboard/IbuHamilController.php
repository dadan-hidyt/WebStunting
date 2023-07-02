<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IbuHamilController extends Controller
{
    public function index(){
        return view('dashboard.ibu-hamil.index')->with('title',"Ibu Hamil");
    }
    public function tambah(){
        return view('dashboard.ibu-hamil.tambah')->with('title',"Tambah Data");
    }
    public function edit( IbuHamil $ibuHamil ){
        return view('dashboard.ibu-hamil.edit',compact('ibuHamil'))->with('title',"Tambah Data");
    }
    public function delete(IbuHamil $ibuHamil) {
        if ( $ibuHamil && $ibuHamil->delete() ) {
            return Redirect::back()->with('berhasil',"Data berhasil di hapus!");
        }
    }
    public function pegukuran(IbuHamil $ibuHamil) {
        return view('dashboard.ibu-hamil.pengukuran',compact('ibuHamil'))->with('title',"Pengukuran");
    }
}
