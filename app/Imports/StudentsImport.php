<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            "nis" => $row[0],
            "nama" => $row[1],
            "kelas" => $row[2],
            "jurusan" => $row[3],
        ]);
    }
}
