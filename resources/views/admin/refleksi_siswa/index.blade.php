@extends('layouts.admin')
@section('refleksi_siswa', 'active')

@section('title', 'Refleksi Siswa')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal"
                            data-target="#modal-filter">
                            Filter
                        </button>
                        <form action="{{ route('admin.refleksi_siswa') }}" method="get" class="d-flex">
                            <input type="hidden" name="tahun_pelajaran" value={{ $request->tahun_pelajaran }}>
                            <input type="hidden" name="semester" value={{ $request->semester }}>
                            <select class="form-control py-0 mr-2 mb-2" autocomplete="off" name="kelas"
                                style="width: 160px;height: 32px;">
                                @foreach ($data_kelas as $kelas)
                                    @if ($request->kelas == $kelas)
                                        <option value="{{ $kelas }}" selected>{{ $kelas }}</option>
                                    @else
                                        <option value="{{ $kelas }}">{{ $kelas }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mr-2 mb-2">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-end align-items-center flex-wrap">
                        <div class="d-flex">
                            <a href="{{ route('admin.refleksi_siswa') }}" class="btn btn-warning px-2 ml-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor"
                                    class="bi bi-arrow-repeat m-auto text-white" viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                    <path fill-rule="evenodd"
                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                </svg>
                            </a>
                            @if ($request->tahun_pelajaran != null && $request->semester != null && $request->kelas != null)
                                <a href="{{ route('admin.refleksi_siswa.export') }}"
                                    class="btn btn-success ml-2 mb-2">Export</a>
                            @else
                                <a href="/" class="btn btn-success ml-2 mb-2 disabled">Export</a>
                            @endif
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
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data_refleksi as $data)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->guru }}</td>
                                <td>{{ $data->mata_pelajaran }}</td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')

    <!-- Modal Filter -->
    <div class="modal fade" id="modal-filter" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.refleksi_siswa') }}" method="get">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Filter Data <span class="text-primary">Nilai</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun_pelajaran">Tahun Pelajaran</label>
                        <select class="form-control" autocomplete="off" id="tahun_pelajaran" name="tahun_pelajaran">
                            @foreach ($data_tahun_pelajaran as $tahun_pelajaran)
                                @if ($request->tahun_pelajaran == $tahun_pelajaran)
                                    <option value="{{ $tahun_pelajaran }}" selected>{{ $tahun_pelajaran }}</option>
                                @else
                                    <option value="{{ $tahun_pelajaran }}">{{ $tahun_pelajaran }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" autocomplete="off" name="semester">
                            @foreach ($data_semester as $semester)
                                @if ($request->semester == $semester)
                                    <option value="{{ $semester }}" selected>{{ $semester }}</option>
                                @else
                                    <option value="{{ $semester }}">{{ $semester }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
