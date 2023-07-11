<?php

namespace App\Http\Livewire\Pwa;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormSettingProfile extends Component
{
    public $data;


    public function mount(){
        $this->data['name'] = auth()->user()->name;
        
        $this->data['email'] = auth()->user()->email;
    }

    public function simpan(){
        $ori = auth()->user();
       if(!empty($this->data['password'] ?? null)) {
        $ori->password = Hash::make($this->data['password']);
       }
       if ( $this->data['email'] != $ori->email ) {
        $ori->email = $this->data['email'];
       }
       $ori->name = $this->data['name'];

       if ( $ori->save() ) {
        $this->dispatchBrowserEvent('success');
       } else {
        $this->dispatchBrowserEvent('gagal');

       }
    }

    public function render()
    {
        return view('livewire.pwa.form-setting-profile');
    }
}
