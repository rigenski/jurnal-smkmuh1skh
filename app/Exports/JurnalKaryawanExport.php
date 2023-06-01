<?php

namespace App\Exports;

use App\JurnalKaryawan;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class JurnalKaryawanExport implements FromView
{

    public function view(): View
    {
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');

        if ($search1 !== null && $search2 == null) {
            $jurnal_karyawan = JurnalKaryawan::where('tanggal', 'LIKE', '%' . $search1 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 == null && $search2 !== null) {
            $jurnal_karyawan = JurnalKaryawan::where('tanggal', 'LIKE', '%' . $search2 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 !== null && $search2 !== null) {
            $jurnal_karyawan = JurnalKaryawan::whereBetween('tanggal', [DATE($search1), DATE($search2)])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $jurnal_karyawan = JurnalKaryawan::all();
        }

        return view('admin/jurnal_karyawan/table', compact('jurnal_karyawan',));
    }
}
