<table>
    <thead>
        <tr>
            <th><b>NIS</b></th>
            <th><b>Nama</b></th>
            @foreach ($data_jurnal_guru_group as $tanggal => $data_jurnal_guru)
                <th><b>{{ $tanggal }}</b></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data_siswa as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                @foreach ($data_jurnal_guru_group as $tanggal => $data_jurnal_guru)
                    <?php $status = 4; ?>

                    @foreach ($data_jurnal_guru as $jurnal_guru)
                        @foreach ($jurnal_guru->siswa_pilihan as $siswa_pilihan)
                            @if ($siswa_pilihan->nama_siswa == $siswa->nama && $status == 4)
                                @if ($siswa_pilihan->status == 'Izin' || $siswa_pilihan->status == 'Sakit')
                                    <?php $status = 2; ?>
                                @elseif($siswa_pilihan->status == 'Bolos' || $siswa_pilihan->status == 'Alfa')
                                    <?php $status = 3; ?>
                                @endif
                            @endif
                        @endforeach
                    @endforeach

                    @if (count($data_jurnal_guru) && $status == 4)
                        <?php $status = 1; ?>
                    @endif

                    @if ($status == 1)
                        <td style="background-color: #47c363;border: 1px solid #fff"></td>
                    @elseif($status == 2)
                        <td style="background-color: #ffa426;border: 1px solid #fff"></td>
                    @elseif($status == 3)
                        <td style="background-color: #fc544b;border: 1px solid #fff"></td>
                    @elseif($status == 4)
                        <td></td>
                    @endif


                    <?php $status = 4; ?>
                @endforeach
            </tr>
        @endforeach
        <tr></tr>
        <tr></tr>
        <tr>
            <td><b>Keterangan</b></td>
        </tr>
        <tr>
            <td style="background-color: #47c363;border: 1px solid #fff"></td>
            <td>Hadir</td>
        </tr>
        <tr>
            <td style="background-color: #ffa426;border: 1px solid #fff"></td>
            <td>Sakit / Izin</td>
        </tr>
        <tr>
            <td style="background-color: #fc544b;border: 1px solid #fff"></td>
            <td>Bolos / Alfa</td>
        </tr>
    </tbody>
</table>
