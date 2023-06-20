<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function __invoke()
    {
       return view('guest.statistik.grafik');
    }
    public function getByKabKota(){
        $kabKota = \request()->kab_kota ?? null;
        return response()->json([
            'data' => [
              [
                  'x' => 'LAKI LAKI',
                  'y' => 2,
              ],[
                  'x' => 'PEREMPUAN',
                  'y' => 22,
              ],
            ]
        ]);
    }
}
