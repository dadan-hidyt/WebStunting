<?php

namespace App\Http\Livewire\Pwa\Posyandu;

use App\Models\Anak;
use App\Models\Pengukuran;
use App\Models\User;
use App\Services\PengukuranService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class FormAnak extends Component
{
    public $nama = [];
    public $nomor_kk;
    public $orangTua;
    public $type = 'tambah';
    public $data;
    public $anak;

    protected $_rules = [
        'data.nama_lengkap' => ['required','string'],
        'data.orang_tua_id' => ['required'],
        'data.tanggal_lahir' => ['required','date'],
        'data.jenis_kelamin' => ['required'],
        'data.anak_ke' => ['required'],
        'data.berat_lahir' => ['required'],
        'data.tinggi' => ['required'],
    ];
    public function edit(){
        $rules  = collect($this->_rules);
        if ($this->data['nik'] != $this->anak->nik) {
            $rules->put('data.nik',['required','unique:anak,nik']);
        }
        $this->validate($rules->toArray());
        $anak = collect($this->data);
        if(hitungBulan($anak->get('tanggal_lahir')) <= 24) {
            $anak->put('panjang_badan',$anak->get('tinggi'));
        } else {
            $anak->put('tinggi',null);
        }

        if ( $this->anak->update($anak->all()) ) {
            return Redirect::to(route('mobile.detail_anak',$this->anak->id));
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
    }
    public function mount($anak = null, $type = 'tambah'){
        $this->type = $type;
        if ($anak) {
            $this->data = $anak->toArray();
            $this->anak = $anak;
        } else {
            $this->dispatchBrowserEvent('gagal');
        }
        $orangTua = Auth::user()->posyandu->orangTua;
       if($orangTua){
        $this->orangTua = $orangTua;
       }
    }

    public function tambah(){
        $rules  = collect($this->_rules);
        $rules->put('data.nik',['required','unique:anak,nik']);
        $this->validate($rules->toArray());
        $anak = collect($this->data);
        $anak->put('umur',hitungBulan($anak->get('tanggal_lahir')));

        if(hitungBulan($anak->get('tanggal_lahir')) <= 24) {
            $anak->put('panjang_badan',$anak->get('tinggi'));
        } else {
            $anak->put('tinggi',$anak->get('tinggi'));
        }
 
        DB::beginTransaction();
       if ($insert = Anak::create($anak->toArray())) {
           //buat pengukuran pertama
        $pengukuranService = new PengukuranService();
          Pengukuran::create($pengukuranService->pengukuranPertama($insert)->all());
          DB::commit(); 
          return Redirect::to(route('mobile.posyandu.data_anak'));
       } else {
        DB::rollBack();
       }

    }

    public function render()
    {
        return view('livewire.pwa.posyandu.form-anak');
    }
}
