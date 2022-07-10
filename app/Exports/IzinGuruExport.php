<?php

namespace App\Exports;

use App\IzinGuru;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IzinGuruExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        date_default_timezone_set("Asia/Jakarta");

        $tanggal = session()->get('izin_guru-tanggal');

        if ($tanggal) {
            $data_izin = IzinGuru::where('tanggal', $tanggal)->get();
        } else {
            $data_izin = IzinGuru::where('tanggal', date('Y-m-d'))->get();
        }

        $data_kelas = Siswa::all()->unique('kelas')->values()->all();

        $data_jam = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        return view('admin/izin_guru/table', ['data_izin' => $data_izin, 'data_kelas' => $data_kelas, 'data_jam' => $data_jam]);
    }
}
