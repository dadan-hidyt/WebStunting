<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class AnakAjaxController extends Controller
{
    public function getAnakById(Anak $anak){
        if ($anak) {
            return view('dashboard.pengukuran.ajax.detail_anak',compact('anak'));
        } else {
            return "Tidak di temukan";
        }
    }
}
