<?php

namespace App\Exports;

use App\Journal;
use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class JournalsExport implements FromView
{

    public function view(): View
    {
        $search1 = session()->get('search1');
        $search2 = session()->get('search2');

        if ($search1 !== null && $search2 == null) {
            $data = Journal::where('tanggal', 'LIKE', '%' . $search1 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 == null && $search2 !== null) {
            $data = Journal::where('tanggal', 'LIKE', '%' . $search2 . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($search1 !== null && $search2 !== null) {
            $data = Journal::whereBetween('tanggal', [DATE($search1), DATE($search2)])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $data = Journal::all();
        }

        $students = Student::all();

        return view('admin/table', compact('data', 'students'));
    }
}
