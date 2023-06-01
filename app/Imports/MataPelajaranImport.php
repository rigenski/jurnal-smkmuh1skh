<?php

namespace App\Imports;

use App\MataPelajaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MataPelajaranImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MataPelajaran([
            "kode" => $row[0],
            "nama" => $row[1],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
