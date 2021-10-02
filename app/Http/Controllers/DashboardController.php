<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Journal;
use App\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $journals = Journal::orderBy('tanggal', 'desc')->get();
        $teachers = Teacher::all();
        $students = Student::all();

        $journals_day = Journal::whereDate('tanggal', Carbon::today())->select([
            DB::raw('siswa_hadir'),
            DB::raw('siswa_tidak_hadir'),
            DB::raw('DATE(tanggal) as tanggal')
        ])->get()->toArray();

        $journals_week = [];

        for ($i = 0; $i < 7; $i++) {
            $journal = Journal::where('tanggal', [DATE('Y-m-d', strtotime('-' . $i . 'days')), DATE('Y-m-d')])
                ->select([
                    DB::raw('siswa_hadir'),
                    DB::raw('siswa_tidak_hadir'),
                    DB::raw('kelas'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->orderBy('tanggal', 'desc')
                ->get()
                ->toArray();

            array_push($journals_week, $journal);
        }


        $journals_day = json_encode($journals_day);
        $journals_week = json_encode($journals_week);


        return view('admin/index', compact('journals', 'teachers', 'students', 'journals_day', 'journals_week'));
    }
}
