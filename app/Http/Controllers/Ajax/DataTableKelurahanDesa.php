<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\KelurahanDesa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataTableKelurahanDesa extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $kelurahan_desa = KelurahanDesa::with(['kecamatan'])->get();
       return DataTables::of($kelurahan_desa)->addIndexColumn()->addColumn('kecamatan',function ($row){
            return $row->kecamatan->nama_kecamatan ?? null;
       })->addColumn('action',function ($row){

       })->rawColumns(['action'])->make();
    }
}
