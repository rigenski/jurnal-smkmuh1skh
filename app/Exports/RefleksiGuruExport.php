<?php

namespace App\Exports;

use App\RefleksiGuru;
use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class RefleksiGuruExport implements FromView, ShouldAutoSize
{
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        date_default_timezone_set("Asia/Jakarta");

        $bulan = session()->get('refleksi_guru-bulan');

        if ($bulan) {
            $data_refleksi = RefleksiGuru::where('bulan', $bulan)->get();
        } else {
            $data_refleksi = RefleksiGuru::where('bulan', date('Y-m'))->get();
        }

        return view('admin/refleksi_guru/table', ['data_refleksi' => $data_refleksi, 'request' => $this->request]);
    }
}
