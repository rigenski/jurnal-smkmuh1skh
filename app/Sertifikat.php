<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $guarded = [];

    public function siswa_sertifikat()
    {
        return $this->hasMany(SiswaSertifikat::class);
    }
}
