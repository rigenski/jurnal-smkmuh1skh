@extends('layouts.app')

{{-- GURU --}}

@if(auth()->user()->role == 'guru')
@section('main')
    <nav class="w-full z-40 py-4">
        <div class="flex justify-center">
            <div class="container max-w-6xl px-4">
                <div class="flex justify-between items-center">
                    <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                        SiMa-Ku
                    </a>
                    <button class="flex items-center text-sm font-normal text-white md:text-base" id="modal-open">
                        <span class="mr-2">History</span>
                        <div class="h-5 w-5 md:h-6 md:w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" class="text-white"><path fill="currentColor" d="m13 11.6l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-2.8-2.8q-.15-.15-.225-.337T11 11.975V8q0-.425.288-.713T12 7q.425 0 .713.288T13 8v3.6ZM12 21q-3.025 0-5.425-1.788T3.35 14.55q-.125-.45.088-.85t.662-.5q.425-.1.763.188t.462.712q.65 2.2 2.513 3.55T12 19q2.925 0 4.963-2.038T19 12q0-2.925-2.038-4.963T12 5q-1.725 0-3.225.8T6.25 8H8q.425 0 .713.288T9 9q0 .425-.288.713T8 10H4q-.425 0-.713-.288T3 9V5q0-.425.288-.713T4 4q.425 0 .713.288T5 5v1.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.713 3.513t-1.924 2.85q-1.213 1.212-2.85 1.925T12 21Z"/></svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <main class="-mt-[60px] md:-mt-[64px]">
        <div class="w-full h-[480px] bg-gradient-to-br from-indigo-500 to-indigo-700"></div>
       <div class="-mt-[400px] pb-24 flex justify-center md:-mt-[360px]">
            <div class="container px-4 max-w-2xl">
                <div>
                    <div class="flex justify-start mb-4">
                        <a href={{ route('home') }} class="flex items-center text-base font-normal text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z" class="text-white"/></svg>
                            <span class="ml-2">Kembali</span>
                        </a>
                    </div>
                    <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8" action="{{ route('refleksi.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4 class="mb-2 text-2xl font-semibold text-gray-800 lg:text-3xl">Refleksi Guru</h4>
                        <p class="mb-8 text-sm font-normal text-gray-600 lg:text-base">Bulan {{ date('m') != date('m', strtotime('+1 week')) ? date('F') : date('F', strtotime('-1 month', strtotime(date('Y-m-d')))) }} <br /> Tahun
                            Pelajaran @if(date('n')>= 1 && date('n') <= 6 ) {{ ( intval(date('Y')) - 1 ) . ' / ' . (
                                intval(date('Y')) ) }} @elseif(date('n')>= 6 &&
                                date('n') <= 12) {{intval(date('Y')) . ' / ' . ( intval(date('Y')) + 1)}} @endif</p>
                                
                            @if(count($aktivitas_refleksi_guru))
                            <div class="pt-8 pb-24 flex flex-col justify-center items-center">
                                <img src="{{ asset('/img/refleksi-start-bg.svg')}}" alt="" class="mb-4 max-h-64">
                                <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Terimakasih !!!</h4>
                                <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Kamu sudah mengisi Refleksi pada bulan ini</p>
                            </div>
                            @elseif(date('m') != date('m', strtotime('+1 week')) || (date('j') <= 7 && date('N') <= 7))
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" to="kelas_container">
                                        1. Kelas <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="kelas_container"
                                    name="kelas_container" required>
                                        <option value="">-- Pilih --</option>
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
                                    </select>
                                    <small class="mt-2 text-xs font-normal text-gray-400">Pilih Tingkat</small>
                                    <select class="mt-2 border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="kelas" name="kelas" required>
                                        <option value="">-- Pilih --</option>
                                    </select>
                                    <small class="mt-2 text-xs font-normal text-gray-400">Pilih Kelas</small>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="mata_pelajaran">
                                        2. Mata Pelajaran  <span class="text-red-600">*</span>
                                    </label>
                                    <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="mata_pelajaran"
                                    name="mata_pelajaran" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach($mata_pelajaran as $data)
                                        <option>{{ $data->nama }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan1">
                                        3. Apa yang berjalan baik bulan ini <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan1"
                                    name="pertanyaan1"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan2">
                                        4. Apa yang tidak berjalan baik bulan ini ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan2"
                                    name="pertanyaan2"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan3">
                                        5. Keterampilan apa yang dikuasai oleh siswa dibulan ini ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan3"
                                    name="pertanyaan3"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan4">
                                        6. Keterampilan apa yang masih perlu ditingkatkan oleh siswa ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan4"
                                    name="pertanyaan4"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan5">
                                        7. Jika memiliki kesempatan mengajar materi pelajaran yang sama pada kelompok siswa yang sama, hal apa yang akan dilakukan secara berbeda ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan5"
                                    name="pertanyaan5"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan6">
                                        8. Sebutkan nama siswa yang terlibat aktif dalam pembelajaran bulan ini ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan6"
                                    name="pertanyaan6"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan7">
                                        9. Sebutkan nama siswa yang tampak membutuhkan lebih banyak dukungan dan perhatian dibulan berikutnya ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan7"
                                    name="pertanyaan7"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-2 flex flex-col md:mb-4">
                                    <label class="mb-2 text-sm font-light text-gray-600" for="pertanyaan8">
                                        10. Hal apa yang perlu diperbaiki kedepan agar sekolah ini tetap Unggul ? <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                    type="text"
                                    class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                    id="pertanyaan8"
                                    name="pertanyaan8"
                                    required
                                    />
                                </div>
                            </div>
                            <div class="flex justify-end mt-8">
                                <button type="submit" class="min-w-[140px] bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded" >
                                    KIRIM
                                </button>
                            </div>
                            @else
                            <div class="pt-8 pb-24 flex flex-col justify-center items-center">
                                <img src="{{ asset('/img/refleksi-end-bg.svg')}}" alt="" class="mb-4 max-h-64">
                                <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Mohon Maaf !!!</h4>
                                <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Formulir Refleksi hanya dibuka di 1 minggu sebelum akhir bulan</p>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection


@section('modal')
        <div id="modal" class="min-h-screen w-full hidden fixed top-0 left-0 overflow-scroll bg-gray-800 bg-opacity-50">
            <div class="min-h-screen w-full absolute left-0 top-0 flex justify-center">
                <div class="container px-4 py-16 max-w-md">
                    <div class="p-4 w-full bg-white rounded-lg">
                        <div class="mb-4 flex justify-between">
                            <h4 class="text-lg font-semibold text-gray-800 lg:text-xl">History</h4>
                            <button class="w-8 h-8" id="modal-close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" class="text-gray-800"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                            </button>
                        </div>
                        <div>
                            @if(count($aktivitas_refleksi_guru)) 
                                @foreach($aktivitas_refleksi_guru as $aktivitas)
                                    <div class="mb-2 pb-2 flex w-full">
                                        <div class="mr-2">
                                            <div class="h-8 w-8">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" class="text-indigo-600"><path fill="currentColor" d="m13 11.6l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-2.8-2.8q-.15-.15-.225-.337T11 11.975V8q0-.425.288-.713T12 7q.425 0 .713.288T13 8v3.6ZM12 21q-3.025 0-5.425-1.788T3.35 14.55q-.125-.45.088-.85t.662-.5q.425-.1.763.188t.462.712q.65 2.2 2.513 3.55T12 19q2.925 0 4.963-2.038T19 12q0-2.925-2.038-4.963T12 5q-1.725 0-3.225.8T6.25 8H8q.425 0 .713.288T9 9q0 .425-.288.713T8 10H4q-.425 0-.713-.288T3 9V5q0-.425.288-.713T4 4q.425 0 .713.288T5 5v1.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.713 3.513t-1.924 2.85q-1.213 1.212-2.85 1.925T12 21Z"/></svg>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <p class="mb-0.5 text-sm font-normal text-gray-600">Mata Pelajaran: <span class="text-gray-800 font-bold">{{ $aktivitas->refleksi_guru->mata_pelajaran }}</span></p>
                                            <div class="flex flex-wrap">
                                                <div class="w-full md:w-6/12">
                                                    <p class="mb-0.5 text-sm font-normal text-gray-600 ">Kelas: <span class="text-gray-800 font-bold">{{ $aktivitas->refleksi_guru->kelas }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="pb-4 flex justify-center">
                                    <p class="text-base font-normal text-gray-800 mx-4">Tidak Ada Data</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('script')
@if(count($aktivitas_refleksi_guru))
<script>

    // modal 

    const modalContainer = document.getElementById('modal');
    const modalOpen = document.getElementById('modal-open');
    const modalClose = document.getElementById('modal-close');

    modalOpen.addEventListener('click', () => {
        document.body.classList.add('overflow-hidden');
        modalContainer.classList.remove('hidden');
        modalContainer.classList.add('block');
    })        
    
    modalClose.addEventListener('click', () => {
        document.body.classList.remove('overflow-hidden');
        modalContainer.classList.remove('block');
        modalContainer.classList.add('hidden');
    })        
</script>
@elseif(date('m') != date('m', strtotime('+1 week')) || (date('j') <= 7 && date('N') <= 7))
<script>
    // data from laravel
    const data = @json($siswa);
    
    // declare element variable
    let elKelasContainer = document.getElementById('kelas_container');
    let elKelas = document.getElementById('kelas');
    let elSiswa = document.getElementById('siswa');
    
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
    }
    

    elKelasContainer.addEventListener('change', () => {
        changeKelas();
    })

    window.onload = () => {
        setKelas();
    }


    // modal 

    const modalContainer = document.getElementById('modal');
    const modalOpen = document.getElementById('modal-open');
    const modalClose = document.getElementById('modal-close');

    modalOpen.addEventListener('click', () => {
        document.body.classList.add('overflow-hidden');
        modalContainer.classList.remove('hidden');
        modalContainer.classList.add('block');
    })        
    
    modalClose.addEventListener('click', () => {
        document.body.classList.remove('overflow-hidden');
        modalContainer.classList.remove('block');
        modalContainer.classList.add('hidden');
    })        
</script>
@else
<script>

    // modal 

    const modalContainer = document.getElementById('modal');
    const modalOpen = document.getElementById('modal-open');
    const modalClose = document.getElementById('modal-close');

    modalOpen.addEventListener('click', () => {
        document.body.classList.add('overflow-hidden');
        modalContainer.classList.remove('hidden');
        modalContainer.classList.add('block');
    })        
    
    modalClose.addEventListener('click', () => {
        document.body.classList.remove('overflow-hidden');
        modalContainer.classList.remove('block');
        modalContainer.classList.add('hidden');
    })        
</script>
@endif
@endsection
@endif