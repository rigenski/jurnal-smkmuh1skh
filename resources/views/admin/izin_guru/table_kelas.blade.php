<table>
    <thead>
        <tr>
            <th scope="col"><b>JAM</b></th>
            @foreach($data_kelas as $kelas)
            <th><b>{{ $kelas->kelas }}</b></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data_jam as $jam)

        <tr>
            <th scopre="row"><b>{{ $jam }}</b></th>

            @foreach($data_kelas as $kelas)

            <?php $status = 3; ?>

            {{-- data jurnal --}}

            @foreach($data_jurnal as $jurnal)

            @if($jurnal->kelas == $kelas->kelas)

            <?php $jam_ke = explode('-', $jurnal->jam_ke);?>

            @if(count($jam_ke) == 2)

            <?php $jam_arr = []; ?>

            @for($i = $jam_ke[0]; $i <= $jam_ke[1]; $i++) <?php array_push($jam_arr, $i); ?>

                @endfor

                <?php $jam_ke = $jam_arr; ?>

                @endif

                @foreach($jam_ke as $jam_ke_item)

                @if($jam_ke_item == $jam)

                <?php $status = 1; ?>

                @endif

                @endforeach

                @endif

                @endforeach

                {{-- data izin --}}

                @foreach($data_izin as $izin)

                @if($izin->kelas == $kelas->kelas)

                <?php $jam_ke = explode('-', $izin->jam_ke);?>

                @if(count($jam_ke) == 2)

                <?php $jam_arr = []; ?>

                @for($i = $jam_ke[0]; $i <= $jam_ke[1]; $i++) <?php array_push($jam_arr, $i); ?>

                    @endfor

                    <?php $jam_ke = $jam_arr; ?>

                    @endif

                    @foreach($jam_ke as $jam_ke_item)

                    @if($jam_ke_item == $jam)

                    <?php $status = 2; ?>

                    @endif

                    @endforeach

                    @endif

                    @endforeach

                    {{-- pengaturan jam --}}

                    @if(count($data_pengaturan_izin_guru))

                    <?php $date = DateTime::createFromFormat('Y-m-d',  $tanggal ? $tanggal : date('Y-m-d')); ?>
                    <?php $hari = $date->format('D') ?>

                    @if($hari == 'Mon')
                    <?php $hari = 'Senin' ?>
                    @elseif($hari == 'Tue')
                    <?php $hari = 'Selasa' ?>
                    @elseif($hari == 'Wed')
                    <?php $hari = 'Rabu' ?>
                    @elseif($hari == 'Thu')
                    <?php $hari = 'Kamis' ?>
                    @elseif($hari == 'Fri')
                    <?php $hari = 'Jumat' ?>
                    @endif

                    <?php $pengaturan_jam = count($data_pengaturan_izin_guru) ? explode('-', $data_pengaturan_izin_guru->where('hari', $hari)->where('kelas', $kelas->kelas)->first()->jam_ke) : [1, 13]; ?>

                    <?php $pengaturan_jam_arr = []; ?>

                    @for($i = intval( $pengaturan_jam[0]) - 1; $i <= intval( $pengaturan_jam[1]); $i++) <?php
                        array_push($pengaturan_jam_arr, $i) ?>
                        @endfor

                        @if( !array_search( $jam, $pengaturan_jam_arr))

                        <?php $status = 4 ?>

                        @endif

                        @endif

                        {{-- kondisi --}}

                        @if($status == 1)
                        <td style="background: #47c363;border: 1px solid #fff"></td>
                        @elseif($status == 2)
                        <td style="background: #ffa426;border: 1px solid #fff"></td>
                        @elseif($status == 3)
                        <td style="background: #fc544b;border: 1px solid #fff"></td>
                        @elseif($status == 4)
                        <td style="background: none;border: 1px solid #fff"></td>
                        @endif

                        @endforeach
        </tr>

        @endforeach
    </tbody>
</table>