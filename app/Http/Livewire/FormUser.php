<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormUser extends Component
{
    public $data;
    public $user;
    public $type;

    public function mount($type = 'tambah', $user = null)
    {
        if ($user) {
            $this->data = $user->toArray();
        }
        $this->user = $user;
        $this->type = $type;
    }

    protected $validationAttributes = [
        'data.name' => "Nama",
        'data.email' => "Alamat Email",
        'data.password' => "Password",
        'data.password_2' => "Re Password",
        'data.active' => "Status Akun",
        'data.hak_akses' => "Hak Akses/Role",
    ];
    public $hak_akses = [
        'super_admin' => "Super Admin",
        'petugas' => "Petugas",
        'posyandu' => "Posyandu",
        'orang_tua' => "Orang Tua",
    ];
    public function tambah()
    {
        $this->validate([
            'data.name' => ['required', 'string'],
            'data.email' => ['required', 'unique:users,email'],
            'data.active' => ['required'],
            'data.hak_akses' => ['required'],
        ]);

        $data = collect($this->data);
        $data->put('password', Hash::make($data['password']));
        $data->put('profile_picture', 'default.png');
        if (User::create($data->except('password_2')->toArray())) {
            $this->dispatchBrowserEvent('sukses');
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }

    public function edit()
    {
        $data = collect($this->data);
        if ($data->get('password')) {
            $data->put('password', Hash::make($data->get('password')));
        }

        $validation_rule = collect([
            'data.name' => ['required', 'string'],
            'data.active' => ['required'],
            'data.hak_akses' => ['required'],
        ]);

        if ($data->get('email') != $this->user->email) {
            $validation_rule->put('data.email', ['required', 'unique:users,email']);
        }

        $this->validate($validation_rule->all());


        if ($this->user->update($data->all())) {
            $this->dispatchBrowserEvent('sukses');
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }

    public function render()
    {
        return view('livewire.form-user');
    }
}
