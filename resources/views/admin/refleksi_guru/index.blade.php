@extends('layouts.admin')
@section('refleksi_guru', 'active')

@section('title', 'Refleksi Guru')

@section('content')
<div class="card">
    <div class="card-header row">
        <div class="col-12 col-sm-6 p-0 my-1">
            <div class="d-flex align-items-start flex-column">
                <form action="{{ route('admin.refleksi_guru') }}" method="get" class="d-flex">
                    <input type="month" class="form-control" name="bulan" autocomplete="off"
                        value="{{ $bulan ? $bulan : date('Y-m') }}">
                    <div class="mx-2">
                        <button class="btn btn-primary ">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-sm-6 p-0 my-1">
            <div class="d-flex align-items-end flex-column">
                <div class="d-flex">
                    <a href="{{ route('admin.refleksi_guru') }}" class="btn btn-warning px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor"
                            class="bi bi-arrow-repeat m-auto text-white" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </a>
                    <div class="mx-2">
                        {{-- <a href="{{ route('admin.refleksi_guru.export') }}" class="btn btn-success">Export</a> --}}
                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-export">Export</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($data_refleksi as $data)
                    <tr>
                        <th scope="row">{{ $count }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->mata_pelajaran }}</td>
                        <td>{{ $data->kelas }}</td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')
    
<!-- Modal Print -->
<div class="modal fade" id="modal-export" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.refleksi_guru.export') }}" method="get" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Data Refleksi Guru</h5>
                </span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tanggal_raport">Tipe <span class="text-danger">*</span></label>
                    <select class="form-control" autocomplete="off" name="tipe" required>
                        <option>Pendidik</option>
                        <option>Wali Kelas</option>
                        <option>Sekolah</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        </form>
    </div>
</div>

@endsection