<?php

namespace App\Imports;

use App\User;
use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KaryawanImport implements ToModel, WithStartRow
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
            "username" => $row[0],
            "password" => bcrypt($row[1])
        ]);

        return new Karyawan([
            "nama" => $row[1],
            "user_id" => $user->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
