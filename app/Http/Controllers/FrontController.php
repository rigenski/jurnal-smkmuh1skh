<?php

namespace App\Http\Controllers;

use App\AktivitasGuru;
use App\AktivitasKaryawan;
use App\SiswaPilihan;
use App\JurnalGuru;
use App\Siswa;
use App\Guru;
use App\JurnalKaryawan;
use App\Karyawan;
use App\UnitKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $time = Carbon::now();
            $aktivitas_guru = AktivitasGuru::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $siswa = Siswa::all();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            return view('form', compact('time', 'aktivitas_guru', 'siswa', 'user'));
        }

        if (auth()->user()->role == 'karyawan') {
            $time = Carbon::now();
            $aktivitas_karyawan = Aktivitaskaryawan::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $unit_kerja = UnitKerja::all();
            $user = Karyawan::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            return view('form', compact('time', 'aktivitas_karyawan', 'unit_kerja', 'user'));
        }
    }

    public function create(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {

            $request->validate([
                'tanggal' => 'required|date',
                'kelas' => 'required',
                'jam_ke' => 'required',
                'mata_pelajaran' => 'required',
                'deskripsi' => 'required',
            ]);

            $class = Siswa::where('kelas', $request->kelas)->get();

            $jurnal_guru = JurnalGuru::create([
                "nama" => auth()->user()->guru->nama,
                "tanggal" => $request->tanggal,
                "kelas" => $request->kelas,
                "jam_ke" => $request->jam_ke,
                "mata_pelajaran" => $request->mata_pelajaran,
                "siswa_hadir" => $request->siswa ? $class->count() - count($request->siswa) : $class->count(),
                "siswa_tidak_hadir" =>  $request->siswa ? count($request->siswa) : 0,
                "deskripsi" => $request->deskripsi,
            ]);
            
            if($request->siswa) {

            foreach ($request->siswa as $siswa) {
                $siswa = Siswa::find($siswa);

                SiswaPilihan::create([
                    "jurnal_guru_id" => $jurnal_guru->id,
                    "nama_siswa" => $siswa->nama,
                ]);
            }
            
            }

            AktivitasGuru::create([
                'jurnal_guru_id' => $jurnal_guru->id,
                'user_id' => auth()->user()->id
            ]);

            return redirect('/congrats')->with('success', 'success');
        }

        if (auth()->user()->role == 'karyawan') {
            $request->validate([
                'tanggal' => 'required|date',
                'unit_kerja' => 'required',
                'deskripsi' => 'required',
            ]);

            $jurnal_karyawan = JurnalKaryawan::create([
                "nama" => auth()->user()->karyawan->nama,
                "tanggal" => $request->tanggal,
                "unit_kerja" => $request->unit_kerja,
                "deskripsi" => $request->deskripsi,
            ]);

            AktivitasKaryawan::create([
                'jurnal_karyawan_id' => $jurnal_karyawan->id,
                'user_id' => auth()->user()->id
            ]);

            return redirect('/congrats')->with('success', 'success');
        }
    }

    public function congrats()
    {
        return view('congrats');
    }
}
