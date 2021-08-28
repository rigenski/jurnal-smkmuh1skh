<table>
    <thead>
        <tr>
            <th><b>TANGGAL</b></th>
            <th><b>JAM</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>KOMPETENSI KEAHLIAN</b></th>
            <th><b>JAM KE</b></th>
            <th><b>MATA PELAJARAN</b></th>
            <th><b>SISWA HADIR</b></th>
            <th><b>SISWA TIDAK HADIR</b></th>
            <th><b>DESKRIPSI</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $journal)
        <tr>
            <td>{{ $journal->tanggal }}</td>
            <td>{{ date('H:i:s', strtotime($journal->created_at)) }}</td>
            <td>{{ $journal->nama }}</td>
            <td>{{ $journal->kelas }}</td>
            <td>{{ $journal->kompetensi_keahlian }}</td>
            <td>{{ $journal->jam_ke }}</td>
            <td>{{ $journal->mata_pelajaran }}</td>
            <td>{{ $journal->siswa_hadir }}</td>
            <td>{{ $journal->siswa_tidak_hadir }}</td>
            <td>{{ $journal->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>