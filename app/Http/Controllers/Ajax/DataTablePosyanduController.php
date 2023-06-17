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
        ->addColumn('kecamatan',fn($row)=>$row->kelurahanDesa->kecamatan->nama_kecamatan ?? null)->make();
    }
}
