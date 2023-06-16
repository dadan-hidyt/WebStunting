<?php

namespace App\Traits;

use App\Models\Anak;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;
use App\Models\Pengukuran;
trait WithStatistik
{
    public function stunting(){
        $anak = Anak::with(['orangTua'])->stunting()->get();
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
    public function pengukuran(){
        return Pengukuran::groupBy('anak_id')->select(DB::raw("COUNT(*) as total"))->get();
    }
}
