<?php

namespace App\Http\Controllers\Ajax;

use App\Facades\UkurBuMil;
use App\Http\Controllers\Controller;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use DataTables;

class DataTableIbuHamilController extends Controller
{
    public function getPengukuran(IbuHamil $ibuHamil){
        $ibuHamil->with('pengukuran');
        return DataTables::of($ibuHamil->pengukuran)->addColumn('kategori_imt',function($row){
            return UkurBuMil::getKategori($row->imt ?? 0);
        })->addIndexColumn()->make();
    }
    public function index()
    {
        return DataTables::of(IbuHamil::with(['kelurahanDesa'])->get())
            ->addColumn('umur', fn ($row) => (parseTanggalLahir($row->tanggal_lahir)->y ?? 0) . " tahun")
            ->addColumn('kabupaten', fn ($row) => $row->kelurahanDesa->kecamatan->kabupatenKota->nama_kab_kota ?? '-')
            ->addColumn('action', function ($row) {
                $edit = "<a href='".route('dashboard.ibu-hamil.edit',$row->id)."' class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>";
                $trash = "<a onclick='return confirm(\"Apakah anda yakin?\")' href='".route('dashboard.ibu-hamil.delete',$row->id)."'  class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
                $ukur = "<a href='".route('dashboard.ibu-hamil.pengukuran',$row->id)."' class='btn btn-success btn-sm'><i class='fa fa-calculator'></i></a>";
                return $edit . "&nbsp;" . $trash . "&nbsp;" . $ukur;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()->make();
    }
}
