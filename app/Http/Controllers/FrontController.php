<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Choice;
use App\Journal;
use App\Student;
use DateTime;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $time = new DateTime();
        $activities = Activity::where("user_id", auth()->user()->id)->get();
        $students = Student::all();

        return view('form', compact('time', 'activities', 'students'));
    }

    public function create(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $request->validate([
            'tanggal' => 'required|date',
            'kelas' => 'required',
            'jam_ke' => 'required',
            'mata_pelajaran' => 'required',
            'deskripsi' => 'required',
            'siswa' => 'required',
        ]);

        $class = Student::where('kelas', $request->kelas)->get();

        $journal = Journal::create([
            "nama" => auth()->user()->teacher->nama,
            "tanggal" => $request->tanggal,
            "kelas" => $request->kelas,
            "jam_ke" => $request->jam_ke,
            "mata_pelajaran" => $request->mata_pelajaran,
            "siswa_hadir" => $class->count() - count($request->siswa),
            "siswa_tidak_hadir" => count($request->siswa),
            "deskripsi" => $request->deskripsi,
        ]);

        foreach ($request->siswa as $siswa) {
            $student = Student::find($siswa);

            Choice::create([
                "journal_id" => $journal->id,
                "nama_siswa" => $student->nama,
            ]);
        }

        Activity::create([
            'journal_id' => $journal->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/congrats')->with('success', 'success');
    }

    public function show()
    {
        $data = Journal::all();
        $jurnal = $data->groupBy('kelas');

        return view('admin/data', compact('jurnal'));
    }

    public function congrats()
    {
        return view('congrats');
    }
}
