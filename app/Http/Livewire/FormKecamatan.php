<?php

namespace App\Http\Livewire;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use Livewire\Component;

class FormKecamatan extends Component
{
    public $kecamatan = [];
    public $kec;
    public $kabKota;
    public $type = 'tambah';
    protected $rules = [
        'kecamatan.nama_kecamatan' => ['required','unique:kecamatan,nama_kecamatan'],
        'kecamatan.kabupaten_kota_id' => ['required'],
    ];
    public function mount($type = 'tambah',$kecamatan = null){
        $this->kabKota = KabupatenKota::all();
        if ( $kecamatan ) {
             $this->kecamatan = $kecamatan->toArray();
             $this->kec = $kecamatan;
        }
        $this->type = $type;

    }
    public function tambah(){
        $this->validate();
        if(Kecamatan::create($this->kecamatan)) {
            return redirect()->route('dashboard.data-master.kecamatan');
        }
    }
    public function edit(){
        if($this->kec && $this->kec->update($this->kecamatan)) {
            return redirect()->route('dashboard.data-master.kecamatan');
        }
    }

    public function render()
    {
        return view('livewire.form-kecamatan');
    }
}
