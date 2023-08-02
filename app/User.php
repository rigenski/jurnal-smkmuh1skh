<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class);
    }

    public function aktivitas_guru()
    {
        return $this->hasMany(AktivitasGuru::class);
    }

    public function aktivitas_guru_izin()
    {
        return $this->hasMany(AktivitasGuruIzin::class);
    }

    public function aktivitas_guru_refleksi()
    {
        return $this->hasMany(AktivitasGuruRefleksi::class);
    }
<<<<<<< HEAD
=======
    public function aktivitas_siswa_refleksi()
    {
        return $this->hasMany(AktivitasSiswaRefleksi::class);
    }
    public function aktivitas_siswa_sertifikat()
    {
        return $this->hasMany(AktivitasSiswaSertifikat::class);
    }
>>>>>>> 7f38a57 (feat: added refleksi siswa dan guru)
}
