<?php

namespace App\Http\Livewire;

use App\Models\KelurahanDesa;
use App\Models\PosyanduPembina;
use App\Traits\HasWilayah;
use Livewire\Component;

class FormPosyandu extends Component
{
    use HasWilayah;
    public $type;
    public $data = [];
    public $posyandu;
    public function tambah()
    {
        $this->validate([
            'data.nama_posyandu' => ['required', 'string'],
            'data.kelurahan_desa_id' => ['required'],
            'data.alamat_lengkap' => ['required'],
            'data.kontak' => ['required']
        ]);

        //insert
        if (PosyanduPembina::create($this->data)) {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'success',
                'msg' => "Posyandu Berhasil Di Tambahkan",
            ]);
        } else {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'success',
                'msg' => "Posyandu Gagal Di Tambahkan",
            ]);
        }
    }
    public function mount($type = 'tambah', $posyanduPembina = null)
    {
        if ($posyanduPembina) {
            $this->posyandu = $posyanduPembina;
            $this->data = $posyanduPembina->toArray();
        }
        $this->type = $type;
    }
    public function edit()
    {
        $this->validate([
            'data.nama_posyandu' => ['required', 'string'],
            'data.kelurahan_desa_id' => ['required'],
            'data.alamat_lengkap' => ['required'],
            'data.kontak' => ['required']
        ]);
        if ($this->posyandu->update($this->data)) {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'success',
                'msg' => "Posyandu Berhasil Di Update",
            ]);
        } else {
            return redirect(route('dashboard.data-master.posyandu'))->with('notifikasi', [
                'type' => 'danger',
                'msg' => "Posyandu gagal Di Update",
            ]);
        }
    }
    public function render()
    {
        return view('livewire.form-posyandu');
    }
}
