<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Anak;
use App\Models\Pengukuran;

class DataTablePengukuranController extends Controller
{
    public function index(){
        $anak = Pengukuran::with(['anak'])->get();
        return DataTables::of($anak)->addIndexColumn()
        ->addColumn('umur',fn($row)=>hitungBulan($row->anak->tanggal_lahir)." BLN")
       ->addColumn('nomor_kk',function($row){
          return $row->anak->orangTua->nomor_kk ?? '-';
        })->addColumn('nik',function($row){
            return $row->anak->nik;
        })->addColumn('nama_lengkap',function($row){
            return $row->anak->nama_lengkap;
        })->addColumn('jenis_kelamin',function($row){
            return $row->anak->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan';
        })->addColumn('tinggi_badan',function($row){
            if ( $row->umur >= 24 ) {
                return $row->tb_zscore ?? '-';
            } else {
                return '-';
            }
        })->addColumn('panjang_badan',function($row){
            if ( $row->umur <= 24 ) {
                return $row->pb_zscore ?? '-';
            } else {
                return '-';
            }
        })->addColumn('berat',function($row){
           return $row->bb_zscore;
        })->rawColumns(['tinggi_badan'])->make();
    } 
}
