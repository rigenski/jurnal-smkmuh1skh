@extends('layouts.admin')
@section('guru', 'active')

@section('title', 'Guru')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modalCreate">
                            Tambah Guru
                        </button>
                        <button type="button" class="btn btn-warning mr-2 mb-2" data-toggle="modal"
                            data-target="#modalImport">
                            Import Excel
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-end align-items-center flex-wrap">
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($guru as $data)
                            <tr>
                                <td><?= $count ?></td>
                                <td>{{ $data->user->username }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <a href="#modalEdit" data-toggle="modal"
                                        onclick="$('#modalEdit #formEdit').attr('action', 'guru/{{ $data->id }}/update'); $('#modalEdit #formEdit #username').attr('value', '{{ $data->user->username }}'); $('#modalEdit #formEdit #nama').attr('value', '{{ $data->nama }}');"
                                        class="btn btn-warning">Edit</a>
                                    <a href="#modalDelete" data-toggle="modal"
                                        onclick="$('#modalDelete #formDelete').attr('action', 'guru/{{ $data->id }}/destroy')"
                                        class="btn btn-danger ml-2">Delete</a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.guru.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" required class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" required class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="modalImport" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Excel Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.guru.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="data_guru" name="data_guru"
                                accept=".xlsx, .xls">
                            <label class="custom-file-label" for="data_guru">Pilih File</label>
                        </div>
                        <div class="text-small text-danger mt-2">
                            * Mohon masukkan data dengan benar sebelum dikirim
                        </div>
                        <a href="{{ route('admin.guru.format_export') }}" class="btn btn-warning mt-4">Unduh
                            Format
                            Import</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" required class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" value="">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" required class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
