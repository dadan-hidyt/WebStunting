<?php

namespace App\Http\Controllers\Pwa\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Services\KurvaPertumbuhanService;
use App\Services\PengukuranService;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Incomplete;

class PageController extends Controller
{
    public function dataAnak(){
        return view('pwa.masyarakat.list-anak');
    }
    public function detailAnak(Anak $anak){
        abort_if($anak->orang_tua_id != auth()->user()->orangTua->id,403);
        return view('pwa.masyarakat.detail_anak',compact('anak'));
    }
    public function riwayatBB(Anak $anak,KurvaPertumbuhanService $kurvaPertumbuhanService){
        return view('pwa.masyarakat.riwayat_bb',[
            'anak' => $anak,
            'pengukuran_bb' => $kurvaPertumbuhanService->getKurvaBb($anak),
        ]);
    }
    public function cekIdeal(){
        return view('pwa.cek_berat_badan_ideal');
    }
    public function riwayatPB(Anak $anak, KurvaPertumbuhanService $kurvaPertumbuhanService){
        return view('pwa.masyarakat.riwayat_pb',[
            'anak' => $anak,
            'pengukuran_pb' => $kurvaPertumbuhanService->getKurvaPbBb($anak),
        ]);   
     }
}
