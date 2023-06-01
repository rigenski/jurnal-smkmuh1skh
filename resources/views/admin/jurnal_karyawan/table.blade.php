<table>
    <thead>
        <tr>
            <th><b>TANGGAL</b></th>
            <th><b>JAM</b></th>
            <th><b>NAMA</b></th>
            <th><b>UNIT KERJA</b></th>
            <th><b>DESKRIPSI</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurnal_karyawan as $data)
        <tr>

            <td>{{ $data->tanggal }}</td>
            <td>{{ date('H:i', strtotime($data->created_at)) }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->unit_kerja }}</td>
            <td>{{ $data->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>