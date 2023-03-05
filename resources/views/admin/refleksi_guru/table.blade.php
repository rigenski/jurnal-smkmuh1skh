@if($request->tipe === 'Pendidik')
<table>
    <thead>
        <tr>
            <th><b>BULAN</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
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
        @foreach($data_refleksi as $data)
        <?php $count = 1; ?>
            <tr>
                <td>{{ $data->bulan }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
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
            <td colspan="16">P1: Apa yang berjalan baik bulan ini</td>
        </tr>
        <tr>
            <td colspan="16">P2: Apa yang tidak berjalan baik bulan ini</td>
        </tr>
        <tr>
            <td colspan="16">P3: Keterampilan apa yang dikuasai oleh siswa dibulan ini</td>
        </tr>
        <tr>
            <td colspan="16">P4: Keterampilan apa yang masih perlu ditingkatkan oleh siswa</td>
        </tr>
        <tr>
            <td colspan="16">P5: Jika memiliki kesempatan mengajar materi pelajaran yang sama pada kelompok siswa yang sama, hal apa yang akan dilakukan secara berbeda</td>
        </tr>
        <tr>
            <td colspan="16">P5: Jika memiliki kesempatan mengajar materi pelajaran yang sama pada kelompok siswa yang sama, hal apa yang akan dilakukan secara berbeda</td>
        </tr>
        <tr>
            <td colspan="16">P6: Sebutkan nama siswa yang terlibat aktif dalam pembelajaran bulan ini</td>
        </tr>
        <tr>
            <td colspan="16">P7: Sebutkan nama siswa yang tampak membutuhkan lebih banyak dukungan dan perhatian dibulan berikutnya</td>
        </tr>
    </tbody>
</table>
@elseif($request->tipe === 'Wali Kelas')
<table>
    <thead>
        <tr>
            <th><b>BULAN</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>MATA PELAJARAN</b></th>
            <th><b>P1</b></th>
            <th><b>P2</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_refleksi as $data)
        <?php $count = 1; ?>
            <tr>
                <td>{{ $data->bulan }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->mata_pelajaran }}</td>
                <td>{{ $data->pertanyaan7 }}</td>
                <td>{{ $data->pertanyaan8 }}</td>
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
            <td colspan="16">P1: Sebutkan nama siswa yang tampak membutuhkan lebih banyak dukungan dan perhatian dibulan berikutnya</td>
        </tr>
        <tr>
            <td colspan="16">P2: Hal apa yang perlu diperbaiki kedepan agar sekolah ini tetap Unggul</td>
        </tr>
    </tbody>
</table>
@elseif($request->tipe === 'Sekolah')
<table>
    <thead>
        <tr>
            <th><b>BULAN</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>MATA PELAJARAN</b></th>
            <th><b>P1</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_refleksi as $data)
        <?php $count = 1; ?>
            <tr>
                <td>{{ $data->bulan }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->mata_pelajaran }}</td>
                <td>{{ $data->pertanyaan8 }}</td>
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
            <td colspan="16">P8: Hal apa yang perlu diperbaiki kedepan agar sekolah ini tetap Unggul</td>
        </tr>
    </tbody>
</table>
@endif