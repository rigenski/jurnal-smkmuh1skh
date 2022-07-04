<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalKaryawan extends Model
{
    protected $table = 'jurnal_karyawan';
    protected $guarded = [];

    public function aktivitas_karyawan()
    {
        return $this->hasMany(AktivitasKaryawan::class);
    }
}
