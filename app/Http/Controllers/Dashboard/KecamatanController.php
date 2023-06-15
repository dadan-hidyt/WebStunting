<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
        return view('dashboard.data-master.kecamatan.tampil');
    }
    public function hapus(Kecamatan $kecamatan){
        if ( $kecamatan->delete() ) {
            return redirect()->route('dashboard.data-master.kecamatan')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Kecamatan Berhasil di hapus!",
            ]);
        } else {
            return redirect()->route('dashboard.data-master.kecamatan')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Kecamatan Gagal di hapus!",
            ]);
        }
    }
    public function tambah(){
        return view('dashboard.data-master.kecamatan.tambah');
    }
    public function edit(Kecamatan $kecamatan) {
        return view('dashboard.data-master.kecamatan.edit',compact('kecamatan'));
    }
}
