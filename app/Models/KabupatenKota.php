<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;
    protected $table = 'kabupaten_kota';

    public function kecamatan(){
        return $this->hasMany(Kecamatan::class,'kabupaten_kota_id');
    }
}
