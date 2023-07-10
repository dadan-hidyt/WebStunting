<?php

namespace App\Http\Livewire\Pwa;

use App\Models\Pengukuran;
use App\Services\PengukuranService;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class FormUkur extends Component
{
    public $anak;
    public $data;

    public function ukur(){
       $pengukuran = new PengukuranService();


       $zscoreBB = $pengukuran->ukurBeratBadanByUmur($this->anak->jenis_kelamin,$this->anak->umur,$this->data['bb']);

        $data = collect([]);
        $data->put('bb',$this->data['bb']);
        $data->put('bb_zscore',$zscoreBB->zscore);

        $umur = hitungBulan($this->anak->tanggal_lahir);

        if ( $umur >= 24 ) {
            $zscoreTB = $pengukuran->ukurTinggiBadanByUmur($this->anak->jenis_kelamin,$this->anak->umur,$this->data['tb']);
            $data->put('tb',$this->data['tb']);
             $data->put('tb_zscore',$zscoreTB->zscore);
         
        } else {
            $zscorePB = $pengukuran->ukurPanjangBadanByUmur($this->anak->jenis_kelamin,$this->anak->umur,$this->data['tb']);
            $data->put('pb',$this->data['tb']);
             $data->put('pb_zscore',$zscorePB->zscore);
        }

        $data->put('tanggal_ukur',date('Y-m-d'));
        $data->put('umur',hitungBulan($this->anak->tanggal_lahir));
        $data->put('anak_id',$this->anak->id);
        $data->put('cara_ukur',hitungBulan($this->anak->tanggal_lahir) >= 24 ? 'berdiri' : 'terlentang');

        if ( Pengukuran::create($data->all()) ) {
            return Redirect::to(route('mobile.riwayat_bb',$this->anak->id));
        } else {
            $this->dispatchBrowserEvent('gagal');
        }

    }

    public function render()
    {
        return view('livewire.pwa.form-ukur');
    }
}
