<?php

namespace App\Http\Controllers\Pwa;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Services\KurvaPertumbuhanService;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
public function ukur( Anak $anak ){
        return view('pwa.pengukuran')->with('anak',$anak);
    }
    public function pengukuran(){
        return view('pwa.masyarakat.pengukuran_anak');
    }
    public function full_report(Anak $anak, KurvaPertumbuhanService $kurvaPertumbuhanService){
        return view('pwa.full_report',[
            'anak' => $anak,
            'umur' => $kurvaPertumbuhanService->getUmur(),
            'kurva_bb' => $kurvaPertumbuhanService->getKurvaBb($anak),
            'kurva_pb_tb' => $kurvaPertumbuhanService->getKurvaPbBb($anak),
        ]);
    }
}
