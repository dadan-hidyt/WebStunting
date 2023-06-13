<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index(){
        return view('dashboard.balita.semua',[
            'title' => "Balita",
        ]);
    }

    public function hapus($id=null) {
        abort_if($id ==null,404);
        if ( Anak::find($id)->delete() ) {
            return redirect()->back()->with('notifikasi', [
                'type' => 'success',
                'msg' => "Data Balita Berhasil Di Hapus!",
            ]);
        } else {
            return redirect()->back()->with('notifikasi', [
                'type' => 'error',
                'msg' => "Data Balita Berhasil Di Hapus!",
            ]);
        }
    }

    public function tambah(){
        return view('dashboard.balita.tambah',[
            'title' => "Tambah Balita"
        ]);
    }

}
