<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosyanduPembina extends Model
{
    use HasFactory;
    protected $table = 'posyandu_pembina';

    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class);
    }
}
