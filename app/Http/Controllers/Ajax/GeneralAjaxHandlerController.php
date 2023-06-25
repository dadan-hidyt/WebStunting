<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\KabupatenKota;
use App\Traits\WithStatistik;
use Illuminate\Http\Request;

class GeneralAjaxHandlerController extends Controller
{
    use WithStatistik;
    public function getStatPengukuranByKabupaten(){
        $kab_id  = request()->kab_id ?? null;
        return response()->json([
            'jumlah_stunting' => $this->stunting($kab_id),
            'jumlah_pengukuran' => $this->getPengukuranByKabupaten($kab_id),
            'total_anak' => $this->getAnakByKabupaten($kab_id),
        ]);
    }
}
