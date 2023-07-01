<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KabupatenKota;
use DataTables;
class DataTableKabupatenKota extends Controller
{
    public function index(){
        $kabKota = KabupatenKota::all();
        return DataTables::of($kabKota)->addIndexColumn()->addColumn('kab_kota',function($row){
            return $row->nama_kab_kota;
        })->addColumn('jumlah_kecamatan',fn($row)=>$row->kecamatan->count())->addColumn('action',function($row){
              $update = "<a class='btn btn-sm btn-info' href='".route('dashboard.data-master.kabupaten_kota.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            $delete = "<a onclick=\"return confirm('Apakah anda yakin?')\" class='btn btn-sm btn-danger' href='".route('dashboard.data-master.kabupaten_kota.delete',$row->id)."'><i class='fa fa-trash'></i></a>";
            return $update."&nbsp;".$delete;
        })->rawColumns(['action'])->make();
    }
}
