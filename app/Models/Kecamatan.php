<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = [];
    public function kelurahanDesa(){
        return $this->hasMany(KelurahanDesa::class);
    }
    public function orangTua(){
        return $this->hasMany(OrangTua::class);
    }
}
