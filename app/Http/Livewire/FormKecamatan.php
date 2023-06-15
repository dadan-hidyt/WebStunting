<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use Livewire\Component;

class FormKecamatan extends Component
{
    public $kecamatan = [];
    public $kec;
    public $type = 'tambah';
    protected $rules = [
        'kecamatan.nama_kecamatan' => ['required','unique:kecamatan,nama_kecamatan'],
    ];
    public function mount($type = 'tambah',$kecamatan = null){

        if ( $kecamatan ) {
             $this->kecamatan = $kecamatan->toArray();
             $this->kec = $kecamatan;
        }
        $this->type = $type;

    }
    public function tambah(){
        $this->validate();
        if(Kecamatan::create(['nama_kecamatan'=>$this->kecamatan])) {
            return redirect()->route('dashboard.data-master.kecamatan');
        }
    }
    public function edit(){
        if($this->kec && $this->kec->update(['nama_kecamatan'=>$this->kecamatan['nama_kecamatan']])) {
            return redirect()->route('dashboard.data-master.kecamatan');
        }
    }

    public function render()
    {
        return view('livewire.form-kecamatan');
    }
}
