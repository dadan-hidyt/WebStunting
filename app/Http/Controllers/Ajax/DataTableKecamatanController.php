<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use DataTables;
class DataTableKecamatanController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::all(['nama_kecamatan','id']);
        return DataTables::of($kecamatan)->addIndexColumn()->addColumn('action',function($row){
            $update = "<a class='btn btn-sm btn-warning' href='".route('dashboard.data-master.kecamatan.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            $delete = "<a onclick=\"return confirm('Apakah anda yakin?')\" class='btn btn-sm btn-danger' href='".route('dashboard.data-master.kecamatan.hapus',$row->id)."'><i class='fa fa-trash'></i></a>";
            return $update."&nbsp;".$delete;
        })->rawColumns(['action'])->make();
    }
}
