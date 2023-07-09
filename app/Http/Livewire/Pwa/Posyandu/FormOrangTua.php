<?php

namespace App\Http\Livewire\Pwa\Posyandu;

use App\Models\OrangTua;
use App\Models\PosyanduPembina;
use Illuminate\Support\Collection;
use Livewire\Component;

class FormOrangTua extends Component
{
    public $type = 'tambah';
    public $kelurahanDesa = null;
    public $data;
    public $posyandu;
    public $orangTuaModel;
    public $DataOrangTua;
    protected $_rules = [
        'data.nama' => 'required',
        'data.nik' => ['required','unique:orang_tua,nik'],
        'data.nomor_kk' => ['required','unique:orang_tua,nomor_kk'],
        'data.tanggal_lahir' => ['required'],
        'data.pekerjaan'=>['required'],
        'data.kontak' => ['required'],
        'data.alamat_lengkap' => ['required'],
    ];
    
    public function __construct() {
        $this->orangTuaModel = new OrangTua();
        $this->posyandu = auth()->user()->posyandu;
    }
    
    public function mount($type = 'tambah',$DataOrangTua = null){
        $this->DataOrangTua = $DataOrangTua;
        $this->data = $DataOrangTua->toArray();
    }

    public function edit(){
        $collect = Collection::make($this->_rules);
        
        if ( $this->data['nik'] === $this->DataOrangTua->nik ) {
            $collect->forget('data.nik');
        }
        if ( $this->data['nomor_kk'] === $this->DataOrangTua->nomor_kk ) {
            $collect->forget('data.nomor_kk');
        }
        $this->validate($collect->all());
        if ($this->DataOrangTua->update($this->data)) {
            $this->dispatchBrowserEvent("di_edit");
        } else {
            $this->dispatchBrowserEvent("gagal_edit");
        }
 
        
    }

    public function tambah(){
        $this->validate($this->_rules);
        //create collection data
        $data = Collection::make($this->data);
        $data->put('posyandu_pembina_id',$this->posyandu->id);
        $data->put('kelurahan_desa_id',$this->posyandu->kelurahan_desa_id);

        if ( $this->orangTuaModel->update($data->all()) ) {
           $this->dispatchBrowserEvent("di_tambahkan");
        } else {
            $this->dispatchBrowserEvent("gagal_tambah");
        }
       
        
    }

    public function render()
    {
        return view('livewire.pwa.posyandu.form-orang-tua');
    }
}
