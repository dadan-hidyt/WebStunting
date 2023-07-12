<?php

namespace App\Http\Controllers\Pwa\Posyandu;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;
class ExportController extends Controller
{
    public function exportAnak(){
        $posyandu = Auth::user()->posyandu;
        $dataToExport = Anak::whereHas('orangTua.posyandu',function($v) use($posyandu){
            return $v->where('id',$posyandu->id);
        })->get();
  
        return (new FastExcel($dataToExport))->headerStyle((new Style())->setFontBold()
        ->setBackgroundColor('0090f0')
        ->setShouldWrapText(true)
        ->setFontColor('fffff')->setCellAlignment('center'))->download(md5(uniqid()).'.xlsx',function($row){
            return [
                'Nik' => $row->nik,
                'Kabupaten' => $row->orangTua->kelurahanDesa->kecamatan->kabupatenKota->nama_kab_kota, 
                'Nomor KK' => $row->orangTua->nomor_kk,
                'Nama' => $row->nama_lengkap,
                'Umur' => hitungBulan($row->tanggal_lahir)." Bulan",
                'Alamat' => $row->orangTua->alamat_lengkap,
                'Tempat Tanggal Lahir' => $row->tempat_lahir.",".$row->tanggal_lahir,
                'Jenis Kelamin' => $row->jenis_kelamin === "L" ? 'Laki-Laki' : 'Perempuan',
                'Nama Orang Tua' => $row->orangTua->nama ?? '-',
                'Kartu KIA' => $row->kia ?? '',
                'Berat Lahir' => $row->berat_lahir." KG",
                'Tinggi/Panjang Lahir' => $row->tinggi." CM",
                'Anak Ke' => $row->anak_ke,
                'Posyandu' => $row->orangTua->posyandu->nama_posyandu ?? '-',
            ];
        });
        

    }
}
