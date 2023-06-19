<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\KelurahanDesa;
use App\Models\OrangTua;
use App\Models\PosyanduPembina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportBalitaController extends Controller
{
    public function cekNik($nik_anak)
    {
        $nik = Anak::where('nik', $nik_anak)->first();
        if ($nik) {
            return true;
        } else {
            return false;
        }
    }
    public function detecDesa($kelurahanDesa)
    {
        $dat = KelurahanDesa::where('nama_desa', "LIKE", '%' . $kelurahanDesa . '%');
        return $dat->first();
    }
    public function detectPosyandu($posyandu)
    {
        $dat = PosyanduPembina::where('nama_posyandu', "LIKE", '%' . $posyandu . '%');
        return $dat->first();
    }
    public function parseJenisKelamin($jk)
    {
        $jk = strtolower($jk);
        return str_replace(['laki laki', 'laki-laki', 'perempuan', 'wanita'], ['L', "L", 'P'], $jk);
    }
    public function index()
    {
        $log = [];
        $file = request()->file('file');
        $filename = $file->hashName(storage_path('app/tmp'));
      
        if ( $file->extension() == 'xlsx' && $file->store('tmp') && file_exists($filename) ) {
            $fastExcel = new FastExcel();
            $data = $fastExcel->import($filename, function ($line) use (&$log,$filename) {
                //orang tua
              
                DB::beginTransaction();
                $orangTua = collect([]);
                $orangTua->put('nama', $line['NAMA ORANG TUA'] ?? null);
                $orangTua->put('alamat_lengkap', $line['ALAMAT'] ?? null);
                $orangTua->put('pekerjaan', $line['PEKERJAAN ORANG TUA'] ?? null);
                $orangTua->put('kelurahan_desa_id', $this->detecDesa($line['KELURAHAN/DESA'])->id ?? null);
                $orangTua->put('pekerjaan', $line['PEKERJAAN ORANG TUA'] ?? null);
                $orangTua->put('kontak', $line['KONTAK'] ?? null);
                $orangTua->put('nomor_kk', $line['NOMOR KK'] ?? null);
                $orangTua->put('nik', $line['NIK ORANG TUA'] ?? null);
                $orangTua->put('posyandu_pembina_id', $this->detectPosyandu($line['POSYANDU'])->id ?? null);
                if (($ortu = OrangTua::getByNik($orangTua->get('nik'))->first()) || OrangTua::getByNoKk($orangTua->get('nomor_kk'))->first()) {
                    $orang_tua_id = $ortu->id;
                } else {
                    $ortu = OrangTua::create($orangTua->all());
                    $orang_tua_id = $ortu->id;
                }
                $anak = collect([]);
                $anak->put('orang_tua_id', $orang_tua_id);
                $anak->put('nik', $line['NIK'] ?? null);
                $anak->put('nama_lengkap', $line['NAMA LENGKAP'] ?? null);
                $anak->put('jenis_kelamin', $this->parseJenisKelamin($line['JENIS KELAMIN'] ?? null) ?? null);
                $anak->put('tanggal_lahir', $line['TANGGAL LAHIR'] ?? null);
                $anak->put('tempat_lahir', $line['TEMPAT LAHIR'] ?? null);
                $anak->put('anak_ke', $line['ANAK KE']);
                $anak->put('tempat_lahir', $line['TEMPAT LAHIR'] ?? null);
                $anak->put('berat_lahir', $line['BERAT LAHIR'] ?? null);
                $anak->put('umur', hitungBulan($anak->get('tanggal_lahir')->format('Y-m-d')));
                $anak->put('tinggi', $line['TINGGI LAHIR'] ?? $line['PANJANG LAHIR'] ?? null);
                if (!$this->cekNik($anak->get('nik'))) {
                    if (Anak::create($anak->all())) {
                        $log['sukses'] = true;
                        DB::commit();
                    } else {
                        $log['status']  = false;
                        $log['gagal'][] = $anak->get('nik') . "-" . $anak->get('nama_lengkap')." Gagal saat menyimpan data";
                        DB::rollBack();
                    }
                } else {
                    $log['status']  = false;
                    $log['gagal'][] = $anak->get('nik') . "-" . $anak->get('nama_lengkap')." Nik sudah di gunakan";
                    DB::rollBack();
                }
            });
        } else{
            $log['status']  = false;
            $log['gagal'][]['error'] = "File Gagal Di upload, Cek extensi atau file terlalu  besar";
        }
      
      
        return response()->json($log);
    }
}
