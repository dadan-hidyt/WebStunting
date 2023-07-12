<?php

namespace App\Http\Controllers\Pwa\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\OrangTua;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function dataOrtu(){
       return view('pwa.posyandu.data-orang-tua');
    }
    public function tambahOrangTua(){
        return view('pwa.posyandu.tambah-orang-tua');
    }
    public function editOrangTua(OrangTua $orangTua){
        return view('pwa.posyandu.edit-orang-tua')->with('orangTua',$orangTua);
    }
    public function tambahAnak(){
        return view('pwa.posyandu.tambah-anak')->with('title','Tambah anak');
    }

    public function exportData(){
        return view('pwa.posyandu.export');
    }

    public function deleteOrangTua(OrangTua $orangTua){
        if ($orangTua->delete()) {
            return Redirect::route('mobile.posyandu.data_orang_tua')->with('message','Data berhasil di hapuss');
        } else{
            return Redirect::route('mobile.posyandu.data_orang_tua')->with('message','Data gagal di hapuss');
        }
    }

    public function editAnak(Anak $anak){
        return view('pwa.posyandu.edit-anak')->with('anak',$anak);
    }
    
    function deleteAnak (Anak $anak) {
        if ( $anak->orangTua->posyandu->id === auth()->user()->posyandu->id ) {
           try {
            $anak->delete();
           return Redirect::route('mobile.posyandu.data_anak');
           } catch (\Throwable $th) {
                abort(500);
           }
        }
    }

    function dataAnak() : View {
        return view( 'pwa.posyandu.data-anak' );
    }
}
