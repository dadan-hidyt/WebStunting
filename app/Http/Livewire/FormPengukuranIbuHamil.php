<?php

namespace App\Http\Livewire;

use App\Facades\UkurBuMil as FacadesUkurBuMil;
use App\Models\PengukuranIbuHamil;
use Livewire\Component;
use UkurBuMil;

class FormPengukuranIbuHamil extends Component
{
    public $data;
    public $ibuHamil;
    public function simpan()
    {
        $data = collect($this->data);
        $IMT = FacadesUkurBuMil::hitungIMT($this->data['tinggi_badan'], $this->data['berat_badan']);
        $BBI = $this->ibuHamil->berat_badan_ideal_sebelum_hamil;
        $BBIH = FacadesUkurBuMil::hitungBBIH($BBI, $this->data['usia_kehamilan']);
        $data->put('imt', $IMT);
        $data->put('bbi', $BBI);
        $data->put('bbih', $BBIH);
        $data->put('ibu_hamil_id', $this->ibuHamil->id);
        if (PengukuranIbuHamil::create($data->all())) {
            $this->dispatchBrowserEvent('berhasil');
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }
    public function mount($ibuHamil)
    {
        $this->ibuHamil = $ibuHamil;
    }
    public function render()
    {
        return view('livewire.form-pengukuran-ibu-hamil');
    }
}
