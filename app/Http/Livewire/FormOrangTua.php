<?php

namespace App\Http\Livewire;

use App\Models\OrangTua;
use App\Models\PosyanduPembina;
use App\Traits\HasWilayah;
use Livewire\Component;

class FormOrangTua extends Component
{
    public $type = 'tambah';
    public $data;
    public $orangTua = [];
    public $ortu = null;
    protected $rules = [
        'data.nik' => ['required','unique:orang_tua,nik'],
        'data.nomor_kk' => ['required','unique:orang_tua,nomor_kk'],
        'data.nama' => ['required','string'],
        'data.kontak' => ['required','string'],
        'data.alamat_lengkap' => ['required'],
        'data.pekerjaan' => ['required'],
        'data.kelurahan_desa_id' => ['required'],
        'data.posyandu_pembina_id' => ['required'],
    ];
    use HasWilayah;
    public function tambah(){
        $this->validate();
        if ( OrangTua::create($this->data) ) {
            $this->data = [];
            return redirect()->route('dashboard.data-master.orang_tua')->with(
                'notifikasi',
                [
                 'type'=>'success',
                 'msg' => 'Data orang tua berhasil di tambahkan!'
             ]
         );
        } else {
            return redirect()->route('dashboard.data-master.orang_tua')->with(
                'notifikasi',
                [
                 'type'=>'success',
                 'msg' => 'Data orang tua gagal di tambahkan!'
             ]
         );
        }
    }
    public function mount($type = 'tambah',$orangTua = null){
        $this->type = $type;
        if ( $orangTua ) {
            $this->data = $orangTua->toArray();
            $this->ortu = $orangTua;
            if ( $e = $orangTua->kelurahan_desa_id ) {
                $this->selectPosyandu($e);
            }
        }
    }
    public function edit(){
        if( $this->data['nik'] != $this->ortu->nik ) {
            $this->validate([
                'data.nik' => ['required','unique:orang_tua,nik'],
                'data.nomor_kk' => ['required','unique:orang_tua,nomor_kk'],
                'data.nama' => ['required','string'],
                'data.kontak' => ['required','string'],
                'data.alamat_lengkap' => ['required'],
                'data.pekerjaan' => ['required'],
                'data.kelurahan_desa_id' => ['required'],
                'data.posyandu_pembina_id' => ['required'],
            ]);
        } else if( $this->data['nomor_kk'] != $this->ortu->nomor_kk ) {
            $this->validate([
                'data.nik' => ['required','unique:orang_tua,nik'],
                'data.nomor_kk' => ['required','unique:orang_tua,nomor_kk'],
                'data.nama' => ['required','string'],
                'data.kontak' => ['required','string'],
                'data.alamat_lengkap' => ['required'],
                'data.pekerjaan' => ['required'],
                'data.kelurahan_desa_id' => ['required'],
                'data.posyandu_pembina_id' => ['required'],
            ]);
        } else{
           $this->validate( [
            'data.nama' => ['required','string'],
            'data.kontak' => ['required','string'],
            'data.alamat_lengkap' => ['required'],
            'data.pekerjaan' => ['required'],
            'data.kelurahan_desa_id' => ['required'],
            'data.posyandu_pembina_id' => ['required'],
        ]);
       }

       if ( $this->ortu->update($this->data) ) {
           return redirect()->route('dashboard.data-master.orang_tua')->with(
            'notifikasi',
            [
             'type'=>'success',
             'msg' => 'Data Orang Tua Berhasil Di Hapus!'
         ]
     );
       } else {
        return redirect()->route('dashboard.data-master.orang_tua')->with(
            'notifikasi',
            [
             'type'=>'success',
             'msg' => 'Data Orang Tua Gagal Di Hapus!'
         ]
     );
    }
}
public function render()
{
    return view('livewire.form-orang-tua');
}
}
