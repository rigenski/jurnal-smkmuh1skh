<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('/admin/siswa', compact('students'));
    }

    public function import()
    {
        try {
            Excel::import(new \App\Imports\StudentsImport, request()->file('students_data'));
        } catch (\Exception $ex) {
            return redirect()->route('siswa')->with('error', 'Data siswa gagal diimport');
        }

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil diimport');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:students,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/siswa')->with('error', 'Data siswa gagal ditambahkan');
        }

        Student::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);


        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/siswa')->with('error', 'Data siswa gagal diperbarui');
        }

        $student = Student::find($id);

        $student->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return redirect('/admin/siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
