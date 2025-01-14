<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'birth_date',
        'email',
        'nohp',
        'address',
        'class',
        'status',
        'password',
        'is_admin',
        'is_siswa',
        'is_guru',
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
        // 'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

public function tagihans()
{
    return $this->hasMany(Tagihan::class, 'id_tagihan', 'id');
}
public function jadwals()
{
    return $this->hasMany(Jadwal::class, 'id_jadwal', 'id');
}
public function kelasDetails()
{
    return $this->hasOne(KelasDetail::class, 'name_student', 'name');
}
}
