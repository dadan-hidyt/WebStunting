<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormLogin extends Component
{
    public $data = [];
    protected $attributes = [
        'data.email' => "Email",
        'data.password' => "Password"
    ];
    protected $rules = [
        'data.email' => ['required','email'],
        'data.password' => ['required'],
    ];
    public function login(){
        $this->validate();
        unset($this->data['remember']);
        if ( Auth::attempt($this->data,$this->data['remember'] ?? false) ) {
            //check user per role
            return redirect()->route('dashboard.home')->with('success', 'Login berhasil selamat datang'. auth()->user()->name ?? null);
        } else {
            session()->flash('login_gagal',"Login gagal email atau password salah!");
        }
    }

    public function render()
    {
        return view('livewire.form-login');
    }
}
