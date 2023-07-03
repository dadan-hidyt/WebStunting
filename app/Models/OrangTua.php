<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $table = 'orang_tua';
    protected $guarded = [];
    public function scopeGetByNik($query,$nik) {
        return $query->where('nik',$nik);
    }
    public function scopeGetByNoKk($query, $noKK){
        return $query->where('nomor_kk',$noKK);
    }
    public function anak(){
        return $this->hasMany(Anak::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    public function posyandu(){
        return $this->belongsTo(PosyanduPembina::class,'posyandu_pembina_id');
    }
}
