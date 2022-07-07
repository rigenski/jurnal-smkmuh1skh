<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasGuruIzin extends Model
{
    protected $table = 'aktivitas_guru_izin';
    protected $guarded = [];

    public function izin_guru()
    {
        return $this->belongsTo(IzinGuru::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
