<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class IzinGuruExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new IzinGuruColumnExport(),
            new IzinGuruListExport(),
        ];
    }
}
