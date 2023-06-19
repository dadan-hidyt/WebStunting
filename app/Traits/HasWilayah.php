<?php
namespace App\Traits;

use App\Models\KelurahanDesa;

trait HasWilayah {
    public $kelurahanDesa = [];
    public $posyandu;
    public function selectPosyandu($e){
        $posyandu = KelurahanDesa::with('posyandu')->find($e)->posyandu ?? [];
       if ( $posyandu ) {
            $this->posyandu = $posyandu;
       } else {
            $this->posyandu = null;
       }
    }
    public function __construct(){
        $kelurahanDesa = KelurahanDesa::with(['kecamatan.kabupatenKota'])->get();
        if ( $kelurahanDesa ) {
            $this->kelurahanDesa = $kelurahanDesa;
        }
    }
}