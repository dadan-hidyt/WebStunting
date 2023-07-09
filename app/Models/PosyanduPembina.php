<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosyanduPembina extends Model
{
    use HasFactory;
    protected $table = 'posyandu_pembina';
    protected $fillable = ['nama_posyandu','alamat_lengkap','kontak','kelurahan_desa_id'];
    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class);
    }
    public function orangTua(){
        return $this->hasMany(OrangTua::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
