<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PosyanduPembina;
use Illuminate\Http\Request;

class PosyanduPembinaController extends Controller
{
    public function index(){
        return view('dashboard.data-master.posyandu.tampil', ['title'=>"Posyandu"]);
    }
    public function delete(PosyanduPembina $posyanduPembina) {
        if ( $posyanduPembina->delete() ) {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'success',
                'msg' => "Posyandu Berhasil Di Hapus",
            ]);
        } else {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'success',
                'msg' => "Posyandu Gagal Di Hapus",
            ]);
        }
    }
    public function edit(PosyanduPembina $posyanduPembina){
        return view('dashboard.data-master.posyandu.edit',[
            'title' => "Edit Posyandu",
            'posyanduPembina' => $posyanduPembina,
        ]);    }
    public function tambah(){
        return view('dashboard.data-master.posyandu.tambah',[
            'title' => "Tambah Posyandu",
        ]);
    }
}
