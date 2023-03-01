@extends('layouts.admin')
@section('izin_guru', 'active')

@section('title', 'Izin Guru')

@section('content')
<div class="card">
    <div class="card-header row">
        <div class="col-12 col-sm-6 p-0 my-1">
            <div class="d-flex align-items-start flex-column">
                <form action="{{ route('admin.izin_guru') }}" method="get" class="d-flex">
                    <input type="text" class="form-control datepicker" name="tanggal" autocomplete="off"
                        value="{{ $tanggal ? $tanggal : date('Y-m-d') }}">
                    <div class="mx-2">
                        <button class="btn btn-primary ">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-sm-6 p-0 my-1">
            <div class="d-flex align-items-end flex-column">
                <div class="d-flex ">
                    <a href="{{ route('admin.izin_guru') }}" class="btn btn-warning px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor"
                            class="bi bi-arrow-repeat m-auto text-white" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </a>
                    <button type="button" class="btn btn-info ml-2" data-toggle="modal" data-target="#modalSetting">
                        Pengaturan
                    </button>
                    <div class="mx-2">
                        <a href="{{ route('admin.izin_guru.export') }}" class="btn btn-success">Export</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">JAM</th>
                        @foreach($data_kelas as $kelas)
                        <th scope="col" class="text-nowrap">{{ $kelas->kelas }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_jam as $jam)

                    <tr>
                        <th scopre="row">{{ $jam }}</th>

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

                                @for($i = intval( $pengaturan_jam[0]) - 1; $i <= intval( $pengaturan_jam[1]); $i++)
                                    <?php array_push($pengaturan_jam_arr, $i) ?>
                                    @endfor

                                    @if( !array_search( $jam, $pengaturan_jam_arr))

                                    <?php $status = 4 ?>

                                    @endif

                                    @endif

                                    {{-- kondisi --}}

                                    @if($status == 1)
                                    <td class="bg-success"></td>
                                    @elseif($status == 2)
                                    <td class="bg-warning"></td>
                                    @elseif($status == 3)
                                    <td class="bg-danger"></td>
                                    @elseif($status == 4)
                                    <td class="bg-white"></td>
                                    @endif

                                    @endforeach
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')

<!-- Modal Create -->
<div class="modal fade" id="modalSetting" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pengaturan Jam Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/izin_guru/setting" method="post">
                    @csrf
                    <div id="accordion">
                        @foreach($data_hari as $key => $hari)
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                                data-target={{ "#panel-body-" . $key }} aria-expanded="false">
                                <h4>{{ $hari }}</h4>
                            </div>
                            <div class="accordion-body collapse" id={{ "panel-body-" . $key }} data-parent="#accordion"
                                style="">
                                @foreach($data_kelas as $kelas)
                                <div class="form-group row mb-1">
                                    <label class="col-sm-3 col-form-label">{{ $kelas->kelas }}</label>
                                    <div class="col-sm-9 row px-0">
                                        <?php $jam_ke = count($data_pengaturan_izin_guru) ? explode('-', $data_pengaturan_izin_guru->where('hari', $hari)->where('kelas', $kelas->kelas)->first()->jam_ke) : [] ; ?>
                                        <div class="col-6 px-0 pr-1">
                                            <select class="form-control-sm bg-white w-100"
                                                style="border: 1px solid #ced4da;" name={{ $hari . "-" . str_replace(' ',"_",$kelas->kelas) .
                                                "-" . "jam_ke" }}>
                                                @foreach($data_jam as $jam)
                                                @if(count($data_pengaturan_izin_guru))
                                                @if($jam == $jam_ke[0])
                                                <option selected>{{ $jam }}</option>
                                                @else
                                                <option>{{ $jam }}</option>
                                                @endif
                                                @else
                                                <option>{{ $jam }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 px-0 pl-1">
                                            <select class="form-control-sm bg-white w-100"
                                                style="border: 1px solid #ced4da;" name={{ $hari . "-" . str_replace(' ',"_",$kelas->kelas) .
                                                "-" . "sampai_jam_ke" }}>
                                                @foreach($data_jam as $jam)
                                                @if(count($data_pengaturan_izin_guru))
                                                @if($jam == $jam_ke[1])
                                                <option selected>{{ $jam }}</option>
                                                @else
                                                <option>{{ $jam }}</option>
                                                @endif
                                                @else 
                                                @if($jam == 12)
                                                <option selected>{{ $jam }}</option>
                                                @else
                                                <option>{{ $jam }}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection