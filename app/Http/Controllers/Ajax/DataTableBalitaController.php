<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class DataTableBalitaController extends Controller
{
    public function index()
    {

        $anak = Anak::with('orangTua')->get();
        return DataTables::of($anak)->addIndexColumn()->addColumn('orang_tua', function ($row) {
            return $row->orangTua->nama." - ".$row->orangTua->nik;
        })->addColumn('tempat_tanggal_lahir', function ($row) {
            return Str::words($row->tempat_lahir) . " - " . Carbon::parse($row->tanggal_lahir)->locale('id')->format('j F Y');
        })->addColumn('kelurahan_desa', function ($row) {
            return $row->orangTua->kelurahanDesa->nama_desa ?? 'Tidak Di Ketahui';
        })->addColumn('posyandu', function ($row) {
            return $row->orangTua->posyandu->nama_posyandu;
        })->addColumn('jenis_kelamin',fn($row)=>parseJenisKelamin($row->jenis_kelamin))->addColumn('umur',function($row){
            if ( isset($row->umur) ) {
                return $row->umur." Bulan";
            } else {
                return hitungBulan($row->tanggal_lahir);
            }
        })->addColumn('action', function ($row) {
            $update = "<a class='btn btn-sm btn-warning' href='".route('dashboard.balita.edit',$row->id)."'><i class='fa fa-edit'></i></a>";
            $delete = "<a onclick=\"return confirm('Apakah anda yakin?')\" class='btn btn-sm btn-danger' href='".route('dashboard.balita.hapus',$row->id)."'><i class='fa fa-trash'></i></a>";
            $ukur = "<a class='btn btn-sm btn-success' href='".route('dashboard.pengukuran.ukur',$row->id)."'><i class='fa fa-calculator'></i></a>";
            return $ukur."&nbsp;".$delete."&nbsp;".$update;

        })->rawColumns(['action'])->make();
    }
}
?>

