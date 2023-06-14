<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use App\Models\StandardAntropometriBbByUmur;
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
        $bbsdmin1 = [];
        $bbmedian = [];
        $bbsd3 = [];
        $bbsd2 = [];
        $bbsd1 = [];
        foreach ($artonometriBB as  $value) {

            $umur[] = $value['umur'];
            $bbsdmin3[] = $value['-3sd'];
            $bbsdmin2[] = $value['-2sd'];
            $bbsdmin1[] = $value['-1sd'];
            $bbmedian[] = $value['median'];
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

        for ($i = 0; $i <= 60; $i++) {
            if ($anak->pengukuran->count() >= 0) {
                $data = Pengukuran::where('umur', $i)->where('anak_id', $anak->id)->first();
                $bbpengukuran[$i] = $data->pb ?? 0;
            }
        }
        //pb

        $standardArtoPanjangBadan = StandardAntropometriPbByUmurFactory::where(
            'jenis_kelamin' ,
            $anak->jenis_kelamin,
        )->get();

        dd($standardArtoPanjangBadan);

        return view('dashboard.balita.grafik',compact('anak','umur','bbsd1','bbsd2','bbsd3','bbsdmin2','bbsdmin3','bbsdmin1','bbmedian','bbpengukuran'));
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

        $balita = Anak::with(['orangTua'])->findOrFail($id)->first();

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
