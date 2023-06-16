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
            return redirect()->route('dashboard.data-master.kabupaten_kota')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Data Berhasil Di Tambahkan",
            ]);
        } else {
            return redirect()->route('dashboard.data-master.kabupaten_kota')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Data Gagal Di Tambahkan",
            ]);
        }
    }
    public function ubah()
    {
        if ($this->kabupatenKota->update([
            'nama_kab_kota' => $this->kabupaten_kota,
        ])) {
            return redirect()->route('dashboard.data-master.kabupaten_kota')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Data Berhasil Di Update",
            ]); 
        } else {
            return redirect()->route('dashboard.data-master.kabupaten_kota')->with('notifikasi',[
                'type' => 'success',
                'msg' => "Data Gagal Di Update",
            ]);
        }
    }
    public function render()
    {
        return view('livewire.form-kabupaten-kota');
    }
}
