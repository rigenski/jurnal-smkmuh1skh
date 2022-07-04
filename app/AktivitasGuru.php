<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasGuru extends Model
{
    protected $table = 'aktivitas_guru';
    protected $guarded = [];

    public function jurnal_guru()
    {
        return $this->belongsTo(JurnalGuru::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
