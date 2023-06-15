<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportBalitaController extends Controller
{
    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'NIK');
        $activeWorksheet->setCellValue('C1', 'Nama Lengkap');
        $activeWorksheet->setCellValue('D1', "Alamat");
        $activeWorksheet->setCellValue('E1', "Anak Ke");
        $activeWorksheet->setCellValue('F1', "JK");
        $activeWorksheet->setCellValue('G1', "Tempat,Tanggal Lahir");
        $activeWorksheet->setCellValue('H1','Umur');
        $activeWorksheet->setCellValue('I1','Orang Tua');
        $activeWorksheet->setCellValue('J1','Desa/Kelurahan');
        $activeWorksheet->setCellValue('K1','Kecamatan');
        $activeWorksheet->setCellValue('L1','Posyandu');


        $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);

        for($i = "A"; $i != "M"; $i++){
            $spreadsheet->getActiveSheet()->getStyle($i)->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle($i."1")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB("36B1FC");
            $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
        }

        $anak = Anak::with('orangTua')->get();

        $i = 1;
        foreach($anak as $val){
            $i++;
            $activeWorksheet->setCellValue("A".$i,$i-1);
            $activeWorksheet->setCellValue("B".$i," $val->nik");
            $activeWorksheet->setCellValue("C".$i,$val->nama_lengkap);
            $activeWorksheet->setCellValue("D".$i,$val->orangTua->alamat_lengkap ?? '');
            $activeWorksheet->setCellValue("E".$i,$val->anak_ke);
            $activeWorksheet->setCellValue("F".$i,$val->jenis_kelamin);
            $activeWorksheet->setCellValue("G".$i,$val->tempat_lahir.",".$val->tanggal_lahir);
            $activeWorksheet->setCellValue('H'.$i,hitungBulan($val->tanggal_lahir)." Bulan");
            $activeWorksheet->setCellValue('I'.$i,($val->orangTua->nama ?? '')."-".$val->orangTua->nik);
            $activeWorksheet->setCellValue('J'.$i,$val->orangTua->kelurahanDesa->nama_desa ?? '');
            $activeWorksheet->setCellValue('K'.$i,$val->orangTua->kelurahanDesa->kecamatan->nama_kecamatan ?? '');
            $activeWorksheet->setCellValue('L'.$i,$val->orangTua->posyandu->nama_posyandu ?? '');

        }

        $writer = new Xlsx($spreadsheet);
        $namaFile = "export".date("Y").".xlsx";
        $filename = storage_path('app/public/'.$namaFile);

        
        $writer->save($filename);
        echo "Download: <a href='".asset('storage/'.$namaFile)."'>{$namaFile}</a> ";
        
    }
}
