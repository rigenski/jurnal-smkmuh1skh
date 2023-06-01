<?php

namespace App\Imports;

use App\UnitKerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UnitKerjaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new UnitKerja([
            "nama" => $row[0],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
