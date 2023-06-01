<?php

namespace App\Imports;

use App\AktivitasSiswaSertifikat;
use App\Siswa;
use App\SiswaSertifikat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaSertifikatImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    protected $sertifikat;

    function __construct($data)
    {
        $this->sertifikat = $data;
    }

    public function model(array $row)
    {
        $siswa = Siswa::where('nis', $row[0])->first();

        $siswa_sertifikat = SiswaSertifikat::create([
            "nis" => $row[0],
            "nama" => $siswa->nama,
            "kelas" => $siswa->kelas,
            "keahlian" => $row[3],
            "penugasan" => $row[4],
            "predikat" => $row[5],
            "kompetensi" => $row[6],
            "catatan" => $row[7],
            "sertifikat_id" => $this->sertifikat->id,
        ]);

        return new AktivitasSiswaSertifikat([
            "siswa_sertifikat_id" => $siswa_sertifikat->id,
            'user_id' => $siswa->user_id
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
