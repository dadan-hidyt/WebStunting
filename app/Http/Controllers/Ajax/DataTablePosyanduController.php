<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\PosyanduPembina;
use Illuminate\Http\Request;
use DataTables;

class DataTablePosyanduController extends Controller
{
    public function index()
    {
        $posyandu = PosyanduPembina::with(['kelurahanDesa'])->get();
        return DataTables::of($posyandu)->addIndexColumn()
        ->addColumn('nama_posyandu', fn ($row) => $row->nama_posyandu)
        ->addColumn('kab_kota', fn ($row) => $row->kelurahanDesa->kecamatan->kabupatenKota->nama_kab_kota ?? null)
        ->addColumn('kecamatan',fn($row)=>$row->kelurahanDesa->kecamatan->nama_kecamatan ?? null)
        ->addColumn('kelurahan_desa',fn($row)=>$row->kelurahanDesa->nama_desa ?? null)
        ->addColumn('alamat',fn($row)=>$row->alamat_lengkap ?? null)
        ->addColumn('action',function($row){
            $delete = "<a class='btn btn-danger btn-sm' href='".route('dashboard.data-master.posyandu.delete',$row->id)."'><i class='fa fa-trash'></i></a>";
            $update = "<a class='btn btn-warning btn-sm' href='".route('dashboard.data-master.posyandu.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            return $delete."&nbsp;".$update;
        })->make();
    }
}
