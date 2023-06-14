<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    
    use HasFactory;
    protected $table = 'anak';
    protected $guarded = [];
    public function scopeStunting($query){
        $query->with(['pengukuran'=>function($query){
            return $query->where('tb_zscore','<','-3')->orWhere('pb_zscore','<','-3')->orderBy('tanggal_ukur','DESC')->take(1);
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
