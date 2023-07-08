<?php

namespace App\Http\Livewire\Pwa;

use App\Models\StandardAntropometriBbByUmur;
use App\Models\StandardAntropometriPbByUmur;
use App\Models\StandardAntropometriTbByUmur;
use Database\Factories\StandardAntropometriPbByUmurFactory;
use Database\Factories\StandardAntropometriTbByUmurFactory;
use Livewire\Component;

class FormCekIdeal extends Component
{
    protected $listeners = ['refresh'=>'$refresh'];
    public $data;
    public $datas;
    public $data_ideal;
    public function refresh(){
      $this->data_ideal = $this->datas;
    }
    public function hitung(){
        $idealBB = StandardAntropometriBbByUmur::where($this->data)->first()->toArray();

        if ( $this->data['umur'] >= 24 ) {
            $bb_pb  = StandardAntropometriTbByUmur::where($this->data)->first()->toArray();
        } else {
            $bb_pb  = StandardAntropometriPbByUmur::where($this->data)->first()->toArray();

        }


        $this->datas = [
            'bb' => $idealBB,
            'tb_pb' => $bb_pb,
        ];

    }
    public function render()
    {
        return view('livewire.pwa.form-cek-ideal');
    }
}
