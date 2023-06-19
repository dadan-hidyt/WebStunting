<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;
class ExportController extends Controller
{
    public function exportBalita(){
        $kab_id = request()->kec ?? null;
        $balita = Anak::with(['orangTua.kelurahanDesa.kecamatan.kabupatenKota'])->whereHas('orangTua.kelurahanDesa.kecamatan.kabupatenKota',function($query) use($kab_id){
            return $query->where('id',$kab_id);
        })->get();
        $style = (new Style())->setFontBold()
        ->setBackgroundColor('#0090f0')
        ->setShouldWrapText(true)
        ->setFontColor('#fffff')->setCellAlignment('center');
        return (new FastExcel($balita))->headerStyle($style)->download(uniqid().".xlsx");
    }
}
?>
