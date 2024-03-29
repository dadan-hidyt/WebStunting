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
    

    public function getDetailKurvaBb(){
        $bulan = request()->bulan ?? null;
        $anak_id = request()->anak_id;

        $pengukuran = Pengukuran::where('anak_id',$anak_id)->where('umur',$bulan)->first();
        if ( $pengukuran ) {
            $data = collect($pengukuran);
            $data->put('status',kategoriStatusBb($pengukuran->bb_zscore,true));
            $data = $data->all();
        } else {
            $data = [];
        }
        return response()->json($data);
    }
    public function getDetailKurvaTb(){
        $bulan = request()->bulan ?? null;
        $anak_id = request()->anak_id;

        $pengukuran = Pengukuran::where('anak_id',$anak_id)->where('umur',$bulan)->first();
        if ( $pengukuran ) {
            $data = collect($pengukuran);
            $data->put('status',kategoriStatusPbTb($pengukuran->tb_zscore ?? $pengukuran->pb_zscore,true));
            $data->put('tb_zscore',$pengukuran->tb_zscore ?? $pengukuran->bb_zscore);
            $data->put('tb',$pengukuran->tb ?? $pengukuran->tb);
            $data = $data->all();
        } else {
            $data = [];
        }
        return response()->json($data);
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
        $nol_ampe_5_bulan  = 0;
        $enam_ampe_11_bulan  = 0;
        $duabelas_ampe_23_bulan = 0;
        $duaempat_ampe_59_bulan = 0;
        $lima_sembilan_ke_atas = 0;
        $total_data = 0;
        foreach ($pengukuran as $item) {
            $total_data++;
            if ($item->umur >= 0 && $item->umur <= 5) {
                $nol_ampe_5_bulan++;
            } elseif($item->umur >= 6 && $item->umur <= 11){
                $enam_ampe_11_bulan++;
            } elseif($item->umur >= 12 && $item->umur <= 23){
                $duabelas_ampe_23_bulan++;
            } elseif($item->umur >= 24 && $item->umur <= 59){
                $duaempat_ampe_59_bulan++;
            }  else if ($item->umur > 59) {
            $lima_sembilan_ke_atas++;
            }
        }
        return response()->json([
            'data' => [
                ['Umur', 'Umur'],
                ['0-5 Bulan', $nol_ampe_5_bulan],
                ['6-11 Bulan', $nol_ampe_5_bulan],
                ['12-23 Bulan', $duabelas_ampe_23_bulan],
                ['24-59 Bulan', $duaempat_ampe_59_bulan],
                [' > 59 ',$lima_sembilan_ke_atas],
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
?>