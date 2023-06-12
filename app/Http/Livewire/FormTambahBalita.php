<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormTambahBalita extends Component
{
    public $data = [];
    protected $rules = [
        'data.nik' => ['required','max:16','min:16'],
        'data.no_kk' => ['required','max:16','min:16'],
        'data.nama_lengkap' => ['required'],
        'data.tanggal_lahir' => ['required'],
        'data.jenis_kelamin' => ['required'],
        'data.anak_ke' => ['required']
    ];
    public function tambah(){
        $this->validate();
    }

    public function render()
    {
        return view('livewire.form-tambah-balita');
    }
}
