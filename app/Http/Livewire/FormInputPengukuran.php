<?php

namespace App\Http\Livewire;

use App\Models\Pengukuran;
use App\Services\PengukuranService;
use Livewire\Component;

class FormInputPengukuran extends Component
{
    public $data = [];
    public $balita;

    public function mount($balita){
        $this->balita = $balita;
        $this->data['tanggal_ukur'] = now();
    }
    public function ukur(){
        $pengukuran = new PengukuranService();
        $data = collect([]);
        $data->put('tanggal_ukur',$this->data['tanggal_ukur']);
        $data->put('anak_id',$this->balita->id);
        $umur = intval(hitungBulan($this->balita->tanggal_lahir));
        $data->put('bb', $this->data['berat_badan']);
        $data->put('bb_zscore',$pengukuran->ukurBeratBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('bb'))->zscore ?? null);
        $data->put('cara_ukur',$this->data['cara_ukur'] ?? null);
        $data->put('umur',$umur);
        $data->put('vitamin_a',$this->data['vitamin_a']);
        $data->put('lingkar_kepala',$this->data['lingkar_kepala']);
        if ( isset($this->data['cara_ukur']) ) {
            if ( $this->data['cara_ukur'] === 'berdiri' ) {
                $data->put('tb', $this->data['tinggi']);
                $data->put('tb_zscore',$pengukuran->ukurTinggiBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('tb'))->zscore ?? null);        
            } else {
                $data->put('pb', $this->data['tinggi']);
                $data->put('pb_zscore',$pengukuran->ukurBeratBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('pb'))->zscore ?? null);
        
            }
        }

        if ( Pengukuran::create($data->all()) ) {
            return redirect()->route('dashboard.pengukuran.ukur');
        }
    }
    public function render()
    {
        return view('livewire.form-input-pengukuran');
    }
}
