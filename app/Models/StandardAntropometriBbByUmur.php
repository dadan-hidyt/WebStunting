<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardAntropometriBbByUmur extends Model
{
    use HasFactory;
    protected $table = 'standard_antropometri_bb_by_umur';
    protected $fillable = [
        '-3sd',
        '-2sd',
        '-1sd',
        'median',
        '1sd',
        '2sd',
        '3sd'
    ];

    public function scopeJenisKelamin($query,$jenisKelamin) {
        return $query->where('jenis_kelamin',$jenisKelamin);
    }
    
    public function scopeUmur($query,$umur) {
        return $query->where('umur',$umur);
    }
}
