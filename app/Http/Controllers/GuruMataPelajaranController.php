<?php

namespace App\Http\Controllers;

use App\Exports\GuruMataPelajaranFormatExport;
use App\Exports\MataPelajaranFormatExport;
use App\Guru;
use App\GuruMataPelajaran;
use App\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class GuruMataPelajaranController extends Controller
{
    public function index()
    {
        $data_guru_mata_pelajaran = GuruMataPelajaran::all();
        $data_mata_pelajaran = MataPelajaran::all();
        $data_guru = Guru::all();

        return view('/admin/guru_mata_pelajaran/index', compact('data_guru_mata_pelajaran', 'data_mata_pelajaran', 'data_guru'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'mata_pelajaran' => 'required',
            'guru' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.guru_mata_pelajaran')->with('error', 'Data guru mata pelajaran gagal ditambahkan');
        }

        GuruMataPelajaran::create([
            'kelas' => $request->kelas,
            'mata_pelajaran_id' => $request->mata_pelajaran,
            'guru_id' => $request->guru,
        ]);


        return redirect()->route('admin.guru_mata_pelajaran')->with('success', 'Data guru mata pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'mata_pelajaran' => 'required',
            'guru' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.guru_mata_pelajaran')->with('error', 'Data guru mata pelajaran gagal diperbarui');
        }

        $guru_mata_pelajaran = GuruMataPelajaran::find($id);

        $guru_mata_pelajaran->update([
            'kelas' => $request->kelas,
            'mata_pelajaran_id' => $request->mata_pelajaran,
            'guru_id' => $request->guru,
        ]);

        return redirect()->route('admin.guru_mata_pelajaran')->with('success', 'Data guru mata pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru_mata_pelajaran = GuruMataPelajaran::find($id);

        $guru_mata_pelajaran->delete();

        return redirect()->route('admin.guru_mata_pelajaran')->with('success', 'Data guru mata pelajaran berhasil dihapus');
    }

    public function format_export()
    {
        return Excel::download(new GuruMataPelajaranFormatExport(), 'Import Guru Mata Pelajaran - SMK Muhammadiyah 1 Sukoharjo' . '.xlsx');
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\GuruMataPelajaranImport, request()->file('data_guru_mata_pelajaran'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.guru_mata_pelajaran')->with('error', 'Data guru mata pelajaran gagal diimport');
        }

        return redirect()->route('admin.guru_mata_pelajaran')->with('success', 'Data guru mata pelajaran berhasil diimport');
    }

    public function reset()
    {
        GuruMataPelajaran::truncate();

        return redirect()->route('admin.guru_mata_pelajaran')->with('success', 'Data guru mata pelajaran berhasil direset');
    }
}
