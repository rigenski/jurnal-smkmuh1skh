@extends('layouts.app')

@section('main')
<div class="container my-0 my-sm-5 px-0 px-sm-2">
    <div class="card m-0 bg-white shadow-md">
        <div class="card-header bg-success p-3 p-sm-4 py-4 py-sm-5">
            <div class="row my-4 my-md-4">
                <div class="col-2 col-lg-1 pr-1 pl-md-4">
                    <img src=" {{asset('assets/img/logo-smk.png')}}" class="img-fluid ">
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
            <div class="d-flex justify-content-between">
                <p class="h6 font-weight-light mt-2">Selamat datang, <span
                        class="font-weight-bold text-primary ">{{ auth()->user()->name }}</span>
                </p>
                <p class="h6 font-weight-light mt-2 mb-5"> <a href="{{route('logout')}}"
                        class="font-weight-bold text-danger border-bottom border-danger">Logout</a>
                </p>
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
                    <label for="kelas">2. Kelas <span class="text-danger"><b>*</b></span></label>
                    <div class="form-check my-2">
                        <input class="form-check-input @error('kelas') is-invalid @enderror" type="radio" name="kelas"
                            id="kelas1" value="X" ">
                                            <label class=" form-check-label" for="kelas1">
                        X
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input @error('kelas') is-invalid @enderror" type="radio" name="kelas"
                            id="kelas2" value="XI" " >
                                            <label class=" form-check-label" for="kelas2">
                        XI
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input @error('kelas') is-invalid @enderror" type="radio" name="kelas"
                            id="kelas3" value="XII" ">
                                            <label class=" form-check-label" for="kelas3">
                        XII
                        </label>
                    </div>
                    @error('kelas')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="kompetensi_keahlian">3. Kompetensi Keahlian/Paralel <span
                            class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('kompetensi_keahlian') is-invalid @enderror"
                        id="kompetensi_keahlian" name="kompetensi_keahlian" autocomplete="off"
                        value="{{old('kompetensi_keahlian')}}">
                    <small id="kompetensi_keahlian" class="form-text text-muted mt-2">Contoh Penulisan : TKRO
                        1</small>
                    @error('kompetensi_keahlian')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="jam_ke">4. Mengajar Jam Ke- <span class="text-danger"><b>*</b></span></label>
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
                    <label for="mata_pelajaran">5. Mata Pelajaran <span class="text-danger"><b>*</b></span></label>
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

                <div class="form-group my-4">
                    <label for="siswa_hadir">6. Jumlah Siswa yang Hadir <span
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
                    <label for="siswa_tidak_hadir">7. Jumlah Siswa yang tidak hadir <span
                            class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('siswa_tidak_hadir') is-invalid @enderror"
                        id="siswa_tidak_hadir" name="siswa_tidak_hadir" autocomplete="off"
                        value="{{old('siswa_tidak_hadir')}}">
                    <small id="siswa_tidak_hadir" class="form-text text-muted mt-2">Contoh Penulisan :
                        35</small>
                    @error('siswa_tidak_hadir')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="deskripsi">8. Deskripsi kegiatan belajar mengajar <span
                            class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('deskripsi') is-invalid @enderror" id="deskripsi"
                        name="deskripsi" autocomplete="off" value="{{old('deskripsi')}}">
                    @error('deskripsi')
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