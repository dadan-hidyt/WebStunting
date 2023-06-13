<?php

function hitungBulan(string $tanggal_lahir){
    $time = strtotime($tanggal_lahir);
    $difference = time() - $time;
    return floor($difference / (60*60*24*30));
}

function pwaAssets($path){
    return asset('pwa/'.$path);
}

function assets($path){
    return asset("assets/{$path}");
}

function parseJenisKelamin($jenis_kelamin) {
    return str_replace(['L','P'],['Laki-Laki','Perempuan'],$jenis_kelamin);
}

function parseTanggalLahir($tanggal_lahir){
    $start = new DateTime(date('Y-m-d',strtotime($tanggal_lahir)));
    $end = new DateTime(date('Y-m-d',time()));
    return $end->diff($start);
}

function kategoriStatusPbTb($zScore)
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
function kategoriStatusBb($zScore)
{
    if ($zScore < -3) {
        return 'Sangat kurang (severely underweight)';
    } else if ($zScore >= -3 && $zScore < -2) {
        return 'Kurang (underweight)';
    } else if ($zScore >= -2 && $zScore <= 2) {
        return "Normal";
    } else if ($zScore > 2) {
        return "Risiko Berat badan lebih";
    }
}