<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('/admin/guru', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/guru')->with('error', 'Data guru gagal ditambahkan');
        }

        $user = User::create([
            "role" => "teacher",
            "username" => $request->username,
            "password" => bcrypt("mutuharjo")
        ]);

        Teacher::create([
            "nama" => $request->nama,
            "user_id" => $user->id,
        ]);


        return redirect('/admin/guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\TeachersImport, request()->file('teachers_data'));
        } catch (\Exception $ex) {
            return redirect()->route('guru')->with('error', 'Data guru gagal diimport');
        }

        return redirect()->route('guru')->with('success', 'Data guru berhasil diimport');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/guru')->with('error', 'Data guru gagal diperbarui');
        }

        $teacher = Teacher::find($id);

        $teacher->update([
            'nama' => $request->nama
        ]);

        User::find($teacher->user_id)->update([
            "username" => $request->username,
            "password" => bcrypt($request->username)
        ]);

        return redirect('/admin/guru')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        $teacher->delete();

        User::find($teacher->user_id)->delete();

        return redirect('/admin/guru')->with('success', 'Data guru berhasil dihapus');
    }
}
