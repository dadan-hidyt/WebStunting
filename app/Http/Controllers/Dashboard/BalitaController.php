<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use App\Models\StandardAntropometriBbByUmur;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index(){
        return view('dashboard.balita.semua',[
            'title' => "Balita",
        ]);
    }
    public function grafik(Anak $anak){
        $artonometriBB = StandardAntropometriBbByUmur::where('jenis_kelamin',$anak->jenis_kelamin)->get()->toArray();
        $umur = [];
        $sdmin3 = [];
        $sdmin2 = [];
        $sdmin1 = [];
        $median = [];
        $sd3 = [];
        $sd2 = [];
        $sd1 = [];
        foreach ($artonometriBB as  $value) {
            
           $umur[] = $value['umur'];
           $sdmin3[] = $value['-3sd'];
           $sdmin2[] = $value['-2sd'];
           $sdmin1[] = $value['-1sd'];
           $median[] = $value['median'];
           $sd3[] = $value['3sd'];
           $sd2[] = $value['2sd'];
           $sd1[] = $value['1sd'];
        }
        
        $anak->load(['orangTua','pengukuran']);
        $pengukuran = [];
        for ($i = 0; $i<= 60; $i++) {
            if ( $anak->pengukuran->count() >= 0 ) {
                $data = Pengukuran::where('umur',$i)->where('anak_id',$anak->id)->first();
                $pengukuran[$i] = $data->bb ?? 0;
            }
        }
        return view('dashboard.balita.grafik',[
            'title' => "Grafik Pertumbuhan Anak!",
            'balita' => $anak,
            'umur' => $umur,
            'sdmin3' => $sdmin3,
            'sdmin2' => $sdmin2,
            'sdmin1' => $sdmin1,
            'median' => $median,
            'sd3' => $sd3,
            'sd2' => $sd2,
            'sd1' => $sd1,
            'pengukuran' => $pengukuran,
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
    public function balitaStunting(){
        return view('dashboard.balita.stunting',[
            'title' => "Balita Stunting",
        ]);
    }
    public function edit($id = null) {
        abort_if($id === null, 404);

        $balita = Anak::with(['orangTua'])->findOrFail($id)->first();

        return view('dashboard.balita.edit',[
            'title' => "Edit Balita",
            'balita' => $balita,
        ]);
    }
    public function tambah(){
        return view('dashboard.balita.tambah',[
            'title' => "Tambah Balita"
        ]);
    }

}
