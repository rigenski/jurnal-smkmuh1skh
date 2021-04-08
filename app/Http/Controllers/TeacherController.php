<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('/admin/teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Teacher::create($request->all());

        return redirect('/admin/teacher')->with('mess', 'Data guru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Teacher::find($id)->update($request->all());

        return redirect('/admin/teacher')->with('mess', 'Data guru berhasil diubah');
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();

        return redirect('/admin/teacher')->with('mess', 'Data guru berhasil dihapus');
    }
}
