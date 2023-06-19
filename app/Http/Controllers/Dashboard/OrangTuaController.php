<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrangTua;
class OrangTuaController extends Controller
{
    public function index(){
        return view('dashboard.data-master.orang-tua.tampil', [
            'title' => "Orang Tua",
        ]);
    }
    public function delete( OrangTua $orangTua ){
        if ( $orangTua->delete() ) {
          return redirect()->route('dashboard.data-master.orang_tua')->with(
            'notifikasi',
            [
             'type'=>'success',
             'msg' => 'Data Orang Tua Berhasil Di Hapus!'
         ]
     );
      } else {
          return redirect()->route('dashboard.data-master.orang_tua')->with(
            'notifikasi',
            [
               'type'=>'danger',
               'msg' => 'Data Orang Tua Gagal Di Hapus!'
           ]
       );
      }
  }
  public function edit(OrangTua $orangTua){
    return view('dashboard.data-master.orang-tua.edit',[
        'title' => "Edit Orang Tua",
        'orangTua' => $orangTua,
    ]);
}
public function tambah(){
    return view('dashboard.data-master.orang-tua.tambah',[
        'title' => "Tambah Orang Tua"
    ]);
}
}
