<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
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
}
