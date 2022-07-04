<?php

namespace App\Imports;

use App\Guru;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            "role" => "guru",
            "username" => $row[1],
            "password" => bcrypt($row[2])
        ]);

        return new Guru([
            "nama" => $row[0],
            "user_id" => $user->id,
        ]);
    }
}
