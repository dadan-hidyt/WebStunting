<?php

namespace App\Http\Controllers\Pwa;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
public function ukur( Anak $anak ){
        return view('pwa.pengukuran')->with('anak',$anak);
    }
    public function full_report(Anak $anak){
        return view('pwa.full_report')->with('anak',$anak);
    }
}
