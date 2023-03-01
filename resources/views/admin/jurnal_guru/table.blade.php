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
            <th><b>CATATAN KHUSUS SISWA</b></th>
            <th><b>MENGAJAR DI JAM TERAKHIR</b></th>
            <th><b>MENDAMPINGI KELAS</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurnal_guru as $data)
        <?php $count = 1; ?>
        @if(count($data->siswa_pilihan))
        @foreach($data->siswa_pilihan as $siswa_pilihan)
        <tr>
            @if($count <= 1)
                <td>{{ $data->tanggal }}</td>
                <td>{{ date('H:i', strtotime($data->created_at)) }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->jam_ke }}</td>
                <td>{{ $data->mata_pelajaran }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>{{ $data->siswa_hadir }}</td>
                <td>{{ $data->siswa_tidak_hadir }}</td>
                <td>
                    @if($siswa->where('kelas', $data->kelas)->count() > 0)
                    {{ number_format( ( $siswa->where('kelas', $data->kelas)->count() - $data->siswa_pilihan->count() )
                    / $siswa->where('kelas', $data->kelas)->count() * 100 )}}
                    @else
                    100
                    @endif
                    %
                </td>
                <td>{{ $siswa_pilihan->nama_siswa }} ({{ $siswa_pilihan->status }})</td>
                <td>{{ $data->catatan_siswa }}</td>
                <td>{{ $data->mengajar_jam_terakhir }}</td>
                <td>{{ $data->mendampingi_kelas }}</td>
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
                <td>{{ $siswa_pilihan->nama_siswa }} ({{ $siswa_pilihan->status }})</td>
                <td></td>
                <td></td>
                <td></td>
            @endif
        </tr>
        <?php $count++; ?>
        @endforeach
        @else
        <tr>
            <td>{{ $data->tanggal }}</td>
            <td>{{ date('H:i', strtotime($data->created_at)) }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->kelas }}</td>
            <td>{{ $data->jam_ke }}</td>
            <td>{{ $data->mata_pelajaran }}</td>
            <td>{{ $data->deskripsi }}</td>
            <td>{{ $data->siswa_hadir }}</td>
            <td>{{ $data->siswa_tidak_hadir }}</td>
            <td>
                @if($siswa->where('kelas', $data->kelas)->count() > 0)
                {{ number_format( ( $siswa->where('kelas', $data->kelas)->count() - $data->siswa_pilihan->count() )
                / $siswa->where('kelas', $data->kelas)->count() * 100 )}}
                @else
                100
                @endif
                %
            </td>
            <td></td>
            <td>{{ $data->catatan_siswa }}</td>
            <td>{{ $data->mengajar_jam_terakhir }}</td>
            <td>{{ $data->mendampingi_kelas ?? '-' }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>