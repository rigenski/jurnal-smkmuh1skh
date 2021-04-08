@extends('/layouts/app')

@section('title', 'Data Guru')

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data Guru</li>
</ol>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                    Tambah Guru
                </button>
                @if(session('mess'))
    <div class="alert alert-success m-0 alert-dismissable center" style="width:40em;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('mess') }}
      </div>
    @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered data">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td><?= $count ?></td>
                        <td>{{ $teacher->nama }}</td>
                        <td>
                            {{-- <a class="mx-2 btn btn-warning">Edit</a> --}}
                            <a href="#modalEdit" data-toggle="modal" onclick="$('#modalEdit #formEdit').attr('action', 'teacher/{{$teacher->id}}/update'); $('#modalEdit #formEdit #nama').attr('value', '{{$teacher->nama}}')" class="btn btn-warning">Edit</a>
                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', 'teacher/{{$teacher->id}}/destroy')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php $count++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


  <!-- Modal Create -->
  <div class="modal fade" id="modalCreate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/teacher/store" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" required class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                @error('nama')
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

  <!-- Modal Edit -->
  <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <input type="text" required class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="">
                @error('nama')
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