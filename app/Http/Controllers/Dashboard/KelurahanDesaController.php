<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelurahanDesa;

class KelurahanDesaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.data-master.kelurahan-desa.tampil');
    }
    public function delete(KelurahanDesa $kelurahanDesa) {
       if ($kelurahanDesa->delete()) {
           return redirect()->route('dashboard.data-master.kelurahan_desa')->with('notifikasi',[
            'type' => 'success',
            'msg'=>"Data desa berhasil di hapus!"]);
       } else {
         return redirect()->route('dashboard.data-master.kelurahan_desa')->with('notifikasi',[
            'type' => 'danger',
            'msg'=>"Data desa gagal di hapus!"]);
       }
    }
    public function edit(KelurahanDesa $kelurahanDesa) {
        return view('dashboard.data-master.kelurahan-desa.edit',compact('kelurahanDesa'));
    }
    public function tambah(){
        return view('dashboard.data-master.kelurahan-desa.tambah',[
            'title'=>"Tambah Kelurahan Desa"]
        );
    }
}
