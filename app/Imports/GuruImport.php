<?php

namespace App\Imports;

use App\User;
use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuruImport implements ToModel, WithStartRow
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
            "username" => $row[0],
            "password" => bcrypt($row[1])
        ]);

        return new Guru([
            "nama" => $row[2],
            "user_id" => $user->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
