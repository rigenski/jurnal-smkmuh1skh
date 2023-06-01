<?php

namespace App\Imports;

use App\MataPelajaran;
use App\GuruMataPelajaran;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuruMataPelajaranImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $mata_pelajaran = MataPelajaran::where('kode', $row[1])->get()->first();
        $user = User::where('username', $row[3])->get()->first();

        return new GuruMataPelajaran([
            "kelas" => $row[0],
            "guru_id" => $user->guru->id,
            "mata_pelajaran_id" => $mata_pelajaran->id,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
