<?php

namespace App\Exports;

use App\IzinGuru;
use App\JurnalGuru;
use App\PengaturanIzinGuru;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class IzinGuruColumnExport implements FromView, ShouldAutoSize, WithTitle
{
    public function title(): string
    {
        return 'List Kelas';
    }

    public function view(): View
    {
        date_default_timezone_set("Asia/Jakarta");

        $tanggal = session()->get('izin_guru-tanggal');

        if ($tanggal) {
            $data_izin = IzinGuru::where('tanggal', $tanggal)->get();
            $data_jurnal = JurnalGuru::where('tanggal', $tanggal)->get();
        } else {
            $data_izin = IzinGuru::where('tanggal', date('Y-m-d'))->get();
            $data_jurnal = JurnalGuru::where('tanggal', date('Y-m-d'))->get();
        }

        $data_pengaturan_izin_guru = PengaturanIzinGuru::all();

        $data_kelas = Siswa::all()->unique('kelas')->values()->all();

        $data_jam = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

        return view('admin/izin_guru/table_kelas', ['data_jurnal' => $data_jurnal, 'data_pengaturan_izin_guru' => $data_pengaturan_izin_guru, 'data_izin' => $data_izin, 'data_kelas' => $data_kelas, 'data_jam' => $data_jam, 'tanggal' => $tanggal]);
    }
}
