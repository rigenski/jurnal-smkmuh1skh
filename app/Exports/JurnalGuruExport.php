<?php

namespace App\Exports;

use App\JurnalGuru;
use App\Siswa;
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

        if ($search1 !== null && $search2 == null) {
            $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search1 . '%');
                  if($kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $kelas)
                        ->orderBy('created_at', 'desc')
                        ->get();           
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get();
                    }
        } else if ($search1 == null && $search2 !== null) {
            $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search2 . '%');
                  if($kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $kelas)
                        ->orderBy('created_at', 'desc')
                        ->get();           
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get();
                    }
        } else if ($search1 !== null && $search2 !== null) {
            $jurnal_guru = JurnalGuru::whereBetween('tanggal', [DATE($search1), DATE($search2)]);
                  if($kelas !== null) {
                        $jurnal_guru = $jurnal_guru->where('kelas', $kelas)
                        ->orderBy('created_at', 'desc')
                        ->get();           
                    } else {
                        $jurnal_guru = $jurnal_guru
                        ->orderBy('created_at', 'desc')
                        ->get();
                    }
        } else {
            $jurnal_guru = [];
        }

        $siswa = Siswa::all();

        return view('admin/jurnal_guru/table', compact('jurnal_guru', 'siswa'));
    }
}
