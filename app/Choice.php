<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['journal_id', 'nama_siswa'];

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
}
