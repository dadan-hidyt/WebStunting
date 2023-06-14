<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    public function index(){
        return view('dashboard.pengukuran.tampil',['title'=>'Tampil']);
    }
    public function delete(Anak $anak,Pengukuran $pengukuran){
       if ( $pengukuran->delete() ) {
        return redirect()->route('dashboard.pengukuran.ukur',$anak->id)->with('notifikasi',[
            'type' => 'success',
            'msg' => "Data Pengukuran Berhasil di hapus!",
        ]);
       }
    }
    public function ukur($id = null){
        $balita = Anak::with(['orangTua','pengukuran'])->findOrFail($id)->first();
        return view('dashboard.pengukuran.index',compact('balita'));
    }
}