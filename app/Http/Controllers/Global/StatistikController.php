<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\KabupatenKota;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function __invoke()
    {
        return view('guest.statistik.grafik', [
            'kab_kota' => KabupatenKota::all(),
        ]);
    }
    protected function _getPengukuran()
    {
        $kabKota = \request()->kab_kota_id ?? null;
        $kabupaten = KabupatenKota::find($kabKota);
        $anak = Anak::with(['orangTua'])->whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kabKota){
            return $query->where('id',$kabKota);
        })->stunting()->get();
        $anak = collect($anak)->filter(function($e){
            if (isset($e->pengukuran[0])) {
                return $e;
            } else {
                return [];
            }
        });
        return $anak;
    }
    public function getByUmur()
    {
        $kabKota = \request()->kab_kota_id ?? null;
        $pengukuran = $this->_getPengukuran();
        $total_data_balita = 0;
        $total_data_baduta = 0;
        $total_data = 0;
        foreach ($pengukuran as $item) {
            $total_data++;
            if ($item->umur <= 24) {
                $total_data_baduta++;
            } else if ($item->umur >= 24) {
                $total_data_balita++;
            }
        }

        return response()->json([
            'data' => [
                ['datas', 'data'],
                ['balita', $total_data_balita],
                ['baduta', $total_data_baduta],
            ]
        ]);
    }
    public function getByJenisKelamin()
    {
        $total_kasus = 0;
        $jk_l = 0;
        $jk_p = 0;
        foreach ($this->_getPengukuran() as $data) {
            $total_kasus++;
            if ($data->jenis_kelamin === 'L') {
                $jk_l++;
            } else if ($data->jenis_kelamin === 'P') {
                $jk_p++;
            }
        }
        return response()->json([
            'result' => true,
            'kabupatenKota' => $kabupaten->nama_kab_kota ?? '',
            'data' => [
                ['Laki-Laki', 'Total Kasus'],
                ['Total Kasus', $total_kasus],
                ['Laki-Laki', $jk_l],
                ['Perempuan', $jk_p]
            ],
        ]);
    }
}
