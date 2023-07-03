<?php

namespace App\Http\Livewire\Pwa\Masyarakat;

use App\Models\KelurahanDesa;
use App\Models\OrangTua;
use App\Models\PosyanduPembina;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class FormRegister extends Component
{
    public $data = [];
    public $kelurahanDesa;
    public $posyandu = [];
    public $type = null;
    protected $rules = [
        'data.nik' => ['required', 'unique:orang_tua,nik', 'max:16', 'min:16'],
        'data.nomor_kk' => ['required', 'unique:orang_tua,nomor_kk', 'max:16', 'min:16'],
        'data.email' => ['required', 'string', 'unique:users,email'],
        'data.password' => ['required'],
        'data.name' => ['required'],
        'data.posyandu_pembina_id' => ['required'],
        'data.kelurahan_desa_id' => ['required'],
        'data.password' => ['required', 'confirmed'],
    ];

    public function mount()
    {
        $this->kelurahanDesa = KelurahanDesa::all();
    }


    public function updated()
    {
        if (isset($this->data['kelurahan_desa_id'])) {
            $this->posyandu = KelurahanDesa::find($this->data['kelurahan_desa_id'])->posyandu;
        }
    }

    public function simpan()
    {


        $this->validate();
        $akun = collect([]);
        $ortu = collect([]);
        $akun->put('name', $this->data['name'] ?? null);
        $akun->put('password', Hash::make($this->data['password']));
        $akun->put('hak_akses', convertHakAkses($this->type));
        $akun->put('email', $this->data['email'] ?? null);
        $akun->put('profile_picture', 'default.png');

        $ortu->put('nama', $this->data['name']);
        $ortu->put('alamat_lengkap', '-');
        $ortu->put('nomor_kk', $this->data['nomor_kk'] ?? null);
        $ortu->put('nik', $this->data['nik'] ?? null);
        $ortu->put('posyandu_pembina_id', $this->data['posyandu_pembina_id'] ?? null);
        $ortu->put('kelurahan_desa_id', $this->data['kelurahan_desa_id'] ?? null);
        DB::beginTransaction();

        try {
            if ($ortu = OrangTua::create($ortu->all())) {
                $akun->put('orang_tua_id', $ortu->id);
            }

            if ($user = User::create($akun->all())) {
                DB::commit();
                Auth::login($user);
                return Redirect::to(route('mobile.homepage'));
            } else {
                $this->dispatchBrowserEvent('gagal');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
        }

    }

    public function render()
    {
        return view('livewire.pwa.masyarakat.form-register');
    }
}
