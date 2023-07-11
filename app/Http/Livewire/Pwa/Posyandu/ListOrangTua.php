<?php

namespace App\Http\Livewire\Pwa\Posyandu;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListOrangTua extends Component
{
    public $searchQuery;
    public $type;
    public $data;
    public function updated(){
        $result = [];
        if( $this->searchQuery ) {
            $result =Auth::user()->posyandu->orangTua()
            ->where('nama',"LIKE","%".$this->searchQuery."%")
            ->orWhere('nik',"LIKE","%".$this->searchQuery."%")
            ->where('posyandu_pembina_id',auth()->user()->posyandu->id)->get();
        } else {
            $result =Auth::user()->posyandu->orangTua;
        }

       $this->data = $result;
    }
    

    public function mount(){
        //get data with orang tua
        $data = Auth::user()->posyandu->orangTua ?? null;
        if ( $data ) {
            $this->data = $data;
        } else{
            $this->data = [];
        }
    }

    public function render()
    {
        return view('livewire.pwa.posyandu.list-orang-tua');
    }
}
