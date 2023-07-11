<?php

namespace App\Http\Livewire\Pwa\Posyandu;

use App\Models\Anak;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListAnak extends Component
{
    public $searchQuery;
    public $type;
    public $anak;
    public function updated(){
        
      if ($this->searchQuery) {
        $resut = Anak::with('orangTua.posyandu')->where('nama_lengkap',"LIKE","%".$this->searchQuery."%")
        ->whereHas('orangTua.posyandu',function($row){
            return $row->where('id',auth()->user()->posyandu->id);
        })->get();   

        if ($resut) {
            $this->anak = $resut;
        } else {
            $this->anak =  Anak::whereHas('orangTua.posyandu',function($row){
                return $row->where('id',auth()->user()->posyandu->id);
            })->get();
        }
      } else {
      $this->anak =  Anak::whereHas('orangTua.posyandu',function($row){
            return $row->where('id',auth()->user()->posyandu->id);
        })->get();;
      }

    }
    

    public function mount(){
        $this->anak =  Anak::whereHas('orangTua.posyandu',function($row){
            return $row->where('id',auth()->user()->posyandu->id ?? null);
        })->get();
    }

    public function render()
    {
        return view('livewire.pwa.posyandu.list-anak');
    }
}
