<table>
    <thead>
        <tr>
            <th><b>TANGGAL</b></th>
            <th><b>JAM</b></th>
            <th><b>NAMA</b></th>
            <th><b>KELAS</b></th>
            <th><b>JAM KE</b></th>
            <th><b>RUANG</b></th>
            <th><b>JENIS IZIN</b></th>
            <th><b>PETUNJUK TUGAS</b></th>
            <th><b>PETUNJUK TUGAS FILE</b></th>
            <th><b>SURAT IZIN</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_izin as $data)
        <tr>
            <td>{{ $data->tanggal }}</td>
            <td>{{ date('H:i', strtotime($data->created_at)) }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->kelas }}</td>
            <td>{{ $data->jam_ke }}</td>
            <td>{{ $data->ruang }}</td>
            <td>{{ $data->jenis_izin }}</td>
            <td>{{ $data->petunjuk_tugas }}</td>
            <td>{{ $data->petunjuk_tugas_file ? asset('/dokumen/petunjuk_tugas_file/' . $data->petunjuk_tugas_file ) :
                null }}</td>
            <td>{{ $data->surat_izin ? asset('/dokumen/surat_izin/' . $data->surat_izin ) : null }}</td>
            @endforeach
    </tbody>
</table>