<?php

namespace App\Http\Controllers;

use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $unit_kerja = UnitKerja::all();

        return view('/admin/unit_kerja/index', compact('unit_kerja'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.unit_kerja')->with('error', 'Data unit kerja gagal ditambahkan');
        }

        UnitKerja::create([
            'nama' => $request->nama,
        ]);


        return redirect()->route('admin.unit_kerja')->with('success', 'Data unit kerja berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.unit_kerja')->with('error', 'Data unit kerja gagal diperbarui');
        }

        $unit_kerja = UnitKerja::find($id);

        $unit_kerja->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.unit_kerja')->with('success', 'Data unit kerja berhasil diperbarui');
    }

    public function destroy($id)
    {
        $unit_kerja = UnitKerja::find($id);

        $unit_kerja->delete();

        return redirect()->route('admin.unit_kerja')->with('success', 'Data unit kerja berhasil dihapus');
    }
}
