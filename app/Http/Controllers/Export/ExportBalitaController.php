<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;
class ExportBalitaController extends Controller
{
    public $style = null;
    public function __construct()
    {
        $this->style =  (new Style())->setFontBold()
        ->setBackgroundColor('0090f0')
        ->setShouldWrapText(true)
        ->setFontColor('fffff')->setCellAlignment('center');;
    }
   
    public function excel(){
        $balita = Anak::with(['orangTua.kelurahanDesa.kecamatan.kabupatenKota'])->get();
        $styleBody = (new Style())->setCellAlignment('center');
        return (new FastExcel($balita))->rowsStyle($styleBody)->headerStyle($this->style)->download(uniqid().".xlsx",function($row){
            return [
                'Nik' => $row->nik,
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
