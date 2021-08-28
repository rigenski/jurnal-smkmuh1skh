<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['nama', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
