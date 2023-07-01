<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormIbuHamil extends Component
{
    public $type = 'tambah';
    public $ibuHamil = null;
    public function render()
    {
        return view('livewire.form-ibu-hamil');
    }
}
