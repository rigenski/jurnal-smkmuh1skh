<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = ['nama', 'tanggal', 'kelas', 'jam_ke', 'mata_pelajaran', 'siswa_hadir', 'siswa_tidak_hadir', 'deskripsi'];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function choice()
    {
        return $this->hasMany(Choice::class);
    }
}
