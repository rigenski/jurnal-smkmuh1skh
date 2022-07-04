<?php

namespace App\Imports;

use App\Karyawan;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            "role" => "karyawan",
            "username" => $row[1],
            "password" => bcrypt($row[2])
        ]);

        return new Karyawan([
            "nama" => $row[0],
            "user_id" => $user->id,
        ]);
    }
}
