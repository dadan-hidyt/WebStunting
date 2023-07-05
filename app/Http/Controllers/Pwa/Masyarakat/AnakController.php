<?php

namespace App\Http\Controllers\Pwa\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function tambah(){
        return view('pwa.masyarakat.tambah_anak')->with('title',"Tambah Anak");
    }
    public function edit(Anak $anak) {
        return view('pwa.masyarakat.edit')->with('anak',$anak);
    }
}
