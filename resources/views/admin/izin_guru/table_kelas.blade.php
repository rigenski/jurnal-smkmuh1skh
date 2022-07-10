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

            <?php $status = true; ?>

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

                <?php $status = false; ?>

                @endif

                @endforeach

                @endif

                @endforeach

                @if($status)
                <td style="background: #47c363;border: 1px solid #fff"></td>
                @else
                <td style="background: #fc544b;border: 1px solid #fff"></td>
                @endif

                @endforeach
        </tr>

        @endforeach
    </tbody>
</table>