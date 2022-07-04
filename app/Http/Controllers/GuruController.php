<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('/admin/guru/index', compact('guru'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.guru')->with('error', 'Data guru gagal ditambahkan');
        }

        $user = User::create([
            "role" => "guru",
            "username" => $request->username,
            "password" => bcrypt($request->username)
        ]);

        Guru::create([
            "nama" => $request->nama,
            "user_id" => $user->id,
        ]);


        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\GuruImport, request()->file('data_guru'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.guru')->with('error', 'Data guru gagal diimport');
        }

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diimport');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.guru')->with('error', 'Data guru gagal diperbarui');
        }

        $guru = Guru::find($id);

        $guru->update([
            'nama' => $request->nama
        ]);

        User::find($guru->user_id)->update([
            "username" => $request->username,
            "password" => bcrypt($request->username)
        ]);

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);

        $guru->delete();

        User::find($guru->user_id)->delete();

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil dihapus');
    }
}
