<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function getStatistik(){
        return [
            'total_balita' => Anak::all()->count(),
        ];
    }
    public function __invoke(Request $request)
    {
        return view('dashboard.home',$this->getStatistik());
    }
}
