<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;
class ExportController extends Controller
{
    public $style = null;
    public function __construct()
    {
        $this->style =  (new Style())->setFontBold()
        ->setBackgroundColor('0090f0')
        ->setShouldWrapText(true)
        ->setFontColor('fffff')->setCellAlignment('center');;
    }
    public function exportPengukuran(){
        $kab_id = request()->kab_id ?? null;

        $pengukuran = Pengukuran::with('anak.orangTua.kelurahanDesa.kecamatan.kabupatenKota')->whereHas('anak.orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            $query->where('id',$kab_id);
        })->get();

        return (new FastExcel($pengukuran))->headerStyle($this->style)->download(md5(now()).".xlsx",function($row){
            return array(
                'No KK' => $row->anak->orangTua->nomor_kk,
                'Tgl Pengukuran' => $row->tanggal_ukur,
                'Anak' => $row->anak->nama_lengkap,
                'BB' => $row->bb." Kg",
                'TB' => $row->tb.' Cm',
                'BB/U' => strip_tags(kategoriStatusBb($row->bb_zscore)),
                'TB/U' => $row->tb_zsocre ? strip_tags(kategoriStatusPbTb($row->tb_zscore)) : '-',
                'PB/U' => $row->pb_zscore ? strip_tags(kategoriStatusPbTb($row->pb_zscore)) : '-',
                'TB Zscore' => $row->tb_zscore,
                'PB Zscore' => $row->pb_zscore,
            );
        });
    }
    public function exportBalita(){
        $kab_id = request()->kec ?? null;
        $balita = Anak::with(['orangTua.kelurahanDesa.kecamatan.kabupatenKota'])->whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            return $query->where('id',$kab_id);
        })->get();
      
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
