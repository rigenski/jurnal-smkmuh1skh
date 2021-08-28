<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Journal;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $weeks = Journal::select([
            DB::raw('count(*) as jumlah'),
            DB::raw('DATE(tanggal) as tanggal')
        ])
            ->groupBy('tanggal')
            ->whereBetween('tanggal', [DATE('Y-m-d', strtotime('-7 days')), DATE('Y-m-d')])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        $journals = Journal::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::all();

        return view('admin/index', compact('journals', 'teachers'));
    }
}
