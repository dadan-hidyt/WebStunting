<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;
    protected $table = 'ibu_hamil';
    protected $fillable = array(
        'nama',
        'alamat_lengkap',
        'kontak',
        'tempat_lahir',
        'tanggal_lahir',
        'kelurahan_desa_id',
        'berat_badan_ideal_sebelum_hamil',
        'tinggi_badan_sebelum_hamil',
        'berat_badan_sebelum_hamil',
        'nik',
        
    );
    public function pengukuran(){
        return $this->hasMany(PengukuranIbuHamil::class);
    }
    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class);
    }
}