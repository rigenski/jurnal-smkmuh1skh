<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $guarded = [];

    public function guru_mata_pelajaran()
    {
        return $this->hasMany(GuruMataPelajaran::class);
    }
}
