<?php

namespace App\Http\Livewire;

use App\Facades\UkurBuMil;
use App\Models\IbuHamil;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use Livewire\Component;

class FormIbuHamil extends Component
{
    public $type = 'tambah';
    public $ibuHamil = null;

    public $data = [];

    public $kelurahanDesaSelektor = [];

    public $_rules = [
        'data.nama' => ['required', 'string'],
        'data.kontak' => ['required', 'string'],
        'data.alamat_lengkap' => ['required', 'string'],
        'data.tempat_lahir' => ['required', 'string'],
        'data.tanggal_lahir' => ['required', 'date'],
        'data.berat_badan_sebelum_hamil' => ['required', 'integer'],
        'data.tinggi_badan_sebelum_hamil' => ['required', 'integer'],

    ];


    public function updated()
    {
        if (isset($this->data['kabupaten'])) {
            $this->kelurahanDesaSelektor['kecamatan'] = Kecamatan::where('kabupaten_kota_id', $this->data['kabupaten'])->get()->toArray();
        }
        if (isset($this->data['kecamatan'])) {
            $this->kelurahanDesaSelektor['kelurahan_desa'] = KelurahanDesa::where('kecamatan_id', $this->data['kecamatan'])->get()->toArray();
        }
    }

    protected $validationAttributes = [
        'data.nama' => "Nama Lengkap",
        'data.nik' => "NIK",
        'data.alamat_lengkap' => "Alamat",
        'tinggi_badan_sebelum_hamil' => 'Tinggi Badan Sebelum Hamil',
        'data.tanggal_lahir' => 'tanggal lahir',
        'data.tempat_lahir' => 'tempat lahir',
        'data.berat_badan_sebelum_hamil' => 'Berat Badan Sebelum Hamil'
    ];

    public function tambah()
    {
        $rules = collect($this->_rules);
        $rules->put('data.nik', ['required', 'max:16', 'min:16', 'unique:ibu_hamil,nik']);
        $this->validate($rules->all());
        $this->data['berat_badan_ideal_sebelum_hamil'] = UkurBuMil::hitungBBI($this->data['tinggi_badan_sebelum_hamil']);
        if (IbuHamil::create($this->data)) {
            $this->data = [];
            $this->dispatchBrowserEvent('berhasil');
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }

    public function mount($type = 'tambah', $ibuHamil = null)
    {
        $this->type = $type;

        $this->kelurahanDesaSelektor['kabupaten'] = KabupatenKota::all()->toArray();

        if ($ibuHamil) {
            $this->data = $ibuHamil->toArray();
            $this->ibuHamil = $ibuHamil;
        }
        if ($this->ibuHamil->kelurahanDesa ?? null) {

            $this->data['kecamatan'] = $this->ibuHamil->kelurahanDesa->kecamatan->id;
            $this->data['kabupaten'] = $this->ibuHamil->kelurahanDesa->kecamatan->kabupatenKota->id;

            $this->kelurahanDesaSelektor['kecamatan'] = Kecamatan::where('kabupaten_kota_id', $this->ibuHamil->kelurahanDesa->kecamatan->id)->get()->toArray();
            $kec_id = $this->ibuHamil->kelurahanDesa->kecamatan->id ?? null;
            $this->kelurahanDesaSelektor['kelurahan_desa'] = KelurahanDesa::where('kecamatan_id', $kec_id)->get()->toArray();
        }
    }

    public function edit()
    {
        $rules = collect($this->_rules);
        if ($this->data['nik'] != $this->ibuHamil->nik) {
            $rules->put('data.nik', ['required', 'max:16', 'min:16', 'unique:ibu_hamil,nik']);
        }
        $this->validate($rules->all());
        if ($this->ibuHamil->update($this->data)) {
            $this->dispatchBrowserEvent('berhasil');
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }

    public function render()
    {
        return view('livewire.form-ibu-hamil');
    }
}
