<?php

namespace App\Http\Controllers\Pwa\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnakController extends Controller
{
    public function tambah(){
        return view('pwa.masyarakat.tambah_anak')->with('title',"Tambah Anak");
    }
    public function edit(Anak $anak) {
        return view('pwa.masyarakat.edit')->with('anak',$anak);
    }
    public function hapus(Anak $anak) {
        if ( $anak->orang_tua_id === auth()->user()->orangTua->id ) {
            if ( $anak->delete() ) {
                return Redirect::to(route('mobile.masyarakat.data_anak'));
            } else {
                return Redirect::back();
            }
        }
        return view('pwa.masyarakat.edit')->with('anak',$anak);
    }
}
