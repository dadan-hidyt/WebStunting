<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use Livewire\Component;

class FormKecamatan extends Component
{
    public $kecamatan = null;
    protected $rules = [
        'kecamatan' => ['required','unique:kecamatan,nama_kecamatan'],
    ];
    public function tambah(){
        $this->validate();
        if(Kecamatan::create(['nama_kecamatan'=>$this->kecamatan])) {
            return redirect()->route('dashboard.data-master.kecamatan');
        }
    }

    public function render()
    {
        return view('livewire.form-kecamatan');
    }
}
