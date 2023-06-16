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
    public function hasilPengukuran(){
        return [];
    }
    public function inputPengukuranByNik(){
        $title = "Input NIK Anak";
        $anak = Anak::all();
        return view('dashboard.pengukuran.input-manual', compact('title'),compact('anak'));
    }
    public function ukur(Anak $anak){
        $balita = $anak;
        return view('dashboard.pengukuran.index',compact('balita'));
    }
}
