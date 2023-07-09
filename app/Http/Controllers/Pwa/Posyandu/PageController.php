<?php

namespace App\Http\Controllers\Pwa\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function dataOrtu(){
       return view('pwa.posyandu.data-orang-tua');
    }
    public function tambah(){
        return view('pwa.posyandu.tambah-orang-tua');
    }
    public function edit(OrangTua $orangTua){
        return view('pwa.posyandu.edit-orang-tua')->with('orangTua',$orangTua);
    }
    public function delete(OrangTua $orangTua){
        if ($orangTua->delete()) {
            return Redirect::route('mobile.posyandu.data_orang_tua')->with('message','Data berhasil di hapuss');
        } else{
            return Redirect::route('mobile.posyandu.data_orang_tua')->with('message','Data gagal di hapuss');
        }
    }
}
