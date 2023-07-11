<?php

namespace App\Http\Livewire\Pwa\Posyandu;

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

class FormRegister extends Component
{
    public $kabupaten;

    public $kecamatan;

    public $data;
    public $kelurahanDesa;

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
        $posyandu = Collection::make(
            [
                'nama_posyandu' => $this->data['nama_posyandu'],
                'kontak' => $this->data['kontak'],
                'alamat_lengkap' => $this->data['alamat_lengkap'],
                'kelurahan_desa_id' => $this->data['kelurahan_desa_id'],
            ]
        );
        DB::beginTransaction();
        if ($insert = PosyanduPembina::create($posyandu->all())) {
            $user = Auth::create([
                'name' => $insert->nama_posyandu,
                'email' => $posyandu->get('email'),
                'posyandu_pembina_id' => $insert->id,
                'password' => Hash::make($posyandu->get('password')),
                'hak_akses' => 'posyandu',
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

        dd($posyandu->all());
    }

    public function mount(){
        $this->kabupaten  = KabupatenKota::all();
    }
    
    public function render()
    {
        return view('livewire.pwa.posyandu.form-register');
    }
}
