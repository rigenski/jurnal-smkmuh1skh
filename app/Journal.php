<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = ['nama', 'tanggal', 'kelas', 'kompetensi_keahlian', 'jam_ke', 'mata_pelajaran', 'siswa_hadir', 'siswa_tidak_hadir', 'deskripsi'];
}
