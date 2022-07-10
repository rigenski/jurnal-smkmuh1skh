<?php

namespace App\Exports;

use App\IzinGuru;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class IzinGuruListExport implements FromView, ShouldAutoSize, WithTitle
{
    public function title(): string
    {
        return 'List Izin Guru';
    }

    public function view(): View
    {
        date_default_timezone_set("Asia/Jakarta");

        $tanggal = session()->get('izin_guru-tanggal');

        if ($tanggal) {
            $data_izin = IzinGuru::where('tanggal', $tanggal)->get();
        } else {
            $data_izin = IzinGuru::where('tanggal', date('Y-m-d'))->get();
        }

        return view('admin/izin_guru/table_guru', ['data_izin' => $data_izin]);
    }
}
