<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class JournalsController extends Controller
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
            'tanggal' => 'required',
            'kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'jam_ke' => 'required',
            'mata_pelajaran' => 'required',
            'siswa_hadir' => 'required',
            'siswa_tidak_hadir' => 'required',
            'deskripsi' => 'required',
        ]);

        \App\Journal::create($request->all());
        return redirect('/congrats')->with('status', 'success');
    }

    public function show()
    {
        $data = \App\Journal::all();
        $jurnal = $data->groupBy('kelas');
        // dd($jurnal);
        return view('admin/data', compact('jurnal'));
    }

    public function congrats()
    {
        return view('congrats');
    }
}
