<?php

namespace App\Http\Controllers;

use App\Guru;
use App\JurnalGuru;
use App\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");

        $guru = Guru::all();
        $siswa = Siswa::all();

        $jurnal_guru_per_hari = JurnalGuru::whereDate('tanggal', Carbon::today())->select([
            DB::raw('nama'),
            DB::raw('kelas'),
            DB::raw('jam_ke'),
            DB::raw('mata_pelajaran'),
            DB::raw('siswa_hadir'),
            DB::raw('siswa_tidak_hadir'),
            DB::raw('deskripsi'),
            DB::raw('DATE(tanggal) as tanggal')
        ])->get()->toArray();

        $jurnal_guru_per_minggu = [];

        for ($i = 0; $i < 7; $i++) {
            $jurnal_guru = JurnalGuru::where('tanggal', [DATE('Y-m-d', strtotime('-' . $i . 'days')), DATE('Y-m-d')])
                ->select([
                    DB::raw('nama'),
                    DB::raw('kelas'),
                    DB::raw('jam_ke'),
                    DB::raw('mata_pelajaran'),
                    DB::raw('siswa_hadir'),
                    DB::raw('siswa_tidak_hadir'),
                    DB::raw('deskripsi'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->orderBy('tanggal', 'desc')
                ->get()
                ->toArray();

            array_push($jurnal_guru_per_minggu, $jurnal_guru);
        }

        $jurnal_guru_per_hari = json_encode($jurnal_guru_per_hari);
        $jurnal_guru_per_minggu = json_encode($jurnal_guru_per_minggu);


        return view('admin/index', compact('jurnal_guru', 'guru', 'siswa', 'jurnal_guru_per_hari', 'jurnal_guru_per_minggu'));
    }
}
