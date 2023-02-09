<?php

namespace App\Http\Controllers;

use App\Exports\IzinGuruExport;
use App\IzinGuru;
use App\JurnalGuru;
use App\PengaturanIzinGuru;
use App\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IzinGuruController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if ($request->has('tanggal')) {
            $data_izin = IzinGuru::where('tanggal', $request->tanggal)->get();
            $data_jurnal = JurnalGuru::where('tanggal', $request->tanggal)->get();
        } else {
            $data_izin = IzinGuru::where('tanggal', date('Y-m-d'))->get();
            $data_jurnal = JurnalGuru::where('tanggal', date('Y-m-d'))->get();
        }

        $data_pengaturan_izin_guru = PengaturanIzinGuru::all();

        $data_kelas = Siswa::all()->unique('kelas')->values()->all();

        $data_jam = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

        $data_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        session(['izin_guru-tanggal' => $request->tanggal ? $request->tanggal : date('Y-m-d')]);

        return view('admin/izin_guru/index', ['data_izin' => $data_izin, 'data_jurnal' => $data_jurnal, 'data_pengaturan_izin_guru' => $data_pengaturan_izin_guru, 'data_kelas' => $data_kelas, 'data_jam' => $data_jam, 'data_hari' => $data_hari, 'tanggal' => $request->tanggal]);
    }

    public function export()
    {
        $tanggal = session()->get('izin_guru-tanggal');

        return Excel::download(new IzinGuruExport(), 'Izin Guru - SMK N 1 Gondang Sragen - ' . $tanggal . '.xlsx');
    }

    public function setting(Request $request)
    {
        $pengaturan = PengaturanIzinGuru::first();

        if ($pengaturan) {
            $jam_ke = '';
            foreach ($request->all() as $key => $item) {
                if ($key !== '_token') {
                    $hari = explode('-', $key)[0];
                    $kelas = str_replace('_', " ", explode('-', $key)[1]);
                    $tipe = explode('-', $key)[2];

                    if ($tipe == 'jam_ke') {
                        $jam_ke = $item;
                    } else {
                        $jam_ke = $jam_ke == $item ? $jam_ke : $jam_ke . '-' . $item;
                    }

                    if ($tipe == 'sampai_jam_ke') {
                        $pengaturan_izin_guru = PengaturanIzinGuru::where('hari', $hari)->where('kelas', $kelas)->first();

                        $pengaturan_izin_guru->update([
                            'hari' => $hari,
                            'kelas' => $kelas,
                            'jam_ke' => $jam_ke,
                        ]);

                        $jam_ke = '';
                    }
                }
            }
        } else {
            $jam_ke = '';
            foreach ($request->all() as $key => $item) {
                if ($key !== '_token') {
                    $hari = explode('-', $key)[0];
                    $kelas = str_replace('_', " ", explode('-', $key)[1]);
                    $tipe = explode('-', $key)[2];

                    if ($tipe == 'jam_ke') {
                        $jam_ke = $item;
                    } else {
                        $jam_ke = $jam_ke == $item ? $jam_ke : $jam_ke . '-' . $item;
                    }

                    if ($tipe == 'sampai_jam_ke') {
                        PengaturanIzinGuru::create([
                            'hari' => $hari,
                            'kelas' => $kelas,
                            'jam_ke' => $jam_ke,
                        ]);

                        $jam_ke = '';
                    }
                }
            }
        }


        return redirect()->route('admin.izin_guru')->with('success', 'Pengaturan jam berhasil diperbarui');
    }
}
