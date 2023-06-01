<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasSiswaSertifikat extends Model
{
    protected $table = 'aktivitas_siswa_sertifikat';
    protected $guarded = [];

    public function siswa_sertifikat()
    {
        return $this->belongsTo(SiswaSertifikat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
