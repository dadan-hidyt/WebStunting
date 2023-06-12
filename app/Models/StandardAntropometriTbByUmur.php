<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardAntropometriTbByUmur extends Model
{
    use HasFactory;
    protected $table = 'standard_antropometri_tb_by_umur';
    protected $guarded = [];
    public function scopeUmur($query,$umur) {
        return $query->where("umur",$umur);
    }
    
    public function scopeJenisKelamin($query,$jenis_kelamin) {
        return $query->where("jenis_kelamin",$jenis_kelamin);
    }
}
