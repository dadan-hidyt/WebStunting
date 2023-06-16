<?php

namespace App\Http\Livewire;

use App\Models\KelurahanDesa;
use Livewire\Component;
use App\Models\Kecamatan;

class FormKelurahanDesa extends Component
{
    public $kecamatan;
    public $kelurahanDesa = null;
    public $kelurahan_desa;
    protected $rules = [
        'data.nama_desa' => ['required', 'unique:kelurahan_desa,nama_desa'],
        'data.kecamatan_id' => ['required'],
    ];
    public $data = [];
    public function tambah()
    {
        $this->validate();
        if (KelurahanDesa::create($this->data)) {
            $this->data = [];
            return redirect()->route('dashboard.data-master.kelurahan_desa')->with('notifikasi', [
                'type' => 'success',
                'msg' => "Data Kelurahan / Desa berhasil di tambahkan",
            ]);
        }
    }
    public function ubah()
    {
        if ($this->data['nama_desa'] != $this->kelurahanDesa->nama_desa) {
            $this->validate([
                'data.nama_desa' => ['required', 'unique:kelurahan_desa,nama_desa'],
                'data.kecamatan_id' => ['required'],
            ]);
            if ($this->kelurahanDesa->update($this->data)) {
                return redirect()->route('dashboard.data-master.kelurahan_desa')->with('notifikasi', [
                    'type' => 'success',
                    'msg' => "Data Kelurahan / Desa berhasil di update",
                ]);
            }
        } else {
            if ($this->kelurahanDesa->update($this->data)) {
                return redirect()->route('dashboard.data-master.kelurahan_desa')->with('notifikasi', [
                    'type' => 'success',
                    'msg' => "Data Kelurahan / Desa berhasil di update",
                ]);
            }
        }
    }
    public function mount($type = 'tambah', $kelurahanDesa = null)
    {
        $this->kelurahanDesa = $kelurahanDesa;
        if ($kelurahanDesa) {
            $this->data = $kelurahanDesa->toArray();
        }
        $this->type = $type;
        $this->kecamatan = Kecamatan::all();
    }

    public function render()
    {
        return view('livewire.form-kelurahan-desa');
    }
}
