<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Jurnal Mengajar Guru</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
    <style>
        body {
            background-color: #e8f1ea;
        }

        #header {
            background-color: #218838;
        }

        #img-header {
            max-height: 12vh;
        }

        

        @media screen and (max-width: 1198px) {
            #text-header {
                font-size: 4vw;
            }
        }
        
        @media screen and (max-width: 576px) {
            #text-header {
                font-size: 6vw;
            }
        }
    </style>
</head>
<body>

    <div class="container p-lg-5 p-0 ">
            <div class="mx-lg-5 mx-0 bg-light shadow-sm ">
                <div id="header">
                <div class="container p-3 p-xl-5">
                        <div class="d-flex">
                            <div ><img id="img-header" src="/img/logo-smk.png" class="img-fluid mr-4" alt=""></div>
                            <div ><h1 id="text-header" class="ml-4 text-white font-weight-normal">E-Jurnal Mengajar Guru Bulan {{ $time->format('F')}} {{ $time->format('Y')}}</h1></div>
                        </div>
                        <p class="mt-4 text-white">Semester Genap Tahun Pelajaran 2020/2021</p>
                    </div>
                    
                </div>
                <div id="form">
                    <div class="container px-3 py-4 px-xl-5">
                        <p class="font-weight-light font-italic"><span class="text-danger font-weight-normal"><b>*</b></span> Wajib diisi</p>
                            <form action="/create" method="post">
                                {{ csrf_field() }}
                                <div class="form-group my-4">
                                    <label for="nama">1. Nama <span class="text-danger"><b>*</b></span></label>
                                    <select class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama">
                                      <option value="-">-- Pilih Nama --</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                    </select>
                                  </div>

                                <div class="form-group my-4">
                                    <label for="tanggal">2. Tanggal <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 datepicker @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autocomplete="off" value="{{old('tanggal')}}">
                                    <small id="kompetensi_keahlian" class="form-text text-muted mt-2" >Contoh Penulisan : 2004-05-15</small>
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="kelas">3. Kelas <span class="text-danger"><b>*</b></span></label>
                                    <div class="form-check my-2">
                                        <input class="form-check-input @error('kelas') is-invalid @enderror"" type="radio" name="kelas" id="kelas1" value="X" ">
                                        <label class="form-check-label" for="kelas1">
                                          X
                                        </label>
                                    </div>
                                    <div class="form-check my-2">
                                        <input class="form-check-input @error('kelas') is-invalid @enderror"" type="radio" name="kelas" id="kelas2" value="XI" " >
                                        <label class="form-check-label" for="kelas2" >
                                          XI
                                        </label>
                                    </div>
                                    <div class="form-check my-2">
                                        <input class="form-check-input @error('kelas') is-invalid @enderror"" type="radio" name="kelas" id="kelas3" value="XII" ">
                                        <label class="form-check-label" for="kelas3" >
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
                                    <label for="kompetensi_keahlian">4. Kompetensi Keahlian/Paralel <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('kompetensi_keahlian') is-invalid @enderror" id="kompetensi_keahlian" name="kompetensi_keahlian" autocomplete="off" value="{{old('kompetensi_keahlian')}}">
                                    <small id="kompetensi_keahlian" class="form-text text-muted mt-2">Contoh Penulisan : TKRO 1</small>
                                    @error('kompetensi_keahlian')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="jam_ke">5. Mengajar Jam Ke- <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('jam_ke') is-invalid @enderror" id="jam_ke" name="jam_ke" autocomplete="off" value="{{old('jam_ke')}}">
                                    <small id="jam_ke" class="form-text text-muted mt-2">Contoh Penulisan : 1-2</small>
                                    @error('jam_ke')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="mata_pelajaran">6. Mata Pelajaran <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" name="mata_pelajaran" autocomplete="off" value="{{old('mata_pelajaran')}}">
                                    <small id="mata_pelajaran" class="form-text text-muted mt-2">Contoh Penulisan : Bahasa Indonesia</small>
                                    @error('mata_pelajaran')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="siswa_hadir">7. Jumlah Siswa yang Hadir <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('siswa_hadir') is-invalid @enderror" id="siswa_hadir" name="siswa_hadir" autocomplete="off" value="{{old('siswa_hadir')}}">
                                    <small id="siswa_hadir" class="form-text text-muted mt-2">Contoh Penulisan : 35</small>
                                    @error('siswa_hadir')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="siswa_tidak_hadir">8. Jumlah Siswa yang tidak hadir <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('siswa_tidak_hadir') is-invalid @enderror" id="siswa_tidak_hadir" name="siswa_tidak_hadir" autocomplete="off" value="{{old('siswa_tidak_hadir')}}">
                                    <small id="siswa_tidak_hadir" class="form-text text-muted mt-2">Contoh Penulisan : 35</small>
                                    @error('siswa_tidak_hadir')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group my-4">
                                    <label for="deskripsi">9. Deskripsi kegiatan belajar mengajar <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="form-control mt-2 @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" autocomplete="off" value="{{old('deskripsi')}}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-success px-5 mt-2 mb-5">Kirim</button>
                    </form>
                    </div>
                </div>
            </div>
    </div>

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            orientation: "bottom auto"
            
      });
    });
    </script>
</body>
</html>