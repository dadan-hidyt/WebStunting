<?php
namespace App\Traits;

use App\Models\KelurahanDesa;

trait HasWilayah {
    public $kelurahanDesa = [];
    public function __construct(){
        $kelurahanDesa = KelurahanDesa::with(['kecamatan.kabupatenKota'])->get();
        if ( $kelurahanDesa ) {
            $this->kelurahanDesa = $kelurahanDesa;
        }
    }
}