<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
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
   
    public function byKecamatan()
    {
        $kab_kota = \request()->kab_kota_id;
        $kec = Kecamatan::getByKabKota($kab_kota)->get();
        $stat = collect([]);

        $stat->push(['Total', "Total"]);
        foreach ($kec as $item) {
            $total = 0;
            foreach ($this->_getPengukuran() as $items) {
                if ($e = $items->orangTua->kelurahanDesa->kecamatan->id === $item->id) {
                    $total++;
                }
            }
            $stat->push([$item->nama_kecamatan, $total]);
        }

        return response()->json([
            'data' => $stat->all(),
        ]);
    }
    public function prevalensi()
    {
        $kabKota = \request()->kab_kota_id ?? null;
        $total_anak = Anak::getByKabKota($kabKota)->get()->count();
        $total_stunting = $this->_getPengukuran()->count();
        return response()->json([
            'kabupaten' => KabupatenKota::find($kabKota)->nama_kab_kota ?? null,
            'prev' => $total_stunting != 0 ? round(($total_stunting / $total_anak) * 100) : 0,
            'total_anak' => $total_anak,
            'total_stunting' => $total_stunting,
        ]);
    }
    protected function _getPengukuran()
    {
        $kabKota = \request()->kab_kota_id ?? null;
        $kabupaten = KabupatenKota::find($kabKota);
        if ($kabKota) {
            $anak = Anak::with(['orangTua', 'orangTua.kelurahanDesa.kecamatan'])->whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota', function ($query) use ($kabKota) {
                return $query->where('id', $kabKota);
            })->stunting()->get();
        } else {
            $anak = Anak::with(['orangTua', 'orangTua.kelurahanDesa.kecamatan'])->stunting()->get();
        }
        $anak = collect($anak)->filter(function ($e) {
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
    public function getByKabKota()
    {
        $kabKota = \request()->kab_kota_id ?? null;
        $pengukuran = Pengukuran::with('anak.orangTua.kelurahanDesa.kecamatan.kabupatenKota')
            ->whereHas('anak.orangTua.kelurahanDesa.kecamatan.kabupatenKota', function ($query) use ($kabKota) {
                return $query->where('id', $kabKota);
            });
        $total_kasus = 0;
        $jk_l = 0;
        $jk_p = 0;
        foreach ($pengukuran->get() as $data) {
            if ($data->z_score <= -3) {
                $total_kasus++;
                if ($data->anak->jenis_kelamin === 'L') {
                    $jk_l++;
                } else if ($data->anak->jenis_kelamin === 'P') {
                    $jk_p++;
                }
            }
        }
        return response()->json([
            'data' => [
                [
                    'x' => 'TOTAL KASUS',
                    'y' => $total_kasus,
                ],
                [
                    'x' => 'LAKI LAKI',
                    'y' => $jk_p,
                ], [
                    'x' => 'PEREMPUAN',
                    'y' => $jk_l,
                ],

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
            'kabupatenKota' =>  '',
            'data' => [
                ['Laki-Laki', 'Total Kasus'],
                ['Total Kasus', $total_kasus],
                ['Laki-Laki', $jk_l],
                ['Perempuan', $jk_p]
            ],
        ]);
    }
}
