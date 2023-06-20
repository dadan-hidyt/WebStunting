<?php

namespace App\Http\Livewire;

use App\Models\Pengukuran;
use App\Services\PengukuranService;
use Livewire\Component;

class FormInputPengukuran extends Component
{
    public $data = [];
    public $balita;
    protected $rules = [
        'data.berat_badan' => 'required|integer',
        'data.tinggi' => ['required','integer'],
        'data.tanggal_ukur' => ['required'],
        'data.vitamin_a' => ['required'],
        'data.lingkar_kepala' => ['required','integer'],
    ];
    public function getUmur(){
        return intval(hitungBulan($this->balita->tanggal_lahir));
    }
    public function mount($balita){
        $this->balita = $balita;
        $this->data['tanggal_ukur'] = date('Y-m-d');
        $this->data['cara_ukur'] = $this->getUmur() >= 24 ? 'berdiri' : 'terlentang';
    }
    public function ukur(){
        $this->validate();
        $pengukuran = new PengukuranService();
        $data = collect([]);
        $data->put('tanggal_ukur',$this->data['tanggal_ukur']);
        $data->put('anak_id',$this->balita->id);
        $umur = $this->getUmur();
        $data->put('bb', $this->data['berat_badan']);
        $data->put('bb_zscore',$pengukuran->ukurBeratBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('bb'))->zscore ?? null);
        $data->put('cara_ukur',$this->getUmur() >= 24 ? 'berdiri' : 'terlentang');
        $data->put('umur',$umur);
        $data->put('lila',$this->data['lila']);
        $data->put('vitamin_a',$this->data['vitamin_a']);
        $data->put('lingkar_kepala',$this->data['lingkar_kepala']);
        if ( isset($this->data['cara_ukur']) ) {
            if ( $this->data['cara_ukur'] === 'berdiri' && $umur >= 24 ) {
                $data->put('tb', $this->data['tinggi']);
                $data->put('tb_zscore',$pengukuran->ukurTinggiBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('tb'))->zscore);
            } else {
                $data->put('pb', $this->data['tinggi']);
                $data->put('pb_zscore',$pengukuran->ukurPanjangBadanByUmur($this->balita->jenis_kelamin, $umur,$data->get('pb'))->zscore);

            }
        }
        if ( $data->all() ) {
            if ( Pengukuran::create($data->all()) ) {
                return redirect()->route('dashboard.pengukuran.ukur',$this->balita->id);
            }
        }

    }
    public function render()
    {
        return view('livewire.form-input-pengukuran');
    }
}
