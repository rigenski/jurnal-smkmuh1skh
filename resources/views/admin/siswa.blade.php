@extends('layouts.admin')
@section('siswa', 'active')

@section('title', 'Siswa')

@section('content')
<div class="card mb-4">
  <div class="card-header row">
    <div class="col-12 col-sm-6 p-0 my-1">
      <div class="d-flex align-items-start">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
          Tambah Siswa
        </button>
        <button type="button" class="btn btn-warning ml-2" data-toggle="modal" data-target="#modalImport">
          Import Excel
        </button>
      </div>
    </div>
    <div class="col-12 col-sm-6 p-0 my-1">
      <div class="d-flex align-items-end flex-column">
        <div>
          @if(session('success'))
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
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1; ?>
          @foreach($students as $student)
          <tr>
            <td><?= $count ?></td>
            <td>{{ $student->nis}}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->kelas }}</td>
            <td>
              <a href="#modalEdit" data-toggle="modal"
                onclick="$('#modalEdit #formEdit').attr('action', 'siswa/{{$student->id}}/update'); $('#modalEdit #formEdit #nis').attr('value', '{{$student->nis}}'); $('#modalEdit #formEdit #nama').attr('value', '{{$student->nama}}'); $('#modalEdit #formEdit #kelas').attr('value', '{{$student->kelas}}');"
                class="btn btn-warning">Edit</a>
              <a href="#modalDelete" data-toggle="modal"
                onclick="$('#modalDelete #formDelete').attr('action', 'siswa/{{$student->id}}/destroy')"
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
        <form action="/admin/siswa/store" method="post">
          @csrf
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" required class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis">
            @error('nis')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" required class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" required class="form-control @error('kelas') is-invalid @enderror" id="kelas"
              name="kelas">
            @error('kelas')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" required class="form-control @error('jurusan') is-invalid @enderror" id="jurusan"
              name="jurusan">
            @error('jurusan')
            <div class="invalid-feedback">
              {{ $message}}
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
        <h5 class="modal-title" id="staticBackdropLabel">Import Excel Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/siswa/import" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama">File</label>
            <input type="file" class="form-control" required id="excel" name="students_data" accept=".xlsx, .xls">
            <div class="text-small text-danger mt-2">
              * Mohon masukkan data dengan benar sebelum dikirim
            </div>
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
            <label for="nis">NIS</label>
            <input type="text" required class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
              value="">
            @error('nis')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" required class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
              value="">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" required class="form-control @error('kelas') is-invalid @enderror" id="kelas"
              name="kelas" value="">
            @error('kelas')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" required class="form-control @error('jurusan') is-invalid @enderror" id="jurusan"
              name="jurusan" value="">
            @error('jurusan')
            <div class="invalid-feedback">
              {{ $message}}
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