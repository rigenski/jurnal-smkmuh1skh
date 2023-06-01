<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasGuruRefleksi extends Model
{
    protected $table = 'aktivitas_guru_refleksi';
    protected $guarded = [];

    public function refleksi_guru()
    {
        return $this->belongsTo(RefleksiGuru::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
