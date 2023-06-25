<?php

namespace App\Traits;

use App\Models\Anak;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;
use App\Models\Pengukuran;
trait WithStatistik
{
    public function stunting( $kab_id = null ){
        $anak = Anak::with(['orangTua'])->whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            if ( $kab_id ) {
                return $query->where('id',$kab_id);
            }
            return $query;
        })->stunting()->get();
        $anak = collect($anak)->filter(function($e){
            if (isset($e->pengukuran[0])) {
                return $e;
            } else {
                return [];
            }
        });
        return $anak->count();
    }
    public function kecamatan(){
        return Kecamatan::count();
    }
    public function getAnakByKabupaten($kab_id){
        return Anak::whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            if ( $kab_id ) {
                return $query->where('id',$kab_id);
            }
            return $query;
        })->count();
    }
    public function getPengukuranByKabupaten($kab_id){
        return Pengukuran::whereHas('anak.orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            if ( $kab_id ) {
                return $query->where('id',$kab_id);
            }
            return $query;
        })->groupBy('anak_id')->count();
    }
    public function pengukuran(){
        return Pengukuran::groupBy('anak_id')->count();
    }
}
