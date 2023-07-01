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
        })->addColumn('jumlah_posyandu', fn($row)=>$row->posyandu->count() ?: "Belum Ada")->addColumn('action',function ($row){
            $delete = "<a class='btn btn-danger btn-sm' href='".route('dashboard.data-master.kelurahan_desa.delete',$row->id)."'><i class='fa fa-trash'></i></a>";
            $update = "<a class='btn btn-warning btn-sm' href='".route('dashboard.data-master.kelurahan_desa.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            return $delete."&nbsp;".$update;
        })->rawColumns(['action'])->make();
    }
}
