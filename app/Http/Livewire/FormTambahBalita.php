<?php

namespace App\Http\Livewire;

use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use App\Models\OrangTua;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Anak;
use App\Models\PosyanduPembina;

class FormTambahBalita extends Component
{
    public $data = [];
    public $orang_tua = [];
    public $posyandu = [];
    public $desa_kelurahan = [];
    protected $rules = [
        'data.nik' => ['required', 'max:16', 'min:16', 'unique:anak,nik'],
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
    public function mount()
    {
        $this->desa_kelurahan = KelurahanDesa::all();
    }
    private function reloadPosandu()
    {
        $this->posyandu = PosyanduPembina::where('kelurahan_desa_id', $this->orang_tua['kelurahan_desa_id'])->get();
    }
    protected function updated()
    {

        if (isset($this->orang_tua['kelurahan_desa_id'])) {
            $this->reloadPosandu();
        }

        if (isset($this->orang_tua['nik'])) {
            $nik = $this->orang_tua['nik'];
            if ($orang_tua = OrangTua::getByNik($nik)->first()) {
                $this->posyandu = PosyanduPembina::where('kelurahan_desa_id', $orang_tua['kelurahan_desa_id'])->get();
                $this->orang_tua = $orang_tua->toArray();
            }
        } 
    }

    public function tambah()
    {

        $data = collect($this->data);
        $this->validate();

        if (hitungBulan($this->data['tanggal_lahir']) >= 24) {
            $data->put('tinggi', $this->data['panjang_badan']);
        }


        DB::beginTransaction();

        $id_ortu = null;
        if ($orang_tua = OrangTua::getByNik($this->orang_tua['nik'])->first()) {
            $id_ortu = $orang_tua->id;
        }

        if (is_null($id_ortu)) {
            $this->orang_tua['id'] = null;
            $ortu = OrangTua::create($this->orang_tua);
            $id_ortu = $ortu->id;
        }
        $data->put('orang_tua_id', $id_ortu);
        $data->put('umur', hitungBulan($data->get('tanggal_lahir')));
        $buatAnak = Anak::create($data->all());
        if ($buatAnak) {
            DB::commit();
            $this->reset(['data', 'orang_tua']);
            $this->dispatchBrowserEvent('notifikasi', [
                'type' => 'success',
                'msg' => "Balita berhasil di tambahkan!",
            ]);
        } else {
            $this->dispatchBrowserEvent('notifikasi', [
                'type' => 'success',
                'msg' => "Balita gagal di tambahkan!",
            ]);
            DB::rollback();
        }
    }

    public function render()
    {
        return view('livewire.form-tambah-balita');
    }
}
