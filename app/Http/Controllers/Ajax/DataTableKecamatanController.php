<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use DataTables;
class DataTableKecamatanController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::with('kabupatenKota')->get(['nama_kecamatan','id','kabupaten_kota_id']);
        return DataTables::of($kecamatan)->addIndexColumn()->addColumn('kab_kota',function($row){
            return $row->kabupatenKota->nama_kab_kota  ?? 'Belum Di set';
        })->addColumn('jumlah_desa',function($row){
            return $row->kelurahanDesa->count();
        })->addColumn('action',function($row){
            $update = "<a class='btn btn-sm btn-info' href='".route('dashboard.data-master.kecamatan.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            $delete = "<a onclick=\"return confirm('Apakah anda yakin?')\" class='btn btn-sm btn-danger' href='".route('dashboard.data-master.kecamatan.hapus',$row->id)."'><i class='fa fa-trash'></i></a>";
            return $update."&nbsp;".$delete;
        })->rawColumns(['action'])->make();
    }
}
