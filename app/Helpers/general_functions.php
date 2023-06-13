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
