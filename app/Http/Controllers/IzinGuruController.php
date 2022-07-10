<?php

namespace App\Http\Controllers;

use App\Exports\IzinGuruExport;
use App\IzinGuru;
use App\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IzinGuruController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if ($request->has('tanggal')) {
            $data_izin = IzinGuru::where('tanggal', $request->tanggal)->get();
        } else {
            $data_izin = IzinGuru::where('tanggal', date('Y-m-d'))->get();
        }

        $data_kelas = Siswa::all()->unique('kelas')->values()->all();

        $data_jam = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        session(['izin_guru-tanggal' => $request->tanggal ? $request->tanggal : date('Y-m-d')]);

        return view('admin/izin_guru/index', ['data_izin' => $data_izin, 'data_kelas' => $data_kelas, 'data_jam' => $data_jam, 'tanggal' => $request->tanggal]);
    }

    public function export()
    {
        $tanggal = session()->get('izin_guru-tanggal');

        return Excel::download(new IzinGuruExport(), 'Izin Guru SMK Muhammadiyah 1 Sukoharjo - ' . $tanggal . '.xlsx');
    }
}
