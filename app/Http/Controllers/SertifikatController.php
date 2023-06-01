<?php

namespace App\Http\Controllers;

use App\AktivitasSiswaSertifikat;
use App\Exports\SiswaSertifikatExport;
use App\GuruMataPelajaran;
use App\Sertifikat;
use App\SiswaSertifikat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Mpdf\Mpdf;

class SertifikatController extends Controller
{
    public function index()
    {
        $data_sertifikat = Sertifikat::all();

        return view('/admin/sertifikat/index', compact('data_sertifikat'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'perusahaan_penguji' => 'required',
            'ttd_penguji' => 'required',
            'nama_penguji' => 'required',
            'data_siswa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.sertifikat')->with('error', 'Data sertifikat gagal ditambahkan');
        }

        $sertifikat = Sertifikat::create([
            'nomor' => $request->nomor,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'perusahaan_penguji' => $request->perusahaan_penguji,
            'nama_penguji' => $request->nama_penguji,
        ]);

        if ($request->hasFile('ttd_penguji')) {
            $rand = Str::random(10);
            $name_file = pathinfo($request->ttd_penguji->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . $rand . "." . $request->ttd_penguji->getClientOriginalExtension();
            $request->file('ttd_penguji')->move('dokumen/sertifikat', $name_file);
            $sertifikat->ttd_penguji = $name_file;
            $sertifikat->save();
        }

        try {
            Excel::import(new \App\Imports\SiswaSertifikatImport($sertifikat), request()->file('data_siswa'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.sertifikat')->with('error', 'Data sertifikat gagal diimport');
        }

        return redirect()->route('admin.sertifikat')->with('success', 'Data sertifikat berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'perusahaan_penguji' => 'required',
            'nama_penguji' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.sertifikat')->with('error', 'Data sertifikat gagal diperbarui');
        }

        $sertifikat = Sertifikat::find($id);

        $sertifikat->update([
            'nomor' => $request->nomor,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'perusahaan_penguji' => $request->perusahaan_penguji,
            'nama_penguji' => $request->nama_penguji,
        ]);

        if ($request->hasFile('ttd_penguji')) {
            $rand = Str::random(10);
            $name_file = pathinfo($request->ttd_penguji->getClientOriginalName(), PATHINFO_FILENAME) . ' - ' . $rand . "." . $request->ttd_penguji->getClientOriginalExtension();
            $request->file('ttd_penguji')->move('dokumen/sertifikat', $name_file);
            $sertifikat->ttd_penguji = $name_file;
            $sertifikat->save();
        }

        return redirect()->route('admin.sertifikat')->with('success', 'Data sertifikat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sertifikat = Sertifikat::find($id);
        $data_siswa_sertifikat = SiswaSertifikat::where('sertifikat_id', $id)->get();

        foreach ($data_siswa_sertifikat as $item) {
            $aktifitas_siswa_sertifikat = AktivitasSiswaSertifikat::where('siswa_sertifikat_id', $item->id)->first();

            $aktifitas_siswa_sertifikat->delete();

            $item->delete();
        }

        $sertifikat->delete();

        return redirect()->route('admin.sertifikat')->with('success', 'Data sertifikat berhasil dihapus');
    }

    public function format_export()
    {
        return Excel::download(new SiswaSertifikatExport(), 'Import Sertifikat - SMK Muhammadiyah 1 Sukoharjo' . '.xlsx');
    }

    public function detail($id)
    {
        $sertifikat = Sertifikat::find($id);
        $data_siswa_sertifikat = SiswaSertifikat::where('sertifikat_id', $id)->get();

        return view('/admin/sertifikat/detail/index', compact('id', 'sertifikat', 'data_siswa_sertifikat'));
    }

    public function detailUpdate(Request $request, $id, $siswa_sertifikat_id)
    {
        $validator = Validator::make($request->all(), [
            'penugasan' => 'required',
            'predikat' => 'required',
            'kompetensi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.sertifikat.detail', ['id' => $id])->with('error', 'Data siswa sertifikat gagal diperbarui');
        }

        $sertifikat = SiswaSertifikat::find($siswa_sertifikat_id);

        $sertifikat->update([
            'keahlian' => $request->keahlian,
            'penugasan' => $request->penugasan,
            'predikat' => $request->predikat,
            'kompetensi' => $request->kompetensi,
        ]);

        return redirect()->route('admin.sertifikat.detail', ['id' => $id])->with('success', 'Data siswa sertifikat berhasil diperbarui');
    }

    public function print($id, $siswa_sertifikat_id)
    {
        date_default_timezone_set("Asia/Jakarta");

        $siswa_sertifikat = SiswaSertifikat::find($siswa_sertifikat_id);

        $html = "
                    <html>
                    <head>
                    </head>
                    <body style='font-family: Arial;font-size: 14px;'>
                        <div style='text-align: center;margin: 0 0 48px;'>
                            <img src='" . asset('/img/logo-smk.png') . "' style='width: 64px;'>
                        </div>
                        <h2 style='font-size: 24px;text-align: center; margin: 0 0 4px;'>SERTIFIKASI UJI KOMPETENSI</h2>
                        <p style='text-align: center; margin: 0 0 32px;'>Nomor: " . $siswa_sertifikat->sertifikat->nomor . "</p>
                        <p style='text-align: center; margin: 0 0 8px;'>Dengan ini menyatakan bahwa,</p>
                        <h2 style='font-size: 24px;text-align: center; margin: 0 0 4px;'>" . $siswa_sertifikat->nama . "</h2>
                        <h4 style='text-align: center; margin: 0 0 32px;'>NIS:" . $siswa_sertifikat->nis . "</h4>
                        <p style='text-align: center; margin: 0 0 8px;'>pada Program Keahlian</p>
                        <h2 style='font-size: 20px;text-align: center; margin: 0 0 32px;'>Rekayasa Perangkat Lunak</h2>
                        <p style='text-align: center; margin: 0 0 8px;'>pada Judul Penugasan</p>
                        <h4 style='font-size: 16px;text-align: center; margin: 0 0 32px;'>" . $siswa_sertifikat->penugasan . "</h4>
                        <p style='text-align: center; margin: 0 0 8px;'>dengan Predikat</p>
                        <h3 style='font-size: 16px;text-align: center; margin: 0 0 106px;'>" . $siswa_sertifikat->predikat . "</h3>
                        <p style='text-align: center; margin: 0 0 8px;'>" . $siswa_sertifikat->sertifikat->tempat . ", " . Carbon::parse($siswa_sertifikat->sertifikat->tanggal)->locale(App::getLocale())->isoFormat('DD MMMM YYYY') . "</p>
                    </body>
                ";

        $mpdf = new Mpdf();
        $mpdf->AddPage('P');
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(24, 220);
        $mpdf->WriteCell(6.4, 0.4, 'Atas nama SMK Muhammadiyah 1 Sukoharjo', 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(24, 244);
        $mpdf->WriteCell(6.4, 0.4, 'Drs. BAMBANG SAHANA, M.Pd', 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(24, 250);
        $mpdf->WriteCell(6.4, 0.4, 'Kepala Sekolah', 0, 'C');


        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 220);
        $mpdf->WriteCell(6.4, 0.4, $siswa_sertifikat->sertifikat->perusahaan_penguji, 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 244);
        $mpdf->WriteCell(6.4, 0.4, $siswa_sertifikat->sertifikat->nama_penguji, 0, 'C');
        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(140, 250);
        $mpdf->WriteCell(6.4, 0.4, 'Penguji Eksternal', 0, 'C');

        $mpdf->Image(asset('/img/bg-sertifikat-front.png'), 0, 0, 'auto', 298, 'png', '', true, false);
        $mpdf->Image(asset('/img/logo-kepsek.png'), 24, 226, 'auto', 24, 'png', '', true, false);
        $mpdf->Image(asset('/img/cap-sekolah.png'), 12, 226, 'auto', 32, 'png', '', true, false);
        $mpdf->Image(asset('/dokumen/sertifikat/' . $siswa_sertifikat->sertifikat->ttd_penguji), 140, 226, 'auto', 24, 'png', '', true, false);

        $data_kompetensi = explode('_', $siswa_sertifikat->kompetensi);

        $html_kompetensi = '';

        foreach ($data_kompetensi as $key => $item) {
            $html_kompetensi .=
                "<tr>
                    <td style='width: 24px;text-align: center;'>" . ($key + 1) . "</td>
                    <td>" . $item . "</td>
                </tr>";
        }

        $mpdf->SetFont('', '', 10);
        $mpdf->SetXY(24, 284);
        $mpdf->WriteCell(6.4, 0.4, '', 0, 'C');

        $html2 = "
                    <html>
                    <head>
                        <style>
                        table {
                            border-collapse: collapse;
                        }
                        th, td {
                            padding: 4px 8px;
                        }
                        </style>
                    </head>
                    <body style='font-family: Arial;font-size: 12px;'>
                        <h3 style='text-align: center; margin: 0 0 16px;font-weight: 400;'>DAFTAR KOMPETENSI</h3>
                        <table border='1' style='width: 100%;'>
                            <thead>
                                <tr>
                                    <th style='width: 24px;text-align: center;'>No</th>
                                    <th>Judul Kompetensi</th>
                                </tr>
                            </thead>
                            <tbody>
                               " . $html_kompetensi . "
                            </tbody>
                        </table>
                    </body>
                ";

        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html2);

        $mpdf->Image(asset('/img/bg-sertifikat-back.png'), 0, 0, 'auto', 298, 'png', '', true, false);

        $mpdf->Output('Sertifikat Kompetensi - SMK Muhammadiyah 1 Sukoharjo' . '.pdf', 'I');
        exit;
    }
}
