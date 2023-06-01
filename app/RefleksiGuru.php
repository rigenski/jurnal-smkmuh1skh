<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefleksiGuru extends Model
{
    protected $table = 'refleksi_guru';
    protected $guarded = [];

    public function aktivitas_refleksi_guru()
    {
        return $this->hasMany(AktivitasGuruRefleksi::class);
    }
}
