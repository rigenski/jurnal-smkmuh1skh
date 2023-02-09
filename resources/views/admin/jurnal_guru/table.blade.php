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
        </tr>
    </thead>
    <tbody>
        @foreach($jurnal_guru as $data)
        <?php $count = 1; ?>
        <?php $siswa_pilihan_data = ''; ?>
        @foreach($data->siswa_pilihan as $siswa_pilihan)
        <?php $siswa_pilihan_data .= $siswa_pilihan->nama_siswa . ', '  ?>
        @endforeach
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
                    {{ number_format( ( $siswa->where('kelas', $data->kelas)->count() - $data->siswa_pilihan->count() )
                    / ($siswa->where('kelas', $data->kelas)->count() ? $siswa->where('kelas', $data->kelas)->count() : 1) * 100 )}}
                    %
                </td>
                <td>{{ $siswa_pilihan_data }}</td>
                <td>{{ $data->catatan_siswa }}</td>
        </tr>
        @endforeach
    </tbody>
</table>