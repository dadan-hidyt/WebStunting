<?php

namespace App\Services;

class PengukuranIbuHamil
{
    public function hitungIMT($tinggiBadan, $beratBadan)
    {
        $tbDalamMeter = ($tinggiBadan / 100);
        $IMT = $beratBadan / ($tbDalamMeter * $tbDalamMeter);
        return $IMT;
    }
    public function hitungBBIH($bbi, $uh)
    {
        $BBIH = (intval($bbi) + (intval($uh) * 0.35));
        return ((int) $BBIH + 7.7);
    }
    public function hitungBBI($tinggi)
    {
        $bbi = ($tinggi - 100) - ($tinggi - 100) * (10 / 100);
        return $bbi;
    }
    public function getKategori($imt)
    {
        if ($imt < 18.4) {
            return 'Berat Badan Kurang';
        } else if ($imt >= 18.5 && $imt <= 24.9) {
            return "Berat Badan Ideal";
        } else  if ($imt >= 25 && $imt <= 29.9) {
            return "Berat badan lebih";
        } else  if ($imt >= 30 && $imt <= 39.9) {
            return "Gemuk";
        } else if ($imt > 40) {
            return "Sangat Gemuk";
        }
    }
}
