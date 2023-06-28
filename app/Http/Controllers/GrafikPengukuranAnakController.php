<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\StandardAntropometriBbByUmur;
use App\Services\KurvaPertumbuhanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class GrafikPengukuranAnakController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $hash = null, Anak $anak, KurvaPertumbuhanService $kurvaPertumbuhanService)
    {
        $anak->with(['pengukuran', 'orangTua']);
        return view('grafik_pertumbuhan_anak', [
            'kurva_bb' => $kurvaPertumbuhanService->getKurvaBb($anak),
            'kurva_pb_tb' => $kurvaPertumbuhanService->getKurvaPbBb($anak),
            'umur' => $kurvaPertumbuhanService->getUmur(),
            'anak' => $anak,
        ]);
    }
    public function cariAnak()
    {
        $nik = FacadesRequest::post('nik');
        abort_if(!$nik, 404, "Nik Tidak Di temukan");

        $anak = Anak::getByNik($nik)->first();
        if ($anak) {
            return redirect()->route('grafik_pengukuran', [md5(uniqid()), $anak->id]);
        }
        abort(404, "Nik tidak di temukan!");
    }
}
