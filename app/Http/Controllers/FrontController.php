<?php

namespace App\Http\Controllers;

use App\AktivitasGuru;
use App\AktivitasGuruIzin;
use App\AktivitasGuruRefleksi;
use App\AktivitasKaryawan;
use App\SiswaPilihan;
use App\JurnalGuru;
use App\RefleksiGuru;
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
    public function index () {
        return view('index');
    }

    public function jurnalIndex()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $time = Carbon::now();
            $aktivitas_jurnal_guru = AktivitasGuru::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $siswa = Siswa::all();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            $mata_pelajaran = MataPelajaran::all();

            return view('jurnal', compact('time', 'aktivitas_jurnal_guru', 'siswa', 'user', 'mata_pelajaran'));
        }

        if (auth()->user()->role == 'karyawan') {
            $time = Carbon::now();
            $aktivitas_karyawan = Aktivitaskaryawan::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $unit_kerja = UnitKerja::all();
            $user = Karyawan::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            return view('jurnal', compact('time', 'aktivitas_karyawan', 'unit_kerja', 'user'));
        }
    }

    public function izinIndex()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $time = Carbon::now();
            $aktivitas_izin_guru = AktivitasGuruIzin::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $siswa = Siswa::all();
            $user = $user[0];

            $mata_pelajaran = MataPelajaran::all();

            return view('izin', compact('time', 'aktivitas_izin_guru',  'siswa', 'user', 'mata_pelajaran'));
        }
    }

    public function refleksiIndex()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $time = Carbon::now();
            $aktivitas_refleksi_guru = AktivitasGuruRefleksi::where("user_id", auth()->user()->id)->whereMonth('created_at', explode('-', date('Y-m'))[1])->whereYear('created_at', explode('-', date('Y-m'))[0])->get();
            $siswa = Siswa::all();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $user = $user[0];
            $is_last_week = '';

            $mata_pelajaran = MataPelajaran::all();

            return view('refleksi', compact('time', 'aktivitas_refleksi_guru', 'is_last_week', 'siswa', 'user', 'mata_pelajaran'));
        }
    }

    public function jurnalStore(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        
        if (auth()->user()->role == 'guru') {
                $request->validate([
                    'kelas' => 'required',
                    'jam_ke' => 'required',
                    'sampai_jam_ke' => 'required',
                    'mata_pelajaran' => 'required',
                    'deskripsi' => 'required',
                ]);

                $class = Siswa::where('kelas', $request->kelas)->get();

                $jurnal_guru = JurnalGuru::create([
                    "nama" => auth()->user()->guru->nama,
                    "tanggal" => date('Y-m-d'),
                    "kelas" => $request->kelas,
                    "jam_ke" => $request->jam_ke == $request->sampai_jam_ke ? $request->jam_ke : $request->jam_ke . '-' . $request->sampai_jam_ke,
                    "mata_pelajaran" => $request->mata_pelajaran,
                    "siswa_hadir" => $request->siswa ? $class->count() - count($request->siswa) : $class->count(),
                    "siswa_tidak_hadir" =>  $request->siswa ? count($request->siswa) : 0,
                    "deskripsi" => $request->deskripsi,
                    "catatan_siswa" => $request->catatan_siswa,
                ]);

                if ($request->siswa) {
                    foreach ($request->siswa as $index => $siswa) {
                        $nis_siswa = explode("-", $siswa)[0];
                        $status = explode("-", $siswa)[1];

                        $siswa = Siswa::find($nis_siswa);

                        if($status !== 'Hadir') {
                            SiswaPilihan::create([
                                "jurnal_guru_id" => $jurnal_guru->id,
                                "nama_siswa" => $siswa->nama,
                                "status" => $status,
                            ]);
                        }
                    }
                }

                AktivitasGuru::create([
                    'jurnal_guru_id' => $jurnal_guru->id,
                    'user_id' => auth()->user()->id
                ]);

                return redirect('/congrats')->with('success', 'jurnal');
        }

        if (auth()->user()->role == 'karyawan') {
            $request->validate([
                'unit_kerja' => 'required',
                'deskripsi' => 'required',
            ]);

            $jurnal_karyawan = JurnalKaryawan::create([
                "nama" => auth()->user()->karyawan->nama,
                "tanggal" => date('Y-m-d'),
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

    public function izinStore(Request $request) {
        date_default_timezone_set("Asia/Jakarta");

        $request->validate([
            'jenis_izin' => 'required',
            'kelas' => 'required',
            'jam_ke' => 'required',
            'sampai_jam_ke' => 'required',
            'ruang' => 'required',
            'surat_izin' => 'required',
        ]);

        $izin_guru = IzinGuru::create([
            "jenis_izin" => $request->jenis_izin,
            "nama" => auth()->user()->guru->nama,
            "tanggal" => date('Y-m-d'),
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

    public function refleksiStore(Request $request) {
        $request->validate([
            'kelas' => 'required',
            'mata_pelajaran' => 'required',
            'pertanyaan1' => 'required',
            'pertanyaan2' => 'required',
            'pertanyaan3' => 'required',
            'pertanyaan4' => 'required',
            'pertanyaan5' => 'required',
            'pertanyaan6' => 'required',
            'pertanyaan7' => 'required',
            'pertanyaan8' => 'required',
        ]);

        $refleksi_guru = RefleksiGuru::create([
            "nama" => auth()->user()->guru->nama,
            "bulan" => date('Y-m'),
            "kelas" => $request->kelas,
            "mata_pelajaran" => $request->mata_pelajaran,
            "pertanyaan1" => $request->pertanyaan1,
            "pertanyaan2" => $request->pertanyaan2,
            "pertanyaan3" => $request->pertanyaan3,
            "pertanyaan4" => $request->pertanyaan4,
            "pertanyaan5" => $request->pertanyaan5,
            "pertanyaan6" => $request->pertanyaan6,
            "pertanyaan7" => $request->pertanyaan7,
            "pertanyaan8" => $request->pertanyaan8,
        ]);

        AktivitasGuruRefleksi::create([
            'refleksi_guru_id' => $refleksi_guru->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/congrats')->with('success', 'refleksi');
    }


    public function congrats()
    {
        return view('congrats');
    }
}
