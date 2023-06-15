<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use App\Models\StandardAntropometriBbByUmur;
use App\Models\StandardAntropometriPbByUmur;
use App\Models\StandardAntropometriTbByUmur;
use Database\Factories\StandardAntropometriPbByUmurFactory;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    public function index()
    {
        return view('dashboard.balita.semua', [
            'title' => "Balita",
        ]);
    }
    public function grafik(Anak $anak)
    {
        $artonometriBB = StandardAntropometriBbByUmur::where('jenis_kelamin', $anak->jenis_kelamin)->get()->toArray();
        $umur = [];
        $bbsdmin3 = [];
        $bbsdmin2 = [];
        $tbpbmin1 = [];
        $bbmedian = [];
        $bbsd3 = [];
        $bbsd2 = [];
        $bbsd1 = [];
        foreach ($artonometriBB as  $value) {

            $umur[] = $value['umur'];
            $bbsdmin3[] = $value['-3sd'];
            $bbsdmin2[] = $value['-2sd'];
            $tbpbmin1[] = $value['-1sd'];
            $bbsdmin1[] = $value['median'];
            $bbsd3[] = $value['3sd'];
            $bbsd2[] = $value['2sd'];
            $bbsd1[] = $value['1sd'];
        }

        $anak->load(['orangTua', 'pengukuran']);
        $bbpengukuran = [];
        for ($i = 0; $i <= 60; $i++) {
            if ($anak->pengukuran->count() >= 0) {
                $data = Pengukuran::where('umur', $i)->where('anak_id', $anak->id)->first();
                $bbpengukuran[$i] = $data->bb ?? 0;
            }
        }

      
        //pb

        $standardArtoTinggiBadan = StandardAntropometriTbByUmur::where('jenis_kelamin',$anak->jenis_kelamin)->get()->toArray();
        $standardArtoPanjangBadan = StandardAntropometriPbByUmur::where('jenis_kelamin',$anak->jenis_kelamin)->get()->toArray();


        $standardPbDanTb = array_merge($standardArtoPanjangBadan, $standardArtoTinggiBadan);


        $tbpbumur = [];
        $tbpbmin3 = [];
        $tbpbmin2 = [];
        $tbpbsdmin1 = [];
        $tbpbmedian = [];
        $tbpbsd3 = [];
        $tbpbsd2 = [];
        $tbpbsd1 = [];
        foreach ($standardPbDanTb as  $value) {

            $tbpbumur[] = $value['umur'];
            $tbpbsdmin3[] = $value['-3sd'];
            $tbpbsdmin2[] = $value['-2sd'];
            $tbpbsdmin1[] = $value['-1sd'];
            $tbpbmedian[] = $value['median'];
            $tbpbsd3[] = $value['3sd'];
            $tbpbsd2[] = $value['2sd'];
            $tbpbsd1[] = $value['1sd'];
        }
        $pbpengukuran = [];
        $tbpengukuran = [];

        for ($i = 0; $i <= 24; $i++) {
            if ($anak->pengukuran->count() >= 0) {
                $data = Pengukuran::where('umur', $i)->where('anak_id', $anak->id)->first();
                $pbpengukuran[$i] = $data->pb ?? 0;
            }
        }

        for ($i = 24; $i <= 60; $i++) {
            if ($anak->pengukuran->count() >= 0) {
                $data = Pengukuran::where('umur', $i)->where('anak_id', $anak->id)->first();
                $tbpengukuran[$i] = $data->tb ?? 0;
            }
        }

        $tbpbpengukuran = array_merge($pbpengukuran, $tbpengukuran);
        return view('dashboard.balita.grafik', compact(
            'anak',
            'umur',
            'bbsd1',
            'tbpbumur',
            'bbsd2',
            'bbsd3',
            'bbsdmin2',
            'bbsdmin3',
            'bbsdmin1',
            'bbmedian',
            'bbpengukuran',
            'tbpbsdmin3',
            'tbpbsdmin2',
            'tbpbsdmin1',
            'tbpbmedian',
            'tbpbsd3',
            'tbpbsd2',
            'tbpbsd1',
            'tbpbpengukuran'
        ));
    }
    public function hapus($id = null)
    {
        abort_if($id == null, 404);
        if (Anak::find($id)->delete()) {
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
    public function balitaStunting()
    {
        return view('dashboard.balita.stunting', [
            'title' => "Balita Stunting",
        ]);
    }
    public function edit($id = null)
    {
        abort_if($id === null, 404);

        $balita = Anak::with(['orangTua'])->findOrFail($id);

        return view('dashboard.balita.edit', [
            'title' => "Edit Balita",
            'balita' => $balita,
        ]);
    }
    public function tambah()
    {
        return view('dashboard.balita.tambah', [
            'title' => "Tambah Balita"
        ]);
    }
}
