<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $table = 'orang_tua';

    public function anak(){
        return $this->hasMany(Anak::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
