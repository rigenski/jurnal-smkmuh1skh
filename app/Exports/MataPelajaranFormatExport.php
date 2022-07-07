<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MataPelajaranFormatExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('admin/mata_pelajaran/format-table');
    }
}
