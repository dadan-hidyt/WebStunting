<?php

namespace App\Http\Livewire\Pwa\Masyarakat;

use App\Models\Anak;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListAnak extends Component
{
    public $searchQuery;
    public $type;
    public $anak;
    public function updated(){
        $result = [];
        if( $this->searchQuery ) {
            $result = Auth::user()->orangTua->anak()->where('nama_lengkap',"LIKE","%".$this->searchQuery."%")->orWhere('nik',"LIKE","%".$this->searchQuery."%")->where('orang_tua_id',auth()->user()->orangTua->id)->get();
        } else {
            $result = Auth::user()->orangTua->anak;
        }

       $this->anak = $result;
    }
    

    public function mount(){
        $this->anak = Auth::user()->orangTua->anak ?? [];
    }

    public function render()
    {
        return view('livewire.pwa.masyarakat.list-anak');
    }
}
