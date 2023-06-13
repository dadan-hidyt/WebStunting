<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class DataTableBalitaController extends Controller
{
    public function index()
    {

        $anak = Anak::with('orangTua')->get();
        return DataTables::of($anak)->addIndexColumn()->addColumn('orang_tua', function ($row) {
            return $row->orangTua->nama." - ".$row->orangTua->nik;
        })->addColumn('tempat_tanggal_lahir', function ($row) {
            return Str::words($row->tempat_lahir) . " - " . Carbon::parse($row->tanggal_lahir)->locale('id')->format('j F Y');
        })->addColumn('kelurahan_desa', function ($row) {
            return $row->orangTua->kelurahanDesa->nama_desa ?? 'Tidak Di Ketahui';
        })->addColumn('posyandu', function ($row) {
            return $row->orangTua->posyandu->nama_posyandu ?? 'Tidak Di Ketahui';
        })->addColumn('umur',function($row){
            if ( isset($row->umur) ) {
                return $row->umur." Bulan";
            } else {
                return hitungBulan($row->tanggal_lahir);
            }
        })->addColumn('action', function ($row) {
            return 234;
        })->make();
    }
}
