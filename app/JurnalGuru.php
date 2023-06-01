<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalGuru extends Model
{
    protected $table = 'jurnal_guru';
    protected $guarded = [];

    public function aktivitas_guru()
    {
        return $this->hasMany(AktivitasGuru::class);
    }

    public function siswa_pilihan()
    {
        return $this->hasMany(SiswaPilihan::class);
    }
}
