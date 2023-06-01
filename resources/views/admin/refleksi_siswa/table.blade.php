<table>
    <thead>
        <tr>
            <th><b>TAHUN PELAJARAN</b></th>
            <th><b>SEMESTER</b></th>
            <th><b>NIS</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>GURU</b></th>
            <th><b>MATA PELAJARAN</b></th>
            <th><b>P1</b></th>
            <th><b>P2</b></th>
            <th><b>P3</b></th>
            <th><b>P4</b></th>
            <th><b>P5</b></th>
            <th><b>P6</b></th>
            <th><b>P7</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_refleksi as $data)
            <?php $count = 1; ?>
            <tr>
                <td>{{ $data->tahun_pelajaran }}</td>
                <td>{{ $data->semester }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->guru }}</td>
                <td>{{ $data->mata_pelajaran }}</td>
                <td>{{ $data->pertanyaan1 }}</td>
                <td>{{ $data->pertanyaan2 }}</td>
                <td>{{ $data->pertanyaan3 }}</td>
                <td>{{ $data->pertanyaan4 }}</td>
                <td>{{ $data->pertanyaan5 }}</td>
                <td>{{ $data->pertanyaan6 }}</td>
                <td>{{ $data->pertanyaan7 }}</td>
            </tr>
            <?php $count++; ?>
        @endforeach
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td colspan="16">INFORMASI</td>
        </tr>
        <tr>
            <td colspan="16">P1: Guru memulai dan mengakhiri pembelajaran tepat waktu ?</td>
        </tr>
        <tr>
            <td colspan="16">P2: Guru melaksanakan strategi pembelajaran dengan suasana interaktif, inspiratif,
                menyenangkan, menantang, memotivasi peserta didik untuk berpartisipasi aktif dan memberikan ruang yang
                cukup bagi prakarsa, kreativitas, kemandirian sesuai dengan bakat, minat, perkembangan fisik dan
                psikologis peserta didik ?</td>
        </tr>
        <tr>
            <td colspan="16">P3: Guru melaksanakan pembelajaran dengan memberikan keteladanan, pendampingan dan
                fasilitasi ?</td>
        </tr>
        <tr>
            <td colspan="16">P4: Tingkat kepuasan proses pembelajaran untuk mata pelajaran ini ?</td>
        </tr>
        <tr>
            <td colspan="16">P5: Tingkat kepuasan proses pembelajaran teori secara keseluruhan ?</td>
        </tr>
        <tr>
            <td colspan="16">P6: Tingkat kepuasan proses pembelajaran praktek secara keseluruhan ?</td>
        </tr>
        <tr>
            <td colspan="16">P7: Harapan dan masukkan peserta didik untuk kemajuan sekolah ?</td>
        </tr>
    </tbody>
</table>
