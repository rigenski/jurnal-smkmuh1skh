<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaPilihan extends Model
{
    protected $table = 'siswa_pilihan';
    protected $guarded = [];

    public function jurnal()
    {
        return $this->belongsTo(JurnalGuru::class);
    }
}
