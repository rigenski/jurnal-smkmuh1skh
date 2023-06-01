<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasKaryawan extends Model
{
    protected $table = 'aktivitas_karyawan';
    protected $guarded = [];

    public function jurnal_karyawan()
    {
        return $this->belongsTo(JurnalKaryawan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
