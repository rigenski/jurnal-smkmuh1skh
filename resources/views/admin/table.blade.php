<table>
    <thead>
        <tr>
            <th><b>TANGGAL</b></th>
            <th><b>JAM</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>JAM KE</b></th>
            <th><b>MATA PELAJARAN</b></th>
            <th><b>DESKRIPSI</b></th>
            <th><b>SISWA HADIR</b></th>
            <th><b>SISWA TIDAK HADIR</b></th>
            <th><b>PERSENTASE</b></th>
            <th><b>DAFTAR SISWA TIDAK HADIR</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $journal)
        <?php $count = 1; ?>
        @foreach($journal->choice as $choice)
        <tr>
            @if($count <= 1) <td>{{ $journal->tanggal }}</td>
                <td>{{ date('H:i', strtotime($journal->created_at)) }}</td>
                <td>{{ $journal->nama }}</td>
                <td>{{ $journal->kelas }}</td>
                <td>{{ $journal->jam_ke }}</td>
                <td>{{ $journal->mata_pelajaran }}</td>
                <td>{{ $journal->deskripsi }}</td>
                <td>{{ $journal->siswa_hadir }}</td>
                <td>{{ $journal->siswa_tidak_hadir }}</td>
                <td>
                    {{ number_format( ( $students->where('kelas', $journal->kelas)->count() - $journal->choice->count() ) / $students->where('kelas', $journal->kelas)->count() * 100 )}}
                    %
                </td>
                <td>{{ $choice->nama_siswa }}</td>
                @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $choice->nama_siswa }}</td>
                @endif
        </tr>
        <?php $count++; ?>
        @endforeach
        @endforeach
    </tbody>
</table>