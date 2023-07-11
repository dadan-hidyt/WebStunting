<?php

namespace App\Http\Livewire\Pwa\Posyandu;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use Livewire\Component;

class FormRegister extends Component
{
    public $kabupaten;

    public $kecamatan;

    public $data;
    public $kelurahanDesa;

    public $selector;

    protected function updated(){
        if ( $this->selector['kabupaten'] ?? null ) {
            $this->kecamatan = Kecamatan::where('kabupaten_kota_id',$this->selector['kabupaten'])->get();
        }

        if ( $this->selector['kecamatan'] ?? null ) {
            $this->kelurahanDesa = KelurahanDesa::where('kecamatan_id',$this->selector['kecamatan'])->get();
        }
    }

    public function register(){
        dd($this->data);
    }

    public function mount(){
        $this->kabupaten  = KabupatenKota::all();
    }
    
    public function render()
    {
        return view('livewire.pwa.posyandu.form-register');
    }
}
