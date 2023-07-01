<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
    use HasFactory;
    protected $table = 'kelurahan_desa';
    protected $fillable = [
        'nama_desa',
        'alamat',
        'kecamatan_id',
    ];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function posyandu(){
        return $this->hasMany(PosyanduPembina::class);
    }
    public function orangTua(){
        return $this->hasMany(OrangTua::class);
    }
}
