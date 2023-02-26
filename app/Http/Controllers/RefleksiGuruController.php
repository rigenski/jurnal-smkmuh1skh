<?php

namespace App\Http\Controllers;

use App\Exports\RefleksiGuruExport;
use App\RefleksiGuru;
use App\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class RefleksiGuruController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if ($request->has('bulan')) {
            $data_refleksi = RefleksiGuru::where('bulan', $request->bulan)->orderBy('bulan', 'desc')->get();
        } else {
            $data_refleksi = RefleksiGuru::where('bulan', date('Y-m'))->orderBy('bulan', 'desc')->get();
        }

        session(['refleksi_guru-bulan' => $request->bulan ? $request->bulan : date('Y-m')]);

        return view('admin/refleksi_guru/index', ['data_refleksi' => $data_refleksi, 'bulan' => $request->bulan]);
    }

    public function export()
    {
        $bulan = session()->get('refleksi_guru-bulan');

        return Excel::download(new RefleksiGuruExport(), 'Refleksi Guru SMK Muhammadiyah 1 Sukoharjo - ' . $bulan . '.xlsx');
    }
}
