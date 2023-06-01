<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefleksiSiswa extends Model
{
    protected $table = 'refleksi_siswa';
    protected $guarded = [];

    public function aktivitas_refleksi_siswa()
    {
        return $this->hasMany(AktivitasSiswaRefleksi::class);
    }
}
