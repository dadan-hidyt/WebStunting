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
        if ( !isset($this->data['jenis_kelamin']) && !isset($this->data['umur']) ) {
            return;
        }
        $idealBB = StandardAntropometriBbByUmur::where($this->data)->first()->toArray();

        if ( $this->data['umur'] >= 24 ) {
            $bb_pb  = StandardAntropometriTbByUmur::where($this->data)->first()->toArray();
        } else {
            $bb_pb  = StandardAntropometriPbByUmur::where($this->data)->first()->toArray();

        }



        $bb_ideal = $idealBB['-3sd']." Sampai ".$idealBB['3sd']." KG";
        $tb = $bb_pb['-3sd']." Sampai ".$bb_pb['3sd']." CM";


        $this->datas = [
            'umur' => $this->data['umur'] ?? null,
            'jenis_kelamin' => $this->data['jenis_kelamin'] ?? null,
            'bb_ideal' => $bb_ideal ?? '?',
            'tb_ideal' => $tb,
        ];
        $this->dispatchBrowserEvent('data',$this->datas);

    }
    public function render()
    {
        return view('livewire.pwa.form-cek-ideal');
    }
}
