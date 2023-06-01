<?php

namespace App\Exports;

use App\RefleksiGuru;
use App\RefleksiSiswa;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class RefleksiSiswaExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        date_default_timezone_set("Asia/Jakarta");

        $tahun_pelajaran = session()->get('refleksi_siswa-tahun_pelajaran');
        $semester = session()->get('refleksi_siswa-semester');
        $kelas = session()->get('refleksi_siswa-kelas');

        $data_refleksi = RefleksiSiswa::where('tahun_pelajaran', $tahun_pelajaran)->where('semester', $semester)->where('kelas', $kelas)->orderBy('created_at', 'ASC')->get();

        return view('admin/refleksi_siswa/table', ['data_refleksi' => $data_refleksi]);
    }
}
