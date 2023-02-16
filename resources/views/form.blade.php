@extends('layouts.app')

{{-- GURU --}}
{{--  --}}

@if(auth()->user()->role == 'guru')
@section('main')
<div class="container my-0 my-sm-5 px-0 px-sm-2">
    <div class="card m-0 bg-white shadow-md">
        <div class="card-header bg-success p-3 p-sm-4 py-sm-5 row py-4">
            <div class="col-2 col-lg-1 pr-1 pl-md-4">
                <img src="{{asset('/img/logo-smk.png')}}" class="img-fluid">
            </div>
            <div class="col-10 col-lg-11  pl-3 pl-md-4">
                <h1 id="form__title" class="text-white">Jurnal Mengajar Pendidik</h1>
                <h6 id="form__desc" class="text-white">Semester {{ date('n') <= 6 ? 'Genap' : 'Ganjil' }} Tahun
                        Pelajaran @if(date('n')>= 1 && date('n') <= 6 ) {{ ( intval(date('Y')) - 1 ) . ' / ' . (
                            intval(date('Y')) + 1 ) }} @elseif(date('n')>= 6 &&
                            date('n') <= 12) {{intval(date('Y')) . ' / ' . ( intval(date('Y')) + 1)}} @endif </h6>
            </div>
        </div>
        <div class="card-body p-3 p-sm-5">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="h6 font-weight-light">Selamat datang, <span class="font-weight-bold text-primary ">{{
                            $user->nama }}</span>
                    </p>
                    <h5>Bulan
                        {{ $time->isoFormat('MMMM')}} {{ $time->format('Y')}}</h5>
                </div>
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
            <div class="form-group my-4">
                <label for="jenis"><b># JENIS #</b></label>
                <select class="custom-select mt-2 @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                    autocomplete="off">
                    <option value="jurnal">Jurnal</option>
                    <option value="izin">Izin</option>
                </select>
            </div>

            <form action="{{ route('create')}}" method="post" id="jurnal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="jenis" value="jurnal">

                <div class="form-group my-4">
                    <label for="tanggal">1. Tanggal <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 datepicker @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal" autocomplete="off" value="{{old('tanggal')}}" required>
                    <small class="form-text text-muted mt-2">Contoh Penulisan : <b>
                            2004-05-15</b></small>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="kelas_container">2. Kelas<span class="text-danger"><b>*</b></span></label>

                    <select class="custom-select mt-2 @error('kelas') is-invalid @enderror" id="kelas_container"
                        name="kelas_container" autocomplete="off">
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                    </select>
                    <small class="form-text text-muted mt-2">Pilih Tingkat Terlebih
                        Dahulu</small>

                    <select class="custom-select mt-2 @error('kelas') is-invalid @enderror" id="kelas" name="kelas"
                        autocomplete="off">

                    </select>
                    <small class="form-text text-muted mt-2">Silahkan Pilih Kelas</small>
                    @error('kompetensi_keahlian')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="jam_ke">3. Mengajar Jam Ke- <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('jam_ke') is-invalid @enderror" id="jam_ke" name="jam_ke"
                        autocomplete="off" required>
                        @if(old('jam_ke'))
                        <option>{{ old('jam_ke') }}</option>
                        @endif
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    @error('jam_ke')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="sampai_jam_ke">4. Sampai Jam Ke- <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('sampai_jam_ke') is-invalid @enderror" id="sampai_jam_ke"
                        name="sampai_jam_ke" autocomplete="off" required>
                        @if(old('sampai_jam_ke'))
                        <option>{{ old('sampai_jam_ke') }}</option>
                        @endif
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <small class="form-text text-muted mt-2">Pilih Jam yang sama jika hanya mengajar 1 Jam</small>
                    @error('sampai_jam_ke')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="mata_pelajaran">5. Mata Pelajaran <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran"
                        name="mata_pelajaran" autocomplete="off" required>
                        @if(old('mata_pelajaran'))
                        <option>{{ old('jam_ke') }}</option>
                        @endif
                        @foreach($mata_pelajaran as $data)
                        <option>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    @error('mata_pelajaran')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="deskripsi">6. Deskripsi kegiatan belajar mengajar <span
                            class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('deskripsi') is-invalid @enderror" id="deskripsi"
                        name="deskripsi" autocomplete="off" value="{{old('deskripsi')}}" required>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label class="d-block" for="siswa">7. Siswa Tanpa Keterangan <span
                            class="text-danger"><b>*</b></span></label>
                    <small class="form-text text-muted mt-2">Centang siswa yang tidak hadir</small>
                    <div id="siswa">
                    </div>
                    @error('siswa')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="catatan_siswa">8. Catatan Khusus Siswa </span></label>
                    <input type="text" class="form-control mt-2 @error('catatan_siswa') is-invalid @enderror"
                        id="catatan_siswa" name="catatan_siswa" autocomplete="off" value="{{old('catatan_siswa')}}">
                    <small class="form-text text-muted mt-2">Contoh Penulisan : <b> Siswa yang bernama Ahmad tidak
                            masuk
                            3
                            kali berturut turut</b></small>
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

            <form action="{{ route('create')}}" method="post" id="izin" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="jenis" value="izin">

                <div class="form-group my-4">
                    <label for="jenis_izin">1. Jenis Izin <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('jenis_izin') is-invalid @enderror" id="jenis_izin"
                        name="jenis_izin" autocomplete="off" required>
                        @if(old('jenis_izin'))
                        <option>{{ old('jenis_izin') }}</option>
                        @endif
                        <option>Dinas</option>
                        <option>Non Dinas</option>
                    </select>
                    @error('jenis_izin')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="tanggal">2. Tanggal <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 datepicker @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal" autocomplete="off" value="{{old('tanggal')}}" required>
                    <small class="form-text text-muted mt-2">Contoh Penulisan :
                        <b>2004-05-15</b></small>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="kelas_container">3. Kelas<span class="text-danger"><b>*</b></span></label>

                    <select class="custom-select mt-2 @error('kelas') is-invalid @enderror" id="kelas_container2"
                        name="kelas_container" autocomplete="off" onChange="changeKelas()">
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                    </select>
                    <small class="form-text text-muted mt-2">Pilih Tingkat Terlebih
                        Dahulu</small>

                    <select class="custom-select mt-2 @error('kelas') is-invalid @enderror" id="kelas2" name="kelas"
                        autocomplete="off">

                    </select>
                    <small class="form-text text-muted mt-2">Silahkan Pilih Kelas</small>
                    @error('kompetensi_keahlian')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="jam_ke">4. Mengajar Jam Ke- <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('jam_ke') is-invalid @enderror" id="jam_ke" name="jam_ke"
                        autocomplete="off" required>
                        @if(old('jam_ke'))
                        <option>{{ old('jam_ke') }}</option>
                        @endif
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    @error('jam_ke')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="sampai_jam_ke">5. Sampai Jam Ke- <span class="text-danger"><b>*</b></span></label>
                    <select class="custom-select mt-2 @error('sampai_jam_ke') is-invalid @enderror" id="sampai_jam_ke"
                        name="sampai_jam_ke" autocomplete="off" required>
                        @if(old('sampai_jam_ke'))
                        <option>{{ old('sampai_jam_ke') }}</option>
                        @endif
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <small class="form-text text-muted mt-2">Pilih Jam yang sama jika hanya mengajar 1 Jam</small>
                    @error('sampai_jam_ke')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="ruang">6. Ruang <span class="text-danger"><b>*</b></span></label>
                    <input type="text" class="form-control mt-2 @error('ruang') is-invalid @enderror" id="ruang"
                        name="ruang" autocomplete="off" value="{{old('ruang')}}" required>
                    @error('ruang')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="petunjuk_tugas">7. Petunjuk Tugas </span></label>
                    <textarea class="form-control mt-2 @error('petunjuk_tugas') is-invalid @enderror"
                        id="petunjuk_tugas" name="petunjuk_tugas" rows="3">{{ old('petunjuk_tugas') }}</textarea>
                    @error('petunjuk_tugas')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('petunjuk_tugas_file') is-invalid @enderror"
                            id="petunjuk_tugas_file" name="petunjuk_tugas_file">
                        <label class="custom-file-label mt-2" for="petunjuk_tugas_file">Pilih Dokumen / Foto</label>
                    </div>
                    @error('petunjuk_tugas_file')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="surat_izin">8. Surat Izin <span class="text-danger"><b>*</b></span> </span></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('surat_izin') is-invalid @enderror"
                            id="surat_izin" name="surat_izin" required>
                        <label class="custom-file-label mt-2" for="surat_izin">Pilih Dokumen / Foto</label>
                    </div>
                    @error('surat_izin')
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
    </>
    @endsection

    @section('modal')
    <!-- Modal Activity -->
    <div class="modal fade" id="modalHistori" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Histori Jurnal hari ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="activities">
                        @foreach($aktivitas_jurnal_guru as $data)
                        <div class="activity align-items-center mb-2">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-pen"></i>
                            </div>
                            <div class="activity-detail w-100 m-0">
                                <div class="mb-1">
                                    <span class="text-job text-primary">{{ $data->jurnal_guru->tanggal }}</span>
                                    <div class="float-right dropdown">
                                        <span class="font-weight-bold text-primary">{{ $data->jurnal_guru->kelas }}
                                            {{ $data->jurnal_guru->kompetensi_keahlian }}</span>
                                    </div>
                                </div>
                                <p>Mapel: <span class="font-weight-bold text-primary text-medium">{{
                                        $data->jurnal_guru->mata_pelajaran }}</span>
                                    -
                                    Jam Ke: <span class="font-weight-bold text-primary">{{ $data->jurnal_guru->jam_ke
                                        }}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Histori Izin hari ini</h5>
                </div>
                <div class="modal-body">
                    <div class="activities">
                        @foreach($aktivitas_izin_guru as $data)
                        <div class="activity align-items-center mb-2">
                            <div class="activity-icon bg-danger text-white shadow-primary">
                                <i class="fas fa-door-open"></i>
                            </div>
                            <div class="activity-detail w-100 m-0">
                                <div class="mb-1">
                                    <span class="text-job text-danger">{{ $data->izin_guru->tanggal }}</span>
                                    <div class="float-right dropdown">
                                        <span class="font-weight-bold text-danger">{{ $data->izin_guru->kelas }}
                                            {{ $data->izin_guru->kompetensi_keahlian }}</span>
                                    </div>
                                </div>
                                <p>Mapel: <span class="font-weight-bold text-danger text-medium">{{
                                        $data->izin_guru->mata_pelajaran }}</span>
                                    -
                                    Jam Ke: <span class="font-weight-bold text-danger">{{ $data->izin_guru->jam_ke
                                        }}</span>
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
    // data from laravel
    const data = <?= $siswa ?>;
    
    // declare element variable
    let elKelasContainer = document.getElementById('kelas_container');
    let elKelas = document.getElementById('kelas');
    let elSiswa = document.getElementById('siswa');

    const elJenis = document.getElementById('jenis');

    const changeJenis = () => {

        if(elJenis.value == 'jurnal') {
            elKelasContainer = document.getElementById('kelas_container');
            elKelas = document.getElementById('kelas');

            document.getElementById('jurnal').style.display = 'block';
            document.getElementById('izin').style.display = 'none';
        } else if(elJenis.value == 'izin') {
            elKelasContainer = document.getElementById('kelas_container2');
            elKelas = document.getElementById('kelas2');

            document.getElementById('jurnal').style.display = 'none';
            document.getElementById('izin').style.display = 'block';
        }

        setKelas();
        changeKelas();
    }

    elJenis.addEventListener('change', () => {
        changeJenis();
    })
    
    // data array
    let classX = [];
    let classXI = [];
    let classXII = [];

    // init kelas to array 
    const setKelas = () => {
        data.map((x, i) => {
            const kelas = x.kelas.split(' / ');

            if(kelas[0] == 'X') {
                classX.push(x.kelas);
            } else if(kelas[0] == 'XI') {
                classXI.push(x.kelas);
            } else if(kelas[0] == 'XII') {
                classXII.push(x.kelas);
            }
        })
        
        const array_unnique = (value, index, self) => {
            return self.indexOf(value) === index;
        }

        classX = classX.filter(array_unnique);
        classXI = classXI.filter(array_unnique);
        classXII = classXII.filter(array_unnique);
    }

    // if kelas on change
    const changeKelas = (value) => {
        const kelasValue = elKelasContainer.value;

        elKelas.innerHTML = '';

        if(kelasValue == 'X') {
            classX.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        } else if(kelasValue == 'XI') {
            classXI.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        } else if(kelasValue == 'XII') {
            classXII.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        }

        if(elJenis.value == 'jurnal') {   
            changeSiswa();
        }
    }

    // if siswa on change
    const changeSiswa = () => {
        let siswa = [];

        data.map((x, i) => {
            const kelas = x.kelas.split(' / ');
            
            if(elKelas.value == x.kelas) {
                siswa.push(x);
            }
        })

        elSiswa.innerHTML = '';

        siswa.map((x) => {
            elSiswa.innerHTML += `<div class='form-check my-2'><input class='form-check-input' type='checkbox' name='siswa[]' value='${x.id}'><label class=' form-check-label' for='kelas1'>${x.nama}</label></div>`
        });
    }
    

    elKelasContainer.addEventListener('change', () => {
        changeKelas();
    })

    elKelas.addEventListener('change', () => {
        changeSiswa();
    })

    window.onload = () => {
        changeJenis();

        setKelas();
        changeKelas();
        changeSiswa();
    }

</script>
@endsection

@endif


@if(auth()->user()->role == 'karyawan')
@section('main')
<div class="container my-0 my-sm-5 px-0 px-sm-2">
    <div class="card m-0 bg-white shadow-md">
        <div class="card-header bg-success p-3 p-sm-4 py-sm-5 row py-4">
            <div class="col-2 col-lg-1 pr-1 pl-md-4">
                <img src="{{asset('/img/logo-smk.png')}}" class="img-fluid">
            </div>
            <div class="col-10 col-lg-11  pl-3 pl-md-4">
                <h1 id="form__title" class="text-white">Jurnal Karyawan</h1>
                <h6 id="form__desc" class="text-white">Semester {{ date('n') <= 6 ? 'Genap' : 'Ganjil' }} Tahun
                        Pelajaran @if(date('n')>= 1 && date('n') <= 6 ) {{ ( intval(date('Y')) - 1 ) . ' / ' . (
                            intval(date('Y')) + 1 ) }} @elseif(date('n')>= 6 &&
                            date('n') <= 12) {{intval(date('Y')) . ' / ' . ( intval(date('Y')) + 1)}} @endif</h6>
            </div>
        </div>
        <div class="card-body p-3 p-sm-5">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="h6 font-weight-light">Selamat datang, <span class="font-weight-bold text-primary ">{{
                            $user->nama }}</span>
                    </p>
                    <h5>Bulan
                        {{ $time->isoFormat('MMMM')}} {{ $time->format('Y')}}</h5>
                </div>
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
                        id="tanggal" name="tanggal" autocomplete="off" value="{{old('tanggal')}}" required>
                    <small class="form-text text-muted mt-2">Contoh Penulisan : <b>
                            2004-05-15</b></small>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="unit_kerja">2. Unit Kerja<span class="text-danger"><b>*</b></span></label>

                    <select class="custom-select mt-2 @error('kelas') is-invalid @enderror" id="unit_kerja"
                        name="unit_kerja" autocomplete="off">
                        @foreach($unit_kerja as $data)
                        <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted mt-2">Pilih Unit Kerja</small>

                    <div class="form-group my-4">
                        <label for="deskripsi">3. Deskripsi kegiatan<span class="text-danger"><b>*</b></span></label>
                        <input type="text" class="form-control mt-2 @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" autocomplete="off" value="{{old('deskripsi')}}" required>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-5 mt-2 mb-4">Kirim</button>
                    </div>
            </form>
        </div>
    </div>
    </>
    @endsection

    @section('modal')
    <!-- Modal Activity -->
    <div class="modal fade" id="modalHistori" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Histori Jurnal hari ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="activities">
                        @foreach($aktivitas_karyawan as $data)
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-pen"></i>
                            </div>
                            <div class="activity-detail w-100 mb-2 pt-2">
                                <div class="mb-1">
                                    <span class="text-job text-primary">{{ $data->jurnal_karyawan->tanggal }}</span>
                                    <div class="float-right dropdown">
                                        <span class="font-weight-bold text-primary">{{ $data->jurnal_karyawan->kelas }}
                                            {{ $data->jurnal_karyawan->kompetensi_keahlian }}</span>
                                    </div>
                                </div>
                                <p>Unit Kerja: <span class="font-weight-bold text-primary text-medium">{{
                                        $data->jurnal_karyawan->unit_kerja }}</span>
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

@endif