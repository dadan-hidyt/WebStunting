<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\StandardAntropometriBbByUmur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class GrafikPengukuranAnakController extends Controller
{
    public function getKurvaBb($anak)
    {
        $umur = collect([]);
        $sdBBmin3 = collect([]);
        $sdBBmin2 = collect([]);
        $sdBBmin1 = collect([]);
        $median = collect([]);
        $sdBB1 = collect([]);
        $sdBB2 = collect([]);
        $sdBB3 = collect([]);
        //umur
        $umur->push('umur');
        $sdBBmin3->push('-3SD');
        $sdBBmin2->push('-2SD');
        $sdBBmin1->push('-1SD');

        $median->push('Median');

        $sdBB1->push('1SD');
        $sdBB2->push('22SD');
        $sdBB3->push('3SD');

        foreach (StandardAntropometriBbByUmur::where('jenis_kelamin', $anak->jenis_kelamin)->get()->toArray() as $key => $val) {
            if ($val['umur'] > 60) {
                break;
            } else {
                $sdBBmin3->push($val['-3sd']);
                $sdBBmin2->push($val['-2sd']);
                $sdBBmin1->push($val['-1sd']);

                $median->push($val['median']);


                $sdBB1->push($val['1sd']);
                $sdBB2->push($val['2sd']);
                $sdBB3->push($val['3sd']);
            }
        }

        $pengukuran = collect([]);

        foreach (range(0, 60) as $val) {
            $umur->push($val);
            $value = 0;
            foreach ($anak->pengukuran as $item) {
                if ($item->umur == $val) {
                    $value = $item->bb;
                } else {
                    continue;
                }
            }

            $pengukuran->push($value);
        }
        $max = max($pengukuran->all());
        $pengukuran->prepend('pengukuran');
        return [
           'data' => [
            $umur->all(),
            $sdBBmin3->all(),
            $sdBBmin2->all(),
            $sdBBmin1->all(),
            $median->all(),
            $pengukuran->all(),
            $sdBB1->all(),
            $sdBB2->all(),
            $sdBB3->all(),
           ],
           'max' => $max,
        ];
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $hash = null, Anak $anak)
    {
        $anak->with(['pengukuran','orangTua']);
        return view('grafik_pertumbuhan_anak', [
            'kurva_bb' => $this->getKurvaBb($anak),
            'anak' => $anak,
        ]);
    }
    public function cariAnak()
    {
        $nik = FacadesRequest::post('nik');
        abort_if(!$nik, 404);

        $anak = Anak::getByNik($nik)->first();
        if ($anak) {
            return redirect()->route('grafik_pengukuran', [md5(uniqid()), $anak->id]);
        }
        return redirect()->back();
    }
}
