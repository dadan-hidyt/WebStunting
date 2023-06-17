<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class DataTableOrangTuaController extends Controller
{
    public function index(){
        $orangTua = OrangTua::with(['kelurahanDesa.kecamatan.kabupatenKota','posyandu'])->get();
       return DataTables::of($orangTua)->addIndexColumn()
       ->addColumn('no_kk',fn($row)=>$row->nomor_kk)->addColumn('action',function(){

       })->addColumn('kecamatan',fn($row)=>$row->kelurahanDesa->kecamatan->nama_kecamatan ?? '-')->addColumn('action',function(){

       })->addColumn('posyandu_pembina',fn($row)=>$row->posyandu->nama_posyandu ?? '-')->addColumn('action',function(){

       })->addColumn('action',function(){
        
       })->make();
    }
}
