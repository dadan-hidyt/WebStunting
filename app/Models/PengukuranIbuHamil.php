<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class PengukuranIbuHamil extends Model
{
    use HasFactory;
    protected $table = 'pengukuran_ibu_hamil';
    protected $fillable = [
        'tanggal_ukur',
        'usia_kehamilan',
        'imt',
        'bbi',
        'bbih',
        'ibu_hamil_id',
        'berat_badan',
        'tinggi_badan',
        'lila'
    ];
    public function ibuHamil(){
        return $this->belongsTo(IbuHamil::class);
    }
}
