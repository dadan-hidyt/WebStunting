<?php

namespace App\Http\Livewire\Pwa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class FormLogin extends Component
{
    public $data;
    protected $rules = [
        'data.email' => ['required', 'string'],
        'data.password' => ['required']
    ];
    public function login()
    {
        $this->validate();


        if ( Auth::attempt($this->data) ) {
            return Redirect::to(route('mobile.homepage'));
        } else {
            //login gagal
            $this->dispatchBrowserEvent('login_gagal');
        }

    }
    public function render()
    {
        return view('livewire.pwa.form-login');
    }
}
