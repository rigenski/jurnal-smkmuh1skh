<?php

namespace App\Exports;

use App\Journal;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class JournalsExport implements FromView
{

    public function view(): View
    {
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');

        if ($search1 !== null && $search2 == null) {
            $data = DB::table('journals')
                ->where('tanggal', 'LIKE', '%' . $search1 . '%')
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else if ($search1 == null && $search2 !== null) {
            $data = DB::table('journals')
                ->where('tanggal', 'LIKE', '%' . $search2 . '%')
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else if ($search1 !== null && $search2 !== null) {
            $data = DB::table('journals')
                ->whereBetween('tanggal', [DATE($search1), DATE($search2)])
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
        } else {
            $data = Journal::all();
        }



        return view('admin/table', compact('data'));
    }
}
