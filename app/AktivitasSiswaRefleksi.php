<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasSiswaRefleksi extends Model
{
    protected $table = 'aktivitas_siswa_refleksi';
    protected $guarded = [];

    public function refleksi_siswa()
    {
        return $this->belongsTo(RefleksiSiswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
