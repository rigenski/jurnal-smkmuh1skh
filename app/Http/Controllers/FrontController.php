<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Journal;
use DateTime;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $time = new DateTime();
        return view('form', compact('time'));
    }

    public function create(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $request->validate([
            'tanggal' => 'required|date',
            'kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'jam_ke' => 'required',
            'mata_pelajaran' => 'required',
            'siswa_hadir' => 'required',
            'siswa_tidak_hadir' => 'required',
            'deskripsi' => 'required',
        ]);

        $journal = Journal::create([
            "nama" => auth()->user()->name,
            "tanggal" => $request->tanggal,
            "kelas" => $request->kelas,
            "kompetensi_keahlian" => $request->kompetensi_keahlian,
            "jam_ke" => $request->jam_ke,
            "mata_pelajaran" => $request->mata_pelajaran,
            "siswa_hadir" => $request->siswa_hadir,
            "siswa_tidak_hadir" => $request->siswa_tidak_hadir,
            "deskripsi" => $request->deskripsi,
        ]);

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
