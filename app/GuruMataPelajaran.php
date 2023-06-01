<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruMataPelajaran extends Model
{
    protected $table = 'guru_mata_pelajaran';
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}
