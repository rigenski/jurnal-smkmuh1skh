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
use Illuminate\Support\Facades\DB;
use App\Exports\JurnalGuruExport;
use Maatwebsite\Excel\Facades\Excel;

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
            $aktivitas_jurnal_karyawan = Aktivitaskaryawan::where("user_id", auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
            $unit_kerja = UnitKerja::all();
            $user = Karyawan::where('user_id', auth()->user()->id)->get();
            $user = $user[0];

            return view('jurnal', compact('time', 'aktivitas_jurnal_karyawan', 'unit_kerja', 'user'));
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
                    "mengajar_jam_terakhir" => $request->mengajar ?? null,
                    "mendampingi_kelas" => $request->mendampingi ?? null,
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

                return redirect('/result')->with('success', 'jurnal');
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

            return redirect('/result')->with('success', 'success');
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

    public function izinStore(Request $request) {
        date_default_timezone_set("Asia/Jakarta");

        $request->validate([
            'jenis_izin' => 'required',
            'kelas' => 'required',
            'jam_ke' => 'required',
            'sampai_jam_ke' => 'required',
            'ruang' => 'required',
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

        return redirect('/result')->with('success', 'izin');
    }


    public function refleksiIndex()
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            $month = date('m') != date('m', strtotime('+1 week')) ? date('Y-m') : date('Y-m', strtotime('-1 month', strtotime(date('Y-m-d'))));

            $time = Carbon::now();
            $aktivitas_refleksi_guru = AktivitasGuruRefleksi::where("user_id", auth()->user()->id)->whereMonth('created_at', explode('-', $month)[1])->whereYear('created_at', explode('-', $month)[0])->get();
            $siswa = Siswa::all();
            $user = Guru::where('user_id', auth()->user()->id)->get();
            $user = $user[0];
            $is_last_week = '';

            $mata_pelajaran = MataPelajaran::all();

            return view('refleksi', compact('time', 'aktivitas_refleksi_guru', 'is_last_week', 'siswa', 'user', 'mata_pelajaran'));
        }
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
            "bulan" => date('m') != date('m', strtotime('+1 week')) ? date('Y-m') : date('Y-m', strtotime('-1 month', strtotime(date('Y-m-d')))),
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

        return redirect('/result')->with('success', 'refleksi');
    }


    public function result()
    {
        return view('result');
    }

    public function rekapIndex(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'guru') {
            date_default_timezone_set("Asia/Jakarta");

            if ($request->has('search1') && $request->search2 == null) {
                $jurnal_guru = DB::table('jurnal_guru')
                    ->select([
                        DB::raw('count(*) as jumlah'),
                        DB::raw('DATE(tanggal) as tanggal')
                    ])
                    ->groupBy('tanggal')
                    ->where('tanggal', 'LIKE', '%' . $request->search1 . '%');

                    if($request->kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $request->kelas)
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    }
            } else if ($request->has('search2') && $request->search1 == null) {
                $jurnal_guru = DB::table('jurnal_guru')
                    ->select([
                        DB::raw('count(*) as jumlah'),
                        DB::raw('DATE(tanggal) as tanggal')
                    ])
                    ->groupBy('tanggal')
                    ->where('tanggal', 'LIKE', '%' . $request->search2 . '%');
                    
                    if($request->kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $request->kelas)
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    }
            } else if ($request->has('search1') && $request->has('search2')) {
                $jurnal_guru = DB::table('jurnal_guru')
                    ->select([
                        DB::raw('count(*) as jumlah'),
                        DB::raw('DATE(tanggal) as tanggal')
                    ])
                    ->groupBy('tanggal')
                    ->whereBetween('tanggal', [DATE($request->search1), DATE($request->search2)]);
                    
                    if($request->kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $request->kelas)
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
                    }
            } else {
                $jurnal_guru = [];
            }

            $siswa = Siswa::all();

            session(['search1' => $request->search1, 'search2' => $request->search2, 'kelas' => $request->kelas]);

            return view('rekap', ['jurnal_guru' => $jurnal_guru, 'siswa' => $siswa, 'request' => $request]);
        }
    }

    public function rekapExport()
    {
<<<<<<< HEAD
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');

        return Excel::download(new JurnalGuruExport(), 'Jurnal Guru SMK Muhammadiyah 1 Sukoharjo - ' . '.xlsx');
    }
=======
        return Excel::download(new JurnalGuruExport(), 'Rekap Absensi Guru SMK Muhammadiyah 1 Sukoharjo - ' . '.xlsx');
    }

    public function sertifikatIndex(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'siswa') {
            $data_aktifitas_siswa_sertifikat = AktivitasSiswaSertifikat::where('user_id', auth()->user()->id)->get();

            return view('sertifikat', compact('data_aktifitas_siswa_sertifikat'));
        } else if (auth()->user()->role === 'guru') {
            date_default_timezone_set("Asia/Jakarta");

            if ($request->has('angkatan') && $request->has('kelas')) {
                $data_siswa = Siswa::where('kelas', $request->kelas)->get();
                $data_siswa_sertifikat = SiswaSertifikat::all();
            } else {
                $data_siswa = [];
                $data_siswa_sertifikat = [];
            }

            $siswa = Siswa::all();

            return view('sertifikat', ['siswa' => $siswa, 'data_siswa' => $data_siswa, 'data_siswa_sertifikat' => $data_siswa_sertifikat, 'request' => $request]);
        }
    }

    public function sertifikatPrint($siswa_sertifikat_id)
    {
        date_default_timezone_set("Asia/Jakarta");

        $siswa_sertifikat = SiswaSertifikat::find($siswa_sertifikat_id);

        $html = "
                    <html>
                    <head>
                    </head>
                    <body style='font-family: Arial;font-size: 14px;'>
                        <div style='text-align: center;margin: 0 0 48px;'>
                            <img src='" . asset('/img/logo-smk.png') . "' style='width: 64px;'>
                        </div>
                        <h2 style='font-size: 24px;text-align: center; margin: 0 0 4px;'>SERTIFIKASI UJI KOMPETENSI</h2>
                        <p style='text-align: center; margin: 0 0 32px;'>Nomor: " . $siswa_sertifikat->sertifikat->nomor . "</p>
                        <p style='text-align: center; margin: 0 0 8px;'>Dengan ini menyatakan bahwa,</p>
                        <h2 style='font-size: 24px;text-align: center; margin: 0 0 4px;'>" . $siswa_sertifikat->nama . "</h2>
                        <h4 style='text-align: center; margin: 0 0 32px;'>NIS:" . $siswa_sertifikat->nis . "</h4>
                        <p style='text-align: center; margin: 0 0 8px;'>pada Program Keahlian</p>
                        <h2 style='font-size: 20px;text-align: center; margin: 0 0 32px;'>" . $siswa_sertifikat->keahlian . "</h2>
                        <p style='text-align: center; margin: 0 0 8px;'>pada Judul Penugasan</p>
                        <h4 style='font-size: 16px;text-align: center; margin: 0 0 32px;'>" . $siswa_sertifikat->penugasan . "</h4>
                        <p style='text-align: center; margin: 0 0 8px;'>dengan Predikat</p>
                        <h3 style='font-size: 16px;text-align: center; margin: 0 0 106px;'>" . $siswa_sertifikat->predikat . "</h3>
                        <p style='text-align: center; margin: 0 0 8px;'>" . $siswa_sertifikat->sertifikat->tempat . ", " . Carbon::parse($siswa_sertifikat->sertifikat->tanggal)->locale(App::getLocale())->isoFormat('DD MMMM YYYY') . "</p>
                    </body>
                ";

        $mpdf = new Mpdf();
        $mpdf->AddPage('P');
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(16, 220);
        $mpdf->WriteCell(6.4, 0.4, 'Atas nama SMK Muhammadiyah 1 Sukoharjo', 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(16, 244);
        $mpdf->WriteCell(6.4, 0.4, 'Drs. BAMBANG SAHANA, M.Pd', 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(16, 250);
        $mpdf->WriteCell(6.4, 0.4, 'Kepala Sekolah', 0, 'C');


        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 220);
        $mpdf->WriteCell(6.4, 0.4, $siswa_sertifikat->sertifikat->perusahaan_penguji, 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 244);
        $mpdf->WriteCell(6.4, 0.4, $siswa_sertifikat->sertifikat->nama_penguji, 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 250);
        $mpdf->WriteCell(6.4, 0.4, 'Penguji Eksternal', 0, 'C');

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(16, 280);
        $mpdf->WriteCell(6.4, 0.4, 'No. ' . $siswa_sertifikat->nis . '/' . Carbon::parse($siswa_sertifikat->sertifikat->tanggal)->locale(App::getLocale())->isoFormat('DDMMYY'), 0, 'C');

        $mpdf->Image(asset('/img/bg-sertifikat-front.png'), 0, 0, 'auto', 298, 'png', '', true, false);
        $mpdf->Image(asset('/img/logo-kepsek.png'), 16, 226, 'auto', 24, 'png', '', true, false);
        $mpdf->Image(asset('/img/cap-sekolah.png'), 8, 226, 'auto', 32, 'png', '', true, false);
        $mpdf->Image(asset('/dokumen/sertifikat/' . $siswa_sertifikat->sertifikat->ttd_penguji), 140, 226, 'auto', 24, 'png', '', true, false);

        $data_kompetensi = explode('_', $siswa_sertifikat->kompetensi);

        $html_kompetensi = '';

        foreach ($data_kompetensi as $key => $item) {
            $html_kompetensi .=
                "<tr>
                    <td style='width: 24px;text-align: center;'>" . ($key + 1) . "</td>
                    <td>" . $item . "</td>
                </tr>";
        }

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(24, 284);
        $mpdf->WriteCell(6.4, 0.4, '', 0, 'C');


        $html2 = "
                    <html>
                    <head>
                        <style>
                        table {
                            border-collapse: collapse;
                        }
                        th, td {
                            padding: 4px 8px;
                        }
                        </style>
                    </head>
                    <body style='font-family: Arial;font-size: 12px;'>
                        <h3 style='text-align: center; margin: 0 0 16px;font-weight: 400;'>DAFTAR KOMPETENSI</h3>
                        <table border='1' style='width: 100%;'>
                            <thead>
                                <tr>
                                    <th style='width: 24px;text-align: center;'>No</th>
                                    <th>Judul Kompetensi</th>
                                </tr>
                            </thead>
                            <tbody>
                               " . $html_kompetensi . "
                            </tbody>
                        </table>
                    </body>
                ";

        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html2);

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(16, 280);
        $mpdf->WriteCell(6.4, 0.4, 'No. ' . $siswa_sertifikat->nis . '/' . Carbon::parse($siswa_sertifikat->sertifikat->tanggal)->locale(App::getLocale())->isoFormat('DDMMYY'), 0, 'C');

        $mpdf->Image(asset('/img/bg-sertifikat-back.png'), 0, 0, 'auto', 298, 'png', '', true, false);

        $mpdf->Output('Sertifikat Kompetensi - SMK Muhammadiyah 1 Sukoharjo' . '.pdf', 'I');
        exit;
    }

    public function sertifikatInfoIndex(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'siswa') {
            return view('sertifikat/info', compact('request'));
        }
    }


    public function kehadiranIndex(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if (auth()->user()->role == 'siswa') {
            date_default_timezone_set("Asia/Jakarta");

            if ($request->has('search1') && $request->search2 == null) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', auth()->user()->siswa->kelas)
                    ->where('tanggal', 'LIKE', '%' . $request->search1 . '%')->get();
            } else if ($request->has('search2') && $request->search1 == null) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', auth()->user()->siswa->kelas)
                    ->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->get();
            } else if ($request->has('search1') && $request->has('search2')) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', auth()->user()->siswa->kelas)
                    ->whereBetween('tanggal', [DATE($request->search1), DATE($request->search2)])->get();
            } else {
                $data_jurnal_guru = [];
            }

            $data_tanggal = [];

            if (count($data_jurnal_guru)) {
                $tanggal_awal = Carbon::createFromFormat('Y-m-d', $request->search1);
                $tanggal_akhir = Carbon::createFromFormat('Y-m-d', $request->search2);

                for ($date = $tanggal_awal; $date <= $tanggal_akhir; $date->addDay()) {
                    $data_tanggal[] = $date->format('Y-m-d');
                }
            }

            $data_jam = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

            $data_jurnal_guru_group = [];

            foreach ($data_tanggal as $tanggal) {
                $data_jurnal_guru_group[$tanggal] = collect($data_jurnal_guru)->where('tanggal', $tanggal)->all();
            }

            session(['search1' => $request->search1, 'search2' => $request->search2]);

            return view('kehadiran', ['request' => $request, 'data_jam' => $data_jam, 'data_jurnal_guru_group' => $data_jurnal_guru_group]);
        }
    }
>>>>>>> 7f38a57 (feat: added refleksi siswa dan guru)
}
