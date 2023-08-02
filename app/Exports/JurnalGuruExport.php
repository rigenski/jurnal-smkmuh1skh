<?php

namespace App\Exports;

use App\JurnalGuru;
use App\Siswa;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class JurnalGuruExport implements FromView, ShouldAutoSize, WithTitle
{
    public function title(): string
    {
        return 'List Jurnal Guru';
    }

    public function view(): View
    {
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');
        $kelas = session()->get('kelas');

        if ($kelas !== null) {
            if ($search1 !== null && $search2 == null) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', $kelas)
                    ->where('tanggal', 'LIKE', '%' . $search1 . '%')->get();
            } else if ($search1 == null && $search2 !== null) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', $kelas)
                    ->where('tanggal', 'LIKE', '%' . $search2 . '%')->get();
            } else if ($search1 !== null && $search2 !== null) {
                $data_jurnal_guru = JurnalGuru::with(['siswa_pilihan'])->where('kelas', $kelas)
                    ->whereBetween('tanggal', [DATE($search1), DATE($search2)])->get();
            } else {
                $data_jurnal_guru = [];
            }

            $data_siswa = Siswa::where('kelas', $kelas)->get();

            $data_tanggal = [];

            if (count($data_jurnal_guru)) {
                $tanggal_awal = Carbon::createFromFormat('Y-m-d', $search1);
                $tanggal_akhir = Carbon::createFromFormat('Y-m-d', $search2);

                for ($date = $tanggal_awal; $date <= $tanggal_akhir; $date->addDay()) {
                    $data_tanggal[] = $date->format('Y-m-d');
                }
            }

            $data_jurnal_guru_group = [];

            foreach ($data_tanggal as $tanggal) {
                $data_jurnal_guru_group[$tanggal] = collect($data_jurnal_guru)->where('tanggal', $tanggal)->all();
            }

            return view('admin/jurnal_guru/table-kelas', compact('data_jurnal_guru', 'data_siswa', 'data_jurnal_guru_group'));
        } else {
            if ($search1 !== null && $search2 == null) {
                $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search1 . '%')->orderBy('created_at', 'desc')
                    ->get();
            } else if ($search1 == null && $search2 !== null) {
                $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search2 . '%')->orderBy('created_at', 'desc')
                    ->get();
            } else if ($search1 !== null && $search2 !== null) {
                $jurnal_guru = JurnalGuru::whereBetween('tanggal', [DATE($search1), DATE($search2)])->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $jurnal_guru = [];
            }

            $siswa = Siswa::all();

            return view('admin/jurnal_guru/table', compact('jurnal_guru', 'siswa'));
        }
    }
}
