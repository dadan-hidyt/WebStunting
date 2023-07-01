<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;
    protected $table = 'ibu_hamil';

    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class);
    }
}
