<?php

namespace App\Http\Controllers;

use App\Exports\JurnalGuruExport;
use App\JurnalGuru;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class JurnalGuruController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        if ($request->has('search1') && $request->search2 == null) {
            $jurnal_guru = DB::table('jurnal_guru')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                ->where('tanggal', 'LIKE', '%' . $request->search1 . '%')
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else if ($request->has('search2') && $request->search1 == null) {
            $jurnal_guru = DB::table('jurnal_guru')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                ->where('tanggal', 'LIKE', '%' . $request->search2 . '%')
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else if ($request->has('search1') && $request->has('search2')) {
            $jurnal_guru = DB::table('jurnal_guru')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                ->whereBetween('tanggal', [DATE($request->search1), DATE($request->search2)])
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else {
            $jurnal_guru = DB::table('jurnal_guru')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                ->orderBy('tanggal', 'desc')
                ->limit(30)
                ->get()
                ->toArray();
        }

        session(['search1' => $request->search1, 'search2' => $request->search2]);

        return view('admin/jurnal_guru/index', ['jurnal_guru' => $jurnal_guru, 'input1' => $request->search1, 'input2' => $request->search2]);
    }

    public function export()
    {
        $search1 = session()->get('search1');

        return Excel::download(new JurnalGuruExport(), 'Jurnal Guru SMK Muhammadiyah 1 Sukoharjo - ' . $search1 . '.xlsx');
    }
}
