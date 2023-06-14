<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table = 'pengukuran';
    protected $guarded = [];
    public function anak(){
        return $this->belongsTo(Anak::class);
    }
}
