<?php

namespace App\Services;

use App\Models\StandardAntropometriBbByUmur;
use App\Models\StandardAntropometriPbByUmur;
use App\Models\StandardAntropometriTbByUmur;

class KurvaPertumbuhanService
{
    public function getUmur()
    {
        $umur = collect([]);
        foreach (range(0, 60) as $val) {
            $umur->push($val);
        }
        return $umur;
    }
    public function getKurvaBb($anak)
    {
        $sdBBmin3 = collect([]);
        $sdBBmin2 = collect([]);
        $sdBBmin1 = collect([]);
        $median = collect([]);
        $sdBB1 = collect([]);
        $sdBB2 = collect([]);
        $sdBB3 = collect([]);
        //umur
        $sdBBmin3->push('-3SD');
        $sdBBmin2->push('-2SD');
        $sdBBmin1->push('-1SD');

        $median->push('Median');

        $sdBB1->push('1SD');
        $sdBB2->push('2SD');
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

        foreach ($this->getUmur() as $val) {
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
        $umur = $this->getUmur()->prepend('umur');
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
    public function getKurvaPbBb($anak)
    {
        $penjangBadan = StandardAntropometriPbByUmur::where('jenis_kelamin', $anak->jenis_kelamin)->get()->toArray();
        $tinggiBadan = StandardAntropometriTbByUmur::where('jenis_kelamin', $anak->jenis_kelamin)->get()->toArray();
        $pbTbMin3 = collect([]);
        $pbTbMin3->prepend('-3sd');
        $pbTbMin2 = collect([]);
        $pbTbMin2->prepend('-2sd');
        $pbTbMin1 = collect([]);
        $pbTbMin1->prepend('-1sd');
        $median = collect([]);
        $median->prepend('Median');
        $sd3 = collect([]);
        $sd3->prepend('3sd');
        $sd2 = collect([]);
        $sd2->prepend('2sd');
        $sd1 = collect([]);
        $sd1->prepend('1sd');
        foreach ($penjangBadan as $key => $pb) {
            if ($key >= 0 && ($key - 1) !== 24) {
                $pbTbMin3->push($pb['-3sd']);
                $pbTbMin2->push($pb['-2sd']);
                $pbTbMin1->push($pb['-1sd']);
                $median->push($pb['median']);
                $sd3->push($pb['3sd']);
                $sd2->push($pb['2sd']);
                $sd1->push($pb['1sd']);
            } else {
                break;
            }
        }

        foreach ($tinggiBadan as $tb) {
            if (($key - 1) == 60) {
                break;
            } else {
                $pbTbMin3->push($tb['-3sd']);
                $pbTbMin2->push($tb['-2sd']);
                $pbTbMin1->push($tb['-1sd']);
                $median->push($tb['median']);
                $sd3->push($tb['3sd']);
                $sd2->push($tb['2sd']);
                $sd1->push($tb['1sd']);
            }
        }


        $pengukuranPB = $anak->pengukuran->toArray();
        $pengukuransPB = collect([]);
        $pengukuransPB->prepend('pengukuran');
        $pengukuransTB = collect([]);
        foreach ($this->getUmur() as $um) {
            $ppb = 0;
            $ptb = 0;
            foreach ($pengukuranPB as $item) {

                if ((int) $item['umur'] <= 24) {
                    if ($item['umur'] == $um) {
                        $ppb = $item['pb'];
                    }
                } elseif ((int) $item['umur'] >= 24 && (int) $item['umur'] <= 60) {
                    if ($item['umur'] == $um) {
                        $ptb = $item['tb'];
                    }
                } else {
                    continue;
                }
            }

            if ($um <= 24) {
                $pengukuransPB->push($ppb);
            } else if ($um >= 24 && $um <= 60) {
                $pengukuransTB->push($ptb);
            }
        }

       $pengukuran = $pengukuransPB->merge($pengukuransTB);


        return [
            $this->getUmur()->prepend('umur')->all(),
            $pbTbMin3->all(),
            $pbTbMin2->all(),
            $pbTbMin1->all(),
            $median->all(),
            $sd3->all(),
            $sd2->all(),
            $sd1->all(),
            $pengukuran->all(),
        ];
    }
}
