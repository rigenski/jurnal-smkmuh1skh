@extends('layouts.admin')
@section('dashboard', 'active')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Guru</h4>
                </div>
                <div class="card-body">
                    {{ $teachers->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jurnal</h4>
                </div>
                <div class="card-body">
                    {{ $journals->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Jurnal Terakhir</h4>
                <div class="card-header-action">
                    <a href="{{ route('jurnal') }}" class="btn btn-primary">Lainya</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @foreach($journals as $journal)
                            <?php if($count == 10) break; ?>
                            <tr>
                                <td>{{ $journal->tanggal }} {{ date('H:i', strtotime($journal->created_at)) }}</td>
                                <td>{{ $journal->nama }}</td>
                                <td>{{ $journal->kelas }} {{ $journal->kompetensi_keahlian }}</td>
                                <td>{{ $journal->mata_pelajaran }}</td>
                            </tr>
                            <?php $count++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection