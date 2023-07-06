<?php

namespace App\Services;

use App\Models\StandardAntropometriBbByUmur;
use App\Models\StandardAntropometriPbByUmur;
use App\Models\StandardAntropometriTbByUmur;
use Database\Factories\StandardAntropometriTbByUmurFactory;
use PhpParser\Node\Expr\Cast\Object_;

class PengukuranService implements PengukuranInterface
{
    public function pengukuranPertama($anak,$umur = false){
        $pengukuran = collect([]);
        $pengukuran->put('bb', $anak->berat_lahir);
        $pengukuran->put('bb_zscore', $this->ukurBeratBadanByUmur($anak->jenis_kelamin, $anak->umur, $pengukuran->get('bb'))->zscore ?? null);
        $pengukuran->put('tanggal_ukur', now()->format('Y-m-d'));
        $pengukuran->put('cara_ukur', $anak->umur <= 24 ? 'terlentang' : 'berdiri');
        $pengukuran->put('umur', $umur ? $umur : $anak->umur);
        if ($pengukuran->get('umur') >= 24) {
            $pengukuran->put('tb', $anak->tinggi);
            $pengukuran->put('tb_zscore', $this->ukurTinggiBadanByUmur($anak->jenis_kelamin, $anak->umur, $pengukuran->get('tb'))->zscore ?? null);
        } else {
            $pengukuran->put('pb', $anak->panjang_badan);
            $pengukuran->put('pb_zscore', $this->ukurPanjangBadanByUmur($anak->jenis_kelamin, $anak->umur, $pengukuran->get('pb'))->zscore);
        }
        $pengukuran->put('anak_id', $anak->id);
        return $pengukuran;
    }
    public function kategoriStatusPbTb($zScore)
    {
        if ($zScore < -3) {
            return 'Sangat pendek (severely stunted)';
        } else if ($zScore >= -3 && $zScore < -2) {
            return 'Pendek (stunted)';
        } else if ($zScore >= -2 && $zScore <= 3) {
            return "Normal";
        } else if ($zScore > 3) {
            return "Tinggi";
        }
    }
    public function kategoriStatusBb($zScore)
    {
        if ($zScore < -3) {
            return 'Berat badan sangat kurang (severely underweight)';
        } else if ($zScore >= -3 && $zScore < -2) {
            return 'Berat badan kurang (underweight)';
        } else if ($zScore >= -2 && $zScore <= 2) {
            return "Berat Badan Normal";
        } else if ($zScore > 2) {
            return "Risiko Berat badan lebih";
        }
    }


    /**
     * Pengukuran Berat Badan Bayi
     * @param string $jenisKelamin
     * @param int $umur
     * @param float|int $beratBadan
     * @return mixed
     */
    public function ukurBeratBadanByUmur(string $jenisKelamin, int $umur, float|int $beratBadan)
    {
        $zScore = 0;
        if ($umur >= 0 && $umur <= 60) {
            if ($jenisKelamin === "P" || $jenisKelamin === 'L') {
                $sd = StandardAntropometriBbByUmur::umur($umur)->jenisKelamin($jenisKelamin)->first();
                $zScore = ($beratBadan - floatval($sd->median));
                if (abs($zScore)) {
                    $zScore = $zScore / (floatval($sd->median) - floatval($sd->toArray()['-1sd']));
                } else {
                    $zScore = $zScore / (floatval($sd->toArray()['1sd']) - floatval($sd->median));
                }
                $data = collect([
                    'zscore' => round($zScore, 1),
                    'kategori' => $this->kategoriStatusBb($zScore),
                    'kode' => "BB/U",
                ]);
                return (object) $data->all();
            }
        }
    }

    /**
     * @param string $jenisKelamin
     * @param int $umur
     * @param float|int $tinggiBadan
     * @return mixed
     */
    public function ukurTinggiBadanByUmur(string $jenisKelamin, int $umur, float|int $tinggiBadan)
    {
        if (in_array($jenisKelamin, ['L', 'P'])) {
            if ($umur >= 24 && $umur <= 60) {
                $sd = StandardAntropometriTbByUmur::umur($umur)->jenisKelamin($jenisKelamin)->first()->toArray();
                $zScore = ($tinggiBadan - floatval($sd['median']));
                if (abs($zScore)) {
                    $zScore = $zScore / (floatval($sd['median']) - floatval($sd['-1sd']));
                } else {
                    $zScore = $zScore / (floatval($sd['1sd']) - floatval($sd['median']));
                }
                $data = collect([
                    'zscore' => round($zScore, 1),
                    'kategori' => $this->kategoriStatusPbTb($zScore),
                    'kode' => "TB/U",
                ]);
                return (object) $data->all();
            }
        }
    }

    /**
     * untuk umur 0 - 24 Bulan
     * @param string $jenisKelamin
     * @param int $umur
     * @param float|int $panjangBadan
     * @return mixed
     */
    public function ukurPanjangBadanByUmur(string $jenisKelamin, int $umur, float|int $panjangBadan)
    {
        if (in_array($jenisKelamin, ['L', 'P'])) {
            if ($umur >= 0 && $umur <= 24) {
                $sd = StandardAntropometriPbByUmur::umur($umur)->jenisKelamin($jenisKelamin)->first()->toArray();
                $zScore = ($panjangBadan - floatval($sd['median']));
                if (abs($zScore)) {
                    $zScore = $zScore / (floatval($sd['median']) - floatval($sd['-1sd']));
                } else {
                    $zScore = $zScore / (floatval($sd['1sd']) - floatval($sd['median']));
                }
                $data = collect([
                    'zscore' => round($zScore, 1),
                    'kategori' => $this->kategoriStatusPbTb($zScore),
                    'kode' => "PB/U",
                ]);
                return (object) $data->all();
            }
        }
    }

    /**
     * @param string $jenisKelamin
     * @param int $umur
     * @param float|int $beratBadan
     * @return mixed
     */
    public function ukurBeratBadanByPanjangBadan(string $jenisKelamin, int $umur, float|int $beratBadan)
    {
        // TODO: Implement ukurBeratBadanByPanjangBadan() method.
    }

    /**
     * @param string $jenisKelamin
     * @param int $umur
     * @param float|int $beratBadan
     * @return mixed
     */
    public function ukurBeratBadanByTinggiBadan(string $jenisKelamin, int $umur, float|int $beratBadan)
    {
        // TODO: Implement ukurBeratBadanByTinggiBadan() method.
    }
}
