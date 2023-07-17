<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\IbuHamil;
use App\Models\KabupatenKota;
use App\Traits\WithStatistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use WithStatistik;

    public function getBayiStunting(){

    }
    /**
     * Handle the incoming request.
     */
    public function getStatistik(){
        return [
            'total_balita' => Anak::all()->count(),
            'total_pengukuran' => $this->pengukuran(),
            'stunting' => $this->stunting(),
            'total_kecamatan' => $this->kecamatan(),
            'total_ibu_hamil' => IbuHamil::count(),
            'kabupatenKota' => KabupatenKota::all(),
        ];
    }
    public function __invoke(Request $request)
    {
        return view('dashboard.home',$this->getStatistik());
    }
}
