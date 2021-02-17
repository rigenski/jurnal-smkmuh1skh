<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Exports\JournalsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $data_week = DB::table('journals')
            ->select([
                DB::raw('count(*) as jumlah'),
                DB::raw('DATE(tanggal) as tanggal')
            ])
            ->groupBy('tanggal')
            ->whereBetween('tanggal', [DATE('Y-m-d', strtotime('-7 days')), DATE('Y-m-d')])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        session(['data_week' => $data_week]);

        $total_journal = DB::table('journals')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();;

        $data_journal = DB::table('journals')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->toArray();;

        // dd(session()->get('data_week'));

        return view('admin/dashboard', ['total_journal' => $total_journal, 'data_journal' => $data_journal]);
    }


    public function data(Request $request)
    {
        if ($request->has('search1') && $request->search2 == null) {
            $data = DB::table('journals')
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
            $data = DB::table('journals')
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
            $data = DB::table('journals')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                ->whereBetween('tanggal', [DATE($request->search1), DATE($request->search2)])
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();

            // RANGE HARI KE HARI //
            // $data = DB::table('journals')
            //     ->whereBetween('tanggal', [DATE($request->search1), DATE($request->search2)])
            //     ->orderBy('tanggal', 'desc')
            //     ->get()
            //     ->toArray();
        } else {
            $data = DB::table('journals')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tanggal) as tanggal')
                ])
                ->groupBy('tanggal')
                // ->where('tanggal', '>=', date('Y-m-d', strtotime('-3 days')))
                ->orderBy('tanggal', 'desc')
                ->limit(25)
                ->get()
                ->toArray();

            // $data = DB::table('journals')
            //     ->where('tanggal', '>=', date($request->search1, strtotime($request->search2)))
            //     ->get();
        }

        session(['search1' => $request->search1, 'search2' => $request->search2]);

        // dd([session()->get('search1'), session()->get('search2')]);

        return view('admin/data', ['data' => $data, 'input1' => $request->search1, 'input2' => $request->search2]);
    }

    public function export()
    {
        return Excel::download(new JournalsExport(), 'journals.xlsx');
    }
}
