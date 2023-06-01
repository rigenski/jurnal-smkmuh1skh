@extends('layouts.admin')
@section('sertifikat', 'active')

@section('title', 'Sertifikat')

@section('content')
    <div class="card mb-4">
        <div class="card-header row">
            <div class="row w-100 mx-0">
                <div class="col-12 col-md-6 px-0">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <h4>Daftar Siswa</h4>
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
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($data_siswa_sertifikat as $item)
                            <tr>
                                <td>
                                    <?= $count ?>
                                </td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>
                                    <a href="/admin/sertifikat/{{ $id }}/{{ $item->id }}/print"
                                        class="btn btn-primary mb-2">Cetak</a>
                                    <a href="#modalEdit" data-toggle="modal"
                                        onclick="$('#modalEdit #formEdit').attr('action', '{{ $id }}/{{ $item->id }}/update'); $('#modalEdit #formEdit #nis').attr('value', '{{ $item->nis }}'); $('#modalEdit #formEdit #nama').attr('value', '{{ $item->nama }}'); $('#modalEdit #formEdit #kelas').attr('value', '{{ $item->kelas }}'); $('#modalEdit #formEdit #penugasan').attr('value', '{{ $item->penugasan }}'); $('#modalEdit #formEdit #predikat').attr('value', '{{ $item->predikat }}'); $('#modalEdit #formEdit #kompetensi').attr('value', '{{ $item->kompetensi }}');"
                                        class="btn btn-warning ml-2 mb-2">Edit</a>
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
                            <label for="nis">NIS</label>
                            <input type="text" required class="form-control @error('nis') is-invalid @enderror"
                                id="nis" name="nis" value="">
                            @error('penugasan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                name="kelas" value="">
                            @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penugasan">Penugasan</label>
                            <input type="text" required class="form-control @error('penugasan') is-invalid @enderror"
                                id="penugasan" name="penugasan" value="">
                            @error('penugasan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="predikat">Predikat</label>
                            <input type="text" required class="form-control @error('predikat') is-invalid @enderror"
                                id="predikat" name="predikat" value="">
                            @error('predikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kompetensi">Kompetensi</label>
                            <input type="text" class="form-control @error('kompetensi') is-invalid @enderror"
                                id="kompetensi" name="kompetensi" value="">
                            @error('kompetensi')
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

@endsection
