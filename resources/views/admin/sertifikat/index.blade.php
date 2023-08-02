@extends('layouts.admin')
@section('sertifikat', 'active')

@section('title', 'Sertifikat')

@section('content')
    <div class="card mb-4">
        <div class="card-header row">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modalCreate">
                            Tambah Sertifikat
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-end align-items-center flex-wrap">
                        <div>
                            @if (session('success'))
                                <div class="alert alert-success p-1 px-4 m-0">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger p-1 px-4 m-0">
                                    {{ session('error') }}
                                </div>
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
                            <th scope="col">No</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Perusahaan Penguji</th>
                            <th scope="col">Total Data</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data_sertifikat as $data)
                            <tr>
                                <td>
                                    <?= $count ?>
                                </td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->tempat }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->perusahaan_penguji }}</td>
                                <td>{{ $data->siswa_sertifikat->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.sertifikat.detail', ['id' => $data->id]) }}"
                                        class="btn btn-primary mb-2">Daftar
                                        Siswa</a>
                                    <a href="#modalEdit" data-toggle="modal"
                                        onclick="$('#modalEdit #formEdit').attr('action', 'sertifikat/{{ $data->id }}/update'); $('#modalEdit #formEdit #nomor').attr('value', '{{ $data->nomor }}'); $('#modalEdit #formEdit #tempat').attr('value', '{{ $data->tempat }}'); $('#modalEdit #formEdit #tanggal').attr('value', '{{ $data->tanggal }}'); $('#modalEdit #formEdit #perusahaan_penguji').attr('value', '{{ $data->perusahaan_penguji }}'); $('#modalEdit #formEdit #nama_penguji').attr('value', '{{ $data->nama_penguji }}');"
                                        class="btn btn-warning ml-2 mb-2">Edit</a>
                                    <a href="#modalDelete" data-toggle="modal"
                                        onclick="$('#modalDelete #formDelete').attr('action', 'sertifikat/{{ $data->id }}/destroy')"
                                        class="btn btn-danger ml-2 mb-2">Delete</a>
                                </td>
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
    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.sertifikat.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" required class="form-control @error('nomor') is-invalid @enderror"
                                id="nomor" name="nomor">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" required class="form-control @error('tempat') is-invalid @enderror"
                                id="tempat" name="tempat">
                            @error('tempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" required class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perusahaan_penguji">Perusahaan Penguji</label>
                            <input type="text" required
                                class="form-control @error('perusahaan_penguji') is-invalid @enderror"
                                id="perusahaan_penguji" name="perusahaan_penguji">
                            @error('perusahaan_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ttd_penguji">TTD Penguji</label>
                            <input type="file" required class="form-control @error('ttd_penguji') is-invalid @enderror"
                                id="ttd_penguji" name="ttd_penguji">
                            @error('ttd_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_penguji">Nama Penguji</label>
                            <input type="text" required class="form-control @error('nama_penguji') is-invalid @enderror"
                                id="nama_penguji" name="nama_penguji">
                            @error('nama_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="data_siswa">Data Siswa</label>
                            <input type="file" required class="form-control @error('data_siswa') is-invalid @enderror"
                                id="data_siswa" name="data_siswa">
                            @error('data_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-small text-danger mt-2">
                                * Mohon masukkan data dengan benar sebelum dikirim
                            </div>
                            <a href="{{ route('admin.sertifikat.format_export') }}" class="btn btn-warning mt-4">Unduh
                                Format
                                Import</a>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" required class="form-control @error('nomor') is-invalid @enderror"
                                id="nomor" name="nomor" value="">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" required class="form-control @error('tempat') is-invalid @enderror"
                                id="tempat" name="tempat" value="">
                            @error('tempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" required class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal" value="">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perusahaan_penguji">Perusahaan Penguji</label>
                            <input type="text" required
                                class="form-control @error('perusahaan_penguji') is-invalid @enderror"
                                id="perusahaan_penguji" name="perusahaan_penguji" value="">
                            @error('perusahaan_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ttd_penguji">TTD Penguji</label>
                            <input type="file" class="form-control @error('ttd_penguji') is-invalid @enderror"
                                id="ttd_penguji" name="ttd_penguji" value="">
                            @error('ttd_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_penguji">Nama Penguji</label>
                            <input type="text" required
                                class="form-control @error('nama_penguji') is-invalid @enderror" id="nama_penguji"
                                name="nama_penguji" value="">
                            @error('nama_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin menghapus data ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form id="formDelete" action="" method="get">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
