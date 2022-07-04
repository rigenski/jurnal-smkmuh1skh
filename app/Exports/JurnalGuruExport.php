<?php

namespace App\Exports;

use App\JurnalGuru;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class JurnalGuruExport implements FromView
{

    public function view(): View
    {
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');

        if ($search1 !== null && $search2 == null) {
            $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search1 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 == null && $search2 !== null) {
            $jurnal_guru = JurnalGuru::where('tanggal', 'LIKE', '%' . $search2 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 !== null && $search2 !== null) {
            $jurnal_guru = JurnalGuru::whereBetween('tanggal', [DATE($search1), DATE($search2)])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $jurnal_guru = JurnalGuru::all();
        }

        $siswa = Siswa::all();

        return view('admin/jurnal_guru/table', compact('jurnal_guru', 'siswa'));
    }
}