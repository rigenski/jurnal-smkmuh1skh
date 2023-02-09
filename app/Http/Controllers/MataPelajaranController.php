<?php

namespace App\Http\Controllers;

use App\Exports\MataPelajaranFormatExport;
use App\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mata_pelajaran = MataPelajaran::all();

        return view('/admin/mata_pelajaran/index', compact('mata_pelajaran'));
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\MataPelajaranImport, request()->file('data_mata_pelajaran'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.mata_pelajaran')->with('error', 'Data mata pelajaran gagal diimport');
        }

        return redirect()->route('admin.mata_pelajaran')->with('success', 'Data mata pelajaran berhasil diimport');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.mata_pelajaran')->with('error', 'Data mata pelajaran gagal ditambahkan');
        }

        MataPelajaran::create([
            'nama' => $request->nama,
        ]);


        return redirect()->route('admin.mata_pelajaran')->with('success', 'Data mata pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.mata_pelajaran')->with('error', 'Data mata pelajaran gagal diperbarui');
        }

        $mata_pelajaran = MataPelajaran::find($id);

        $mata_pelajaran->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.mata_pelajaran')->with('success', 'Data mata pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mata_pelajaran = MataPelajaran::find($id);

        $mata_pelajaran->delete();

        return redirect()->route('admin.mata_pelajaran')->with('success', 'Data mata pelajaran berhasil dihapus');
    }

    public function format_export()
    {
        return Excel::download(new MataPelajaranFormatExport(), 'Import Mata Pelajaran - SMK N 1 Gondang Sragen' . '.xlsx');
    }
}
