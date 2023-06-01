<?php

namespace App\Http\Controllers;

use App\Exports\SiswaFormatExport;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();

        return view('/admin/siswa/index', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.siswa')->with('error', 'Data siswa gagal ditambahkan');
        }

        $user = User::create([
            'role' => 'siswa',
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.siswa')->with('error', 'Data siswa gagal diperbarui');
        }

        $siswa = Siswa::find($id);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        if ($request->password) {
            User::find($siswa->user_id)->update([
                "username" => $request->username,
                "password" => bcrypt($request->password)
            ]);
        } else {
            User::find($siswa->user_id)->update([
                "username" => $request->username,
            ]);
        }

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        $siswa->delete();

        User::find($siswa->user_id)->delete();

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    public function format_export()
    {
        return Excel::download(new SiswaFormatExport(), 'Import Siswa - SMK Muhammadiyah 1 Sukoharjo' . '.xlsx');
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\SiswaImport, request()->file('data_siswa'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.siswa')->with('error', 'Data siswa gagal diimport');
        }

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil diimport');
    }

    public function reset()
    {
        $data_siswa = Siswa::all();

        foreach ($data_siswa as $siswa) {
            $siswa->delete();

            User::find($siswa->user_id)->delete();
        }

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil direset');
    }
}
