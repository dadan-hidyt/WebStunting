<?php

namespace App\Http\Livewire;

use App\Models\KabupatenKota;
use Livewire\Component;

class FormKabupatenKota extends Component
{
    public $kabupaten_kota;
    public $kabupatenKota;
    public $type = 'tambah';
    protected $rules = [
        'kabupaten_kota' => ['required', 'unique:kabupaten_kota,nama_kab_kota'],
    ];
    public function mount($type = 'tambah', $kabupatenKota = null)
    {
        $this->kabupatenKota = $kabupatenKota;
        if ($kabupatenKota) {
            $this->kabupaten_kota = $kabupatenKota->nama_kab_kota ?? null;
        }
    }
    public function tambah()
    {
        $this->validate();
        if (KabupatenKota::create(
            ['nama_kab_kota' =>  $this->kabupaten_kota,]
        )) {
            dd("Ditambahkan");
        }
    }
    public function ubah()
    {
    }
    public function render()
    {
        return view('livewire.form-kabupaten-kota');
    }
}
