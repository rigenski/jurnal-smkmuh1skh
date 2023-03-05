@extends('layouts.app')

{{-- GURU --}}

@section('main')
    <nav class="w-full z-40 py-4">
        <div class="flex justify-center">
            <div class="container max-w-6xl px-4">
                <div class="flex justify-between items-center">
                    <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                        SiMa-Ku
                    </a>
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
                    <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8" action="{{ route('rekap')}}" method="get">
                        <h4 class="mb-2 text-2xl font-semibold text-gray-800 lg:text-3xl">Rekap Data</h4>
                        <p class="mb-8 text-sm font-normal text-gray-600 lg:text-base">Semester {{ date('n') <= 6 ? 'Genap' : 'Ganjil' }} <br /> Tahun
                            Pelajaran @if(date('n')>= 1 && date('n') <= 6 ) {{ ( intval(date('Y')) - 1 ) . ' / ' . (
                                intval(date('Y')) ) }} @elseif(date('n')>= 6 &&
                                date('n') <= 12) {{intval(date('Y')) . ' / ' . ( intval(date('Y')) + 1)}} @endif</p>
                        <div class="mb-8">
                            <div class="flex flex-wrap items-center -mx-2">
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                            Tingkat
                                        </label>
                                        <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="angkatan"
                                    name="angkatan">
                                            @if($request->angkatan === 'X')
                                            <option selected>X</option>
                                            <option value="">Semua</option>
                                            <option>XI</option>
                                            <option>XII</option>
                                            @elseif($request->angkatan === 'XI')
                                            <option selected>XI</option>
                                            <option value="">Semua</option>
                                            <option>X</option>
                                            <option>XII</option>
                                            @elseif($request->angkatan === 'XII')
                                            <option selected>XII</option>
                                            <option value="">Semua</option>
                                            <option>X</option>
                                            <option>XI</option>
                                            @else
                                            <option value="">Semua</option>
                                            <option>X</option>
                                            <option>XI</option>
                                            <option>XII</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                           Kelas/Jurusan
                                        </label>
                                        <select class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md" id="kelas" name="kelas" >
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center -mx-2">
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                            Tanggal Awal
                                        </label>
                                        <input
                                        type="date"
                                        class="w-full border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                        name="search1" autocomplete="off"
                                        value="{{ $request->search1}}"
                                        />
                                    </div>
                                </div>
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                            Tanggal Akhir
                                        </label>
                                        <input
                                        type="date"
                                        class="w-full border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                        name="search2" autocomplete="off"
                                        value="{{ $request->search2}}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <button type="submit" class="mr-2 max-w-[140px] w-full bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded" >
                                    CARI
                                </button>
                                @if($request->search1 !== null || $request->search2 !== null)
                                <a href="{{ route('rekap.export') }}" class="ml-2 flex justify-center max-w-[140px] w-full bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded" >
                                    UNDUH
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="overvlow-y-auto">
                            @if($request->search1 !== null || $request->search2 !== null)
                            <table class="w-full border-collapse border border-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">No</th>
                                        <th class="text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">Tanggal</th>
                                        <th class="text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">Jumlah Data</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-50">
                                    <?php $count = 1; ?>
                                    @foreach($jurnal_guru as $data)
                                    <tr>
                                        <td class="px-2 text-sm font-normal text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">{{ $count }}</td>
                                        <td class="px-2 text-sm font-normal text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">{{ $data->tanggal }}</td>
                                        <td class="px-2 text-sm font-normal text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">{{ $data->jumlah }}</td>
                                    </tr>
                                    <?php $count++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="flex justify-center">
                                <p class="text-base font-normal text-gray-800 mx-4">Cari Data Terlebih Dahulu</p>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        // data from laravel
    const data = @json($siswa);
    
    // declare element variable
    let elKelasContainer = document.getElementById('angkatan');
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
            @if($request->kelas !== null)
            elKelas.innerHTML += `<option>{{ $request->kelas }}</option>`
            @endif

            classX.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        } else if(kelasValue == 'XI') {
            @if($request->kelas !== null)
            elKelas.innerHTML += `<option>{{ $request->kelas }}</option>`
            @endif

            classXI.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        } else if(kelasValue == 'XII') {
            @if($request->kelas !== null)
            elKelas.innerHTML += `<option>{{ $request->kelas }}</option>`
            @endif

            classXII.map((x) => {
                elKelas.innerHTML += `<option>${x}</option>`
            })
        } else {
            elKelas.innerHTML += `<option value="">Semua</option>`
        }
    }
    

    elKelasContainer.addEventListener('change', () => {
        changeKelas();
    })

    window.onload = () => {
        setKelas();

        @if($request->kelas)
        changeKelas();
        @endif
    }
    </script>
@endsection