<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getTotalPengukuran(){
       $a = \App\Models\Pengukuran::groupBy('anak_id')->select(DB::raw("COUNT(*) as total"))->get();
       return $a->count();
    }
    /**
     * Handle the incoming request.
     */
    public function getStatistik(){
        return [
            'total_balita' => Anak::all()->count(),
            'total_pengukuran' => $this->getTotalPengukuran(),
        ];
    }
    public function __invoke(Request $request)
    {
        return view('dashboard.home',$this->getStatistik());
    }
}
