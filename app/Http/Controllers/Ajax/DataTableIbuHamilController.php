<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use DataTables;

class DataTableIbuHamilController extends Controller
{
    public function index()
    {
        return DataTables::of(IbuHamil::with(['kelurahanDesa'])->get())
            ->addColumn('umur', fn ($row) => (parseTanggalLahir($row->tanggal_lahir)->y ?? 0) . " tahun")
            ->addColumn('kabupaten', fn ($row) => $row->kelurahanDesa->kecamatan->kabupatenKota->nama_kab_kota ?? '-')
            ->addColumn('action', function ($row) {
                $edit = "<a class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a>";
                $trash = "<a class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
                $ukur = "<a class='btn btn-success btn-sm'><i class='fa fa-calculator'></i></a>";
                return $edit . "&nbsp;" . $trash . "&nbsp;" . $ukur;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()->make();
    }
}
