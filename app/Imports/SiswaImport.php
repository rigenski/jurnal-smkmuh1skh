<?php

namespace App\Imports;

use App\User;
use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            "role" => "siswa",
            "username" => $row[0],
            "password" => bcrypt($row[1])
        ]);

        return new Siswa([
            "nis" => $row[2],
            "nama" => $row[3],
            "kelas" => $row[4],
            "user_id" => $user->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
