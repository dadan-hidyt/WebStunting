<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use DataTables;

class DataTableBalitaController extends Controller
{
    public function index()
    {
        $anak = Anak::with('orangTua')->get();
        return DataTables::of($anak)->addIndexColumn()->addColumn('orang_tua', function ($row) {
            return $row->orangTua->nama." - ".$row->orangTua->nik;
        })->addColumn('tempat_tanggal_lahir', function ($row) {
            return $row->tempat_lahir ?? null . "," . $row->tanggal_lahir;
        })->addColumn('kelurahan_desa', function ($row) {
            return $row->orangTua->kelurahanDesa->nama_desa ?? 'Tidak Di Ketahui';
        })->addColumn('posyandu', function ($row) {
            return $row->orangTua->posyandu->nama_posyandu ?? 'Tidak Di Ketahui';
        })->addColumn('action', function ($row) {
            return 234;
        })->make();
    }
}
