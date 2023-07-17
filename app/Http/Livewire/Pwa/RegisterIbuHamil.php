<?php

namespace App\Http\Livewire\Pwa;

use App\Facades\UkurBuMil;
use App\Models\IbuHamil;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use App\Models\PosyanduPembina;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use Livewire\Component;

class RegisterIbuHamil extends Component
{
    public $kabupaten;

    public $kecamatan;

    public $data;
    public $kelurahanDesa;
    protected $rules = [
        'data.nik' => ['required','unique:ibu_hamil,nik'],
        'data.email' => ['required','unique:users,email'],
        'data.password' => ['required','confirmed','min:6'],
        'data.nama' => ['required'],
        'data.tanggal_lahir' => ['required'],
        'data.tempat_lahir' => ['required'],
        'data.kelurahan_desa_id' => ['required'],
        'data.berat_badan_sebelum_hamil' => ['required'],
        'data.tinggi_badan_sebelum_hamil' => ['required'],
        'data.kontak' => ['required'],
        'data.password_confirmation' => ['required','min:6'],
        'data.alamat_lengkap' => ['required'],
    ];
    public $selector;

    protected function updated(){
        if ( $this->selector['kabupaten'] ?? null ) {
            $this->kecamatan = Kecamatan::where('kabupaten_kota_id',$this->selector['kabupaten'])->get();
        }

        if ( $this->selector['kecamatan'] ?? null ) {
            $this->kelurahanDesa = KelurahanDesa::where('kecamatan_id',$this->selector['kecamatan'])->get();
        }
    }

    public function register(){
        $this->validate();
        $ibuHamil = Collection::make(
            [
                'nama' => $this->data['nama'],
                'berat_badan_ideal_sebelum_hamil' => UkurBuMil::hitungBBI($this->data['tinggi_badan_sebelum_hamil']),
                'kontak' => $this->data['kontak'],
                'email' => $this->data['email'],
                'tanggal_lahir' => $this->data['tanggal_lahir'],
                'tempat_lahir' => $this->data['tempat_lahir'],
                'kelurahan_desa_id' => $this->data['kelurahan_desa_id'],
                'nik' => $this->data['nik'],
                'alamat_lengkap' => $this->data['alamat_lengkap'],
                'berat_badan_sebelum_hamil' => $this->data['berat_badan_sebelum_hamil'],
                'tinggi_badan_sebelum_hamil' => $this->data['tinggi_badan_sebelum_hamil'],

            ]
        );
        DB::beginTransaction();
        if ($insert = IbuHamil::create($ibuHamil->all())) {
            $user = User::create([
                'name' => $insert->nama,
                'email' => $ibuHamil->get('email'),
                'ibu_hamil_id' => $insert->id,
                'password' => Hash::make($ibuHamil->get('password')),
                'hak_akses' => 'ibu_hamil',
                'profile_picture' => '',
                'active' => 1,
            ]);

            if ( $user ) {
                DB::commit();
                Auth::login($user);
                return Redirect::to(route('mobile.homepage'));
            } else {
                $this->dispatchBrowserEvent('gagal');
            }
        } else {
            DB::rollBack();
            $this->dispatchBrowserEvent('gagal'); 
        }

    }

    public function mount(){
        $this->kabupaten  = KabupatenKota::all();
    }
    public function render()
    {
        return view('livewire.pwa.register-ibu-hamil');
    }
}
