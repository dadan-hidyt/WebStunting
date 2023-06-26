<?php

namespace App\Http\Livewire;
use App\Models\KelurahanDesa;
use App\Models\PosyanduPembina;
use App\Models\OrangTua;
use Livewire\Component;

class FormUpdateBalita extends Component
{
    public $data = [];
    public $balita;
    public $orang_tua = [];
    public $posyandu = [];
    public $desa_kelurahan = [];
    public function mount($balita){
        $this->posyandu = PosyanduPembina::all();
        $this->desa_kelurahan = KelurahanDesa::all();
        $this->balita = $balita;
        $this->data = $balita->toArray();
        $this->orang_tua = $balita->orangTua->toArray();
    }
    private function reloadPosandu()
        {
            $this->posyandu = PosyanduPembina::where('kelurahan_desa_id', $this->orang_tua['kelurahan_desa_id'])->get();
        }
        protected function updated()
        {

            if (isset($this->orang_tua['kelurahan_desa_id'])) {
                $this->reloadPosandu();
            }
            if (isset($this->orang_tua['nik'])) {
                $nik = $this->orang_tua['nik'];
                if ($orang_tua = OrangTua::getByNik($nik)->first()) {
                    $this->posyandu = PosyanduPembina::where('kelurahan_desa_id', $orang_tua['kelurahan_desa_id'])->get();
                    $this->orang_tua = $orang_tua->toArray();
                }
            }
        }

        public function update()
        {
            unset($this->data['orang_tua']);
            $this->data['umur'] = intval(hitungBulan($this->data['tanggal_lahir']));
           if (  $this->balita->update($this->data) ) {
               $this->dispatchBrowserEvent('notifikasi', [
                   'type' => 'success',
                   'msg' => "Balita berhasil di Update!",
               ]);
           } else {
               $this->dispatchBrowserEvent('notifikasi', [
                   'type' => 'success',
                   'msg' => "Balita gagal di Update!",
               ]);
           }

        }
    public function render()
    {
        return view('livewire.form-update-balita');
    }
}
?>