<?php

namespace App\Http\Controllers;

use App\Exports\RefleksiSiswaExport;
use App\RefleksiSiswa;
use App\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class RefleksiSiswaController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $data_tahun_pelajaran = ['2022/2023', '2023/2024', '2024/2025', '2025/2026', '2026/2027'];
        $data_semester = ['0.5', '1', '1.5', '2'];

        $data_kelas = RefleksiSiswa::where('tahun_pelajaran', $request->tahun_pelajaran ? $request->tahun_pelajaran : $data_tahun_pelajaran[0])->where('semester', $request->semester ? $request->semester : $data_semester[0])->orderBy('created_at', 'desc')->get()->pluck('kelas')->unique()->toArray();

        $data_refleksi = RefleksiSiswa::where('tahun_pelajaran', $request->tahun_pelajaran ? $request->tahun_pelajaran : $data_tahun_pelajaran[0])->where('semester', $request->semester ? $request->semester : $data_semester[0])->where('kelas', $request->kelas ? $request->kelas : (count($data_kelas) ? $data_kelas[0] : ''))->orderBy('created_at', 'desc')->get();

        session(['refleksi_siswa-tahun_pelajaran' => $request->tahun_pelajaran ? $request->tahun_pelajaran : $data_tahun_pelajaran[0]]);
        session(['refleksi_siswa-semester' => $request->semester ? $request->semester : $data_semester[0]]);
        session(['refleksi_siswa-kelas' => $request->kelas ? $request->kelas : (count($data_kelas) ? $data_kelas[0] : '')]);

        return view('admin/refleksi_siswa/index', ['request' => $request, 'data_refleksi' => $data_refleksi, 'data_tahun_pelajaran' => $data_tahun_pelajaran, 'data_semester' => $data_semester, 'data_kelas' => $data_kelas]);
    }

    public function export(Request $request)
    {
        return Excel::download(new RefleksiSiswaExport($request), 'Refleksi Siswa SMK Muhammadiyah 1 Sukoharjo - ' . '.xlsx');
    }
}
