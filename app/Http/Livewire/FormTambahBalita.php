<?php

namespace App\Http\Livewire;

use App\Models\OrangTua;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormTambahBalita extends Component
{
    public $data = [];
    public $orang_tua = [];
    protected $rules = [
        'data.nik' => ['required', 'max:16', 'min:16'],
        'data.nama_lengkap' => ['required'],
        'data.tanggal_lahir' => ['required'],
        'data.tempat_lahir' => ['required'],
        'data.jenis_kelamin' => ['required'],
        'data.anak_ke' => ['required'],
        'data.panjang_badan' => ['required'],
        'data.berat_lahir' => ['required'],
        'orang_tua.nama' => ['required'],
        'orang_tua.kontak' => ['required'],
        'orang_tua.nik' => ['required'],
        'orang_tua.nomor_kk' => ['required', 'max:16', 'min:16'],
        // 'orang_tua.kelurahan_desa_id' => ['required'],
        // 'orang_tua.posyandu_pembina_id' => ['required'],
        'orang_tua.alamat_lengkap' => ['required'],
        'orang_tua.nomor_kk' => ['required'],
    ];

    protected function updated()
    {
        if (isset($this->orang_tua['nik'])) {
            $nik = $this->orang_tua['nik'];
            if ($orang_tua = OrangTua::getByNik($nik)->first()) {
                $this->orang_tua = $orang_tua->toArray();
            }
        }
    }

    public function tambah()
    {
        $this->validate();

        if ( hitungBulan($this->data['tanggal_lahir']) >= 24 ) {
            $this->data['tinggi'] = $this->data['panjang_badan'];
        }
        dd($this->data);

        DB::beginTransaction();

        $id_ortu = null;
        if ( $orang_tua = OrangTua::getByNik($this->orang_tua['nik'])->first() ) {
            $id_ortu = $orang_tua->id;
        }
        dd($id_ortu);

    }

    public function render()
    {
        return view('livewire.form-tambah-balita');
    }
}
