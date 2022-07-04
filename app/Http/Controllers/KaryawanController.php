<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();

        return view('/admin/karyawan/index', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.karyawan')->with('error', 'Data karyawan gagal ditambahkan');
        }

        $user = User::create([
            "role" => "karyawan",
            "username" => $request->username,
            "password" => bcrypt($request->username)
        ]);

        Karyawan::create([
            "nama" => $request->nama,
            "user_id" => $user->id,
        ]);


        return redirect()->route('admin.karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\KaryawanImport, request()->file('data_karyawan'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.karyawan')->with('error', 'Data karyawan gagal diimport');
        }

        return redirect()->route('admin.karyawan')->with('success', 'Data karyawan berhasil diimport');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.karyawan')->with('error', 'Data karyawan gagal diperbarui');
        }

        $karyawan = Karyawan::find($id);

        $karyawan->update([
            'nama' => $request->nama
        ]);

        User::find($karyawan->user_id)->update([
            "username" => $request->username,
            "password" => bcrypt($request->username)
        ]);

        return redirect()->route('admin.karyawan')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        $karyawan->delete();

        User::find($karyawan->user_id)->delete();

        return redirect()->route('admin.karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }
}
