<?php

namespace App\Http\Controllers;

use App\AktivitasGuru;
use App\AktivitasGuruIzin;
use App\AktivitasKaryawan;
use App\SiswaPilihan;
use App\JurnalGuru;
use App\Siswa;
use App\Guru;
use App\IzinGuru;
use App\JurnalKaryawan;
use App\Karyawan;
use App\MataPelajaran;
use App\UnitKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $time = Carbon::now();
            $aktivitas_jurnal_guru = AktivitasGuru::where("user_id", auth()->user()->id)->where('created_at', '>', date('Y-m-d'))->get();
            $aktivitas_izin_guru = AktivitasGuruIzin::where("user_id", auth()->user()->id)->whereDate('created_at', '>', date('Y-m-d'))->get();
            $siswa = Siswa::all();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            $mata_pelajaran = MataPelajaran::all();

            return view('form', compact('time', 'aktivitas_jurnal_guru', 'aktivitas_izin_guru', 'siswa', 'user', 'mata_pelajaran'));
        }

        if (auth()->user()->role == 'karyawan') {
            $time = Carbon::now();
            $aktivitas_karyawan = Aktivitaskaryawan::where("user_id", auth()->user()->id)->whereDate('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->get();
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

            if ($request->jenis == 'jurnal') {
                $request->validate([
                    'tanggal' => 'required|date',
                    'kelas' => 'required',
                    'jam_ke' => 'required',
                    'sampai_jam_ke' => 'required',
                    'mata_pelajaran' => 'required',
                    'deskripsi' => 'required',
                ]);

                $class = Siswa::where('kelas', $request->kelas)->get();

                $jurnal_guru = JurnalGuru::create([
                    "nama" => auth()->user()->guru->nama,
                    "tanggal" => $request->tanggal,
                    "kelas" => $request->kelas,
                    "jam_ke" => $request->jam_ke == $request->sampai_jam_ke ? $request->jam_ke : $request->jam_ke . '-' . $request->sampai_jam_ke,
                    "mata_pelajaran" => $request->mata_pelajaran,
                    "siswa_hadir" => $request->siswa ? $class->count() - count($request->siswa) : $class->count(),
                    "siswa_tidak_hadir" =>  $request->siswa ? count($request->siswa) : 0,
                    "deskripsi" => $request->deskripsi,
                    "catatan_siswa" => $request->catatan_siswa,
                ]);

                if ($request->siswa) {
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

                return redirect('/congrats')->with('success', 'jurnal');
            } else if ($request->jenis == 'izin') {
                $request->validate([
                    'jenis_izin' => 'required',
                    'tanggal' => 'required|date',
                    'kelas' => 'required',
                    'jam_ke' => 'required',
                    'sampai_jam_ke' => 'required',
                    'ruang' => 'required',
                    'surat_izin' => 'required',
                ]);

                $izin_guru = IzinGuru::create([
                    "jenis_izin" => $request->jenis_izin,
                    "nama" => auth()->user()->guru->nama,
                    "tanggal" => $request->tanggal,
                    "kelas" => $request->kelas,
                    "jam_ke" => $request->jam_ke == $request->sampai_jam_ke ? $request->jam_ke : $request->jam_ke . '-' . $request->sampai_jam_ke,
                    "ruang" => $request->ruang,
                    "petunjuk_tugas" => $request->petunjuk_tugas,
                ]);

                if ($request->hasFile('petunjuk_tugas_file')) {
                    $rand = Str::random(10);
                    $name_file = pathinfo($request->petunjuk_tugas_file->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . $rand . "." . $request->petunjuk_tugas_file->getClientOriginalExtension();
                    $request->file('petunjuk_tugas_file')->move('dokumen/petunjuk_tugas_file', $name_file);
                    $izin_guru->petunjuk_tugas_file = $name_file;
                    $izin_guru->save();
                }

                if ($request->hasFile('surat_izin')) {
                    $rand = Str::random(10);
                    $name_file = pathinfo($request->surat_izin->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . $rand . "." . $request->surat_izin->getClientOriginalExtension();
                    $request->file('surat_izin')->move('dokumen/surat_izin', $name_file);
                    $izin_guru->surat_izin = $name_file;
                    $izin_guru->save();
                }

                AktivitasGuruIzin::create([
                    'izin_guru_id' => $izin_guru->id,
                    'user_id' => auth()->user()->id
                ]);


                return redirect('/congrats')->with('success', 'izin');
            }
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
