<?php

namespace App\Http\Livewire\Pwa;

use Livewire\Component;

class FormUkurBB extends Component
{
    public $anak;

    

    public function ukur(){
        dd($this->bb);
    }

    public function render()
    {
        return view('livewire.pwa.form-ukur-b-b');
    }
}
