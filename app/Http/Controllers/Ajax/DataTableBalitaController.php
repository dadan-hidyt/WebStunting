<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;

class DataTableBalitaController extends Controller
{
    public function getDataStunting(){
        $anak = Anak::with(['orangTua'])->stunting()->get();
        $anak = collect($anak)->filter(function($e){
            if (isset($e->pengukuran[0])) {
                return $e;
            } else {
                return [];
            }
        });
        return DataTables::of($anak)->addIndexColumn()
        ->addColumn('umur',fn($row)=>hitungBulan($row->tanggal_lahir)." BLN")
        ->addColumn('umur_terakhir_pengukuran',function($row){
            $umur = 0;
            if(isset($row->pengukuran[0])) {
                $umur = $row->pengukuran[0]->umur ?? 0;
            }
            return $umur." Bulan";
        })->addColumn('tanggal_terakhir_pengukuran',function ($row){
                return $row->pengukuran[0] ?? false ? $row->pengukuran[0]->tanggal_ukur : null;
            })
        ->addColumn('tinggi_badan',function($row){
            $tinggi = 0;
            if(isset($row->pengukuran[0])) {
                $row = $row->pengukuran[0];
                if($row->cara_ukur === 'berdiri'){
                    $tinggi = $row->tb_zscore;
                } else {
                    $tinggi = $row->pb_zscore;
                }
            }
            return $tinggi." (<span class='text-danger'>Stunting</span>)";
        })->addColumn('berat',function($row){
            $berat = 0;
            if(isset($row->pengukuran[0])) {
                $berat = $row->pengukuran[0]->bb_zscore ?? 0;
            }
            return $berat;
        })->addColumn('action', function ($row) {
            $info = "<a class='btn btn-sm btn-info' href='".route('dashboard.balita.grafik',$row->id)."'><i class='fa fa-exclamation'></i></a>";
            return $info;

        })->rawColumns(['action','tinggi_badan'])->make();
    }
    public function index()
    {

        $anak = Anak::with(['orangTua'])->get();
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
            $grafik = "<a class='btn btn-sm btn-info' href='".route('dashboard.balita.grafik',$row->id)."'><i class='fas fa-chart-pie mr-1'></i></a>";
            return $ukur."&nbsp;".$delete."&nbsp;".$update."&nbsp;".$grafik;

        })->rawColumns(['action'])->make();
    }
}
