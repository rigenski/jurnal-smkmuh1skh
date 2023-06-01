<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaSertifikat extends Model
{
    protected $table = 'siswa_sertifikat';
    protected $guarded = [];

    public function sertifikat()
    {
        return $this->belongsTo(Sertifikat::class);
    }
}
