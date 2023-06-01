@extends('layouts.admin')
@section('guru_mata_pelajaran', 'active')

@section('title', 'Guru Mata Pelajaran')

@section('content')
    <div class="card mb-4">
        <div class="card-header row">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <button type="button" class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modalCreate">
                            Tambah Guru Mata Pelajaran
                        </button>
                        <button type="button" class="btn btn-warning mr-2 mb-2" data-toggle="modal"
                            data-target="#modalImport">
                            Import Excel
                        </button>
                        <button type="button" class="btn btn-danger mr-2 mb-2" data-toggle="modal"
                            data-target="#modalReset">
                            Reset Siswa
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
                            <th scope="col">Kelas</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data_guru_mata_pelajaran as $guru_mata_pelajaran)
                            <tr>
                                <td>
                                    <?= $count ?>
                                </td>
                                <td>{{ $guru_mata_pelajaran->kelas }}</td>
                                <td>{{ $guru_mata_pelajaran->mata_pelajaran->nama }}</td>
                                <td>{{ $guru_mata_pelajaran->guru->nama }}</td>
                                <td>
                                    <a href="#modalEdit" data-toggle="modal"
                                        onclick="
                                        $('#modalEdit #formEdit').attr('action', 'guru-mata-pelajaran/{{ $guru_mata_pelajaran->id }}/update'); 
                                        $('#modalEdit #formEdit #kelas').attr('value', '{{ $guru_mata_pelajaran->kelas }}'); 
                                        $('#modalEdit #formEdit #mata_pelajaran').attr('value', '{{ $guru_mata_pelajaran->mata_pelajaran->id }}'); 
                                        $('#modalEdit #formEdit #mata_pelajaran').text('{{ $guru_mata_pelajaran->mata_pelajaran->nama }}'); 
                                        $('#modalEdit #formEdit #guru').attr('value', '{{ $guru_mata_pelajaran->guru->id }}');  
                                        $('#modalEdit #formEdit #guru').text('{{ $guru_mata_pelajaran->guru->nama }}'); "
                                        class="btn btn-warning">Edit</a>
                                    <a href="#modalDelete" data-toggle="modal"
                                        onclick="$('#modalDelete #formDelete').attr('action', 'guru-mata-pelajaran/{{ $guru_mata_pelajaran->id }}/destroy')"
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Guru Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.guru_mata_pelajaran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kelas">Kelas </label>
                            <input type="text" required class="form-control @error('kelas') is-invalid @enderror"
                                id="kelas" name="kelas">
                            <small class="form-text text-danger mt-2">Contoh Penulisan :
                                <b>X / RPL 1</b></small>
                            @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mata_pelajaran">Mata Pelajaran </label>
                            <select class="form-control @error('mata_pelajaran') is-invalid @enderror" autocomplete="off"
                                name="mata_pelajaran" required>
                                @foreach ($data_mata_pelajaran as $mata_pelajaran)
                                    <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->nama }}</option>
                                @endforeach
                            </select>
                            @error('mata_pelajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru">Guru </label>
                            <select class="form-control @error('guru') is-invalid @enderror" autocomplete="off"
                                name="guru" required>
                                @foreach ($data_guru as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                            @error('guru')
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

    <!-- Modal Import -->
    <div class="modal fade" id="modalImport" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Excel Data Guru Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.guru_mata_pelajaran.import') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="data_guru_mata_pelajaran"
                                name="data_guru_mata_pelajaran" accept=".xlsx, .xls">
                            <label class="custom-file-label" for="data_guru_mata_pelajaran">Pilih File</label>
                        </div>
                        <div class="text-small text-danger mt-2">
                            * Mohon masukkan data dengan benar sebelum dikirim
                        </div>
                        <a href="{{ route('admin.guru_mata_pelajaran.format_export') }}"
                            class="btn btn-warning mt-4">Unduh
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
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Guru Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kelas">Kelas </label>
                            <input type="text" required class="form-control @error('kelas') is-invalid @enderror"
                                id="kelas" name="kelas">
                            <small class="form-text text-danger mt-2">Contoh Penulisan :
                                <b>X / RPL 1</b></small>
                            @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mata_pelajaran">Mata Pelajaran </label>
                            <select class="form-control @error('mata_pelajaran') is-invalid @enderror" autocomplete="off"
                                name="mata_pelajaran" required>
                                <option value="" id="mata_pelajaran"></option>
                                @foreach ($data_mata_pelajaran as $mata_pelajaran)
                                    <option value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->nama }}</option>
                                @endforeach
                            </select>
                            @error('mata_pelajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guru">Guru </label>
                            <select class="form-control @error('guru') is-invalid @enderror" autocomplete="off"
                                name="guru" required>
                                <option value="" id="guru"></option>
                                @foreach ($data_guru as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                            @error('guru')
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin menghapus Guru mata pelajaran ?</h5>
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

    <!-- Modal Reset -->
    <div class="modal fade" id="modalReset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin mereset data guru mata pelajaran ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form id="formReset" action="{{ route('admin.guru_mata_pelajaran.reset') }}" method="get">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
