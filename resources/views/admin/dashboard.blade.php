@extends('layouts/app')

@section('title', 'Dashboard')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-md-6 ">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">{{ count($total_journal)}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h5 class="small text-white" >Total Data</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">0</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h5 class="small text-white">Total Guru</h5>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Cart per Minggu
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center flex-column bd-highlight ">
                    <h5>Last Data</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Jam Ke</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Siswa Hadir</th>
                        <th scope="col">Siswa Tidak Hadir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_journal as $journal)
                    <tr>
                        <td>{{ $journal->tanggal }}</td>
                        <td>{{ date('H:i', strtotime($journal->created_at)) }}</td>
                        <td>{{ $journal->nama }}</td>
                        <td>{{ $journal->kelas }}</td>
                        <td>{{ $journal->kompetensi_keahlian }}</td>
                        <td>{{ $journal->jam_ke }}</td>
                        <td>{{ $journal->mata_pelajaran }}</td>
                        <td>{{ $journal->siswa_hadir }}</td>
                        <td>{{ $journal->siswa_tidak_hadir }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection