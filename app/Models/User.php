<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'orang_tua_id',
        'profile_picture',
        'posyandu_pembina_id',
        'active',
        'hak_akses',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function scopeIsSuperAdmin($query){
        return $query->where('hak_akses','super_admin')->exists();
    }
    public function orangTua(){
        return $this->belongsTo(OrangTua::class);
    }
    public function posyandu(){
        return $this->belongsTo(PosyanduPembina::class,'posyandu_pembina_id');
    }
    public function ibuHamil(){
        return $this->belongsTo(IbuHamil::class);
    }
}
