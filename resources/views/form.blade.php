@extends('layouts.app')

@section('main')
<div class="container my-0 my-sm-5 px-0 px-sm-2">
    <div class="card m-0 bg-white shadow-md">
        <div class="card-header bg-success p-3 p-sm-4 py-4 py-sm-5">
            <div class="row my-4 my-md-4">
                <div class="col-2 col-lg-1 pr-1 pl-md-4">
                    <img src=" {{asset('assets/img/logo-smk.png')}}" class="img-fluid">
                </div>
                <div class="col-10 col-lg-11  pl-3 pl-md-4">
                    <h6 id="form__desc" class="text-white">Semester Genap Tahun Pelajaran
                        2021/2022</h6>
                    <h1 id="form__title" class="text-white">E-Jurnal Mengajar Guru Bulan
                        {{ $time->format('F')}} {{ $time->format('Y')}}</h1>
                </div>
            </div>
        </div>
        <div class="card-body p-3 p-sm-5">
            <div class="d-flex justify-content-between mt-4">
                <p class="h6 font-weight-light">Selamat datang, <span
                        class="font-weight-bold text-primary ">{{ auth()->user()->name }}</span>
                </p>
                <div class="d-flex">
                    <a href="#modalHistori" data-toggle="modal" class="h6 ">
                        <span class="font-weight-bold text-success border-bottom border-success mx-1">
                            Histori
                        </span>
                    </a>
                    <a href="{{route('logout')}}" class="h6 ">
                        <span class="font-weight-bold text-danger border-bottom border-danger mx-1">
                            Logout
                        </span>
                    </a>

                </div>
            </div>
            <form action="{{ route('create')}} " method="post">
                {{ csrf_field() }}
                <div class="form-group my-4">
                    <label for="tanggal">1. Tanggal <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 datepicker @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal" autocomplete="off" value="{{old('tanggal')}}">
                    <small id="kompetensi_keahlian" class="form-text text-muted mt-2">Contoh Penulisan :
                        2004-05-15</small>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="kompetensi_keahlian">2. Kelas<span class="text-danger"><b>*</b></span></label>
                    <select class="form-control mt-2 @error('kelas') is-invalid @enderror" id="kelas" name="kelas"
                        autocomplete="off">
                        <option>X TKRO</option>
                        <option>XI RPL</option>
                        <option>XII TKJ</option>
                        {{-- <option>XII TEI</option> --}}
                    </select>
                    @error('kompetensi_keahlian')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="jam_ke">3. Mengajar Jam Ke- <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('jam_ke') is-invalid @enderror" id="jam_ke"
                        name="jam_ke" autocomplete="off" value="{{old('jam_ke')}}">
                    <small id="jam_ke" class="form-text text-muted mt-2">Contoh Penulisan : 1-2</small>
                    @error('jam_ke')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="mata_pelajaran">4. Mata Pelajaran <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('mata_pelajaran') is-invalid @enderror"
                        id="mata_pelajaran" name="mata_pelajaran" autocomplete="off" value="{{old('mata_pelajaran')}}">
                    <small id="mata_pelajaran" class="form-text text-muted mt-2">Contoh Penulisan : Bahasa
                        Indonesia</small>
                    @error('mata_pelajaran')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                {{-- <div class="form-group my-4">
                    <label for="siswa_hadir">5. Jumlah Siswa yang Hadir <span
                            class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('siswa_hadir') is-invalid @enderror"
                        id="siswa_hadir" name="siswa_hadir" autocomplete="off" value="{{old('siswa_hadir')}}">
                <small id="siswa_hadir" class="form-text text-muted mt-2">Contoh Penulisan : 35</small>
                @error('siswa_hadir')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
        </div>

        <div class="form-group my-4">
            <label for="siswa_tidak_hadir">6. Jumlah Siswa yang tidak hadir <span
                    class="text-danger"><b>*</b></span></label>
            <input type="text" class="form-control mt-2 @error('siswa_tidak_hadir') is-invalid @enderror"
                id="siswa_tidak_hadir" name="siswa_tidak_hadir" autocomplete="off" value="{{old('siswa_tidak_hadir')}}">
            <small id="siswa_tidak_hadir" class="form-text text-muted mt-2">Contoh Penulisan :
                35</small>
            @error('siswa_tidak_hadir')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror
        </div> --}}

        <div class="form-group my-4">
            <label for="deskripsi">5. Deskripsi kegiatan belajar mengajar <span
                    class="text-danger"><b>*</b></span></label>
            <input type="text" class="form-control mt-2 @error('deskripsi') is-invalid @enderror" id="deskripsi"
                name="deskripsi" autocomplete="off" value="{{old('deskripsi')}}">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message}}
            </div>
            @enderror
        </div>

        <div class="form-group my-4">
            <label class="d-block" for="siswa">6. Siswa Tanpa Keterangan <span
                    class="text-danger"><b>*</b></span></label>
            <small id="jam_ke" class="form-text text-muted mt-2">Centang siswa yang tidak hadir</small>
            {{-- <select class="form-control multi-select mt-2 @error('siswa') is-invalid @enderror"
                        multiple="multiple" name="siswa[]" id="siswa" required>
                        @foreach($students as $student)
                        <option value={{$student->id}}>{{ $student->nama }}</option>
            @endforeach
            </select> --}}
            <div id="siswa">
                {{-- @foreach($students as $student)
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" name="siswa[]" value="{{$student->id}}">
                <label class=" form-check-label" for="kelas1">
                    {{ $student->nama }}
                </label>
            </div>
            @endforeach --}}
        </div>
        @error('siswa')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-5 mt-2 mb-4">Kirim</button>
    </div>
    </form>
</div>
</div>
</div>
@endsection

@section('modal')
<!-- Modal Activity -->
<div class="modal fade" id="modalHistori" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Histori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="activities">
                    @foreach($activities as $activity)
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="activity-detail w-100 mb-2">
                            <div class="mb-1">
                                <span class="text-job text-primary">{{ $activity->journal->tanggal }}</span>
                                <div class="float-right dropdown">
                                    <span class="font-weight-bold text-primary">{{ $activity->journal->kelas }}
                                        {{ $activity->journal->kompetensi_keahlian }}</span>
                                </div>
                            </div>
                            <p>Mapel: <span
                                    class="font-weight-bold text-primary text-medium">{{ $activity->journal->mata_pelajaran }}</span>
                                -
                                Jam Ke: <span
                                    class="font-weight-bold text-primary">{{ $activity->journal->jam_ke }}</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('script')
<script>
    const kelasContainer = document.querySelector('#kelas');
    const siswaContainer = document.querySelector('#siswa');

    const changeSiswa = () => {
        const data = <?= $students ?>;
        let siswa = [];

        for(let i = 0; i < data.length; i++) {
            if(kelasContainer.value == data[i].kelas) {
                siswa.push(data[i]);
            }
        }

        siswaContainer.innerHTML = '';

        siswa.map((i) => {
            siswaContainer.innerHTML += `<div class='form-check my-2'><input class='form-check-input' type='checkbox' name='siswa[]' value='${i.id}'><label class=' form-check-label' for='kelas1'>${i.nama}</label></div>`
        });
    }

    kelasContainer.addEventListener('change', () => {
        changeSiswa();
    })

    window.onload = changeSiswa();
    

</script>
@endsection