<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    
    use HasFactory;
    protected $table = 'anak';
    protected $guarded = [];
    public function scopeGetByKabKota($query,$kabKota){
        return $query->whereHas("orangTua.kelurahanDesa.kecamatan.kabupatenKota",function($query) use($kabKota){
            return $query->where('id',$kabKota);
        } );
    }
    public function scopeGetByNik($query,$nik){
        return $query->where('nik',$nik);
    }
    public function scopeStunting($query){
        $query->with(['pengukuran'=>function($query){
            return $query->where('tb_zscore','<','-3')->orWhere('pb_zscore','<','-3')->orderBy('tanggal_ukur','DESC')->get();
        }]);
        return $query;
    }
    public function orangTua(){
        return $this->belongsTo(OrangTua::class);
    }
    public function pengukuran(){
        return $this->hasMany(Pengukuran::class);
    }
    public function pengukurans(){
        return $this->hasMany(Pengukuran::class);
    }
}
