@extends('layouts.app')

@if (auth()->user()->role == 'siswa')
    @section('main')
        <nav class="w-full z-40 py-4">
            <div class="flex justify-center">
                <div class="container max-w-6xl px-4">
                    <div class="flex justify-between items-center">
                        <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                            SiMa-Ku
                        </a>
                        <a href={{ route('sertifikat.info') }}
                            class="flex items-center text-sm font-normal text-white md:text-base" id="modal-open">
                            <span class="mr-2">Informasi</span>
                            <div class="h-5 w-5 md:h-6 md:w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11 17h2v-6h-2v6Zm1-8q.425 0 .713-.288T13 8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8q0 .425.288.713T12 9Zm0 13q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                </svg>
                            </div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z"
                                        class="text-white" />
                                </svg>
                                <span class="ml-2">Kembali</span>
                            </a>
                        </div>
                        <div class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8">
                            <h4 class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl">Uji Sertifikasi</h4>
                            <div class="mb-4">
                                <h4 class="mb-2 text-lg font-semibold text-gray-800 lg:text-xl">Kompeten</h4>
                                @foreach ($data_aktifitas_siswa_sertifikat as $aktifitas_siswa_sertifikat)
                                    @if ($aktifitas_siswa_sertifikat->siswa_sertifikat->predikat == 'Kompeten')
                                        <div class="mb-2 pb-2 border-b-2 border-gray-200">
                                            <div class="flex justify-between">
                                                <div class="flex">
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-800 lg:text-base">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->perusahaan_penguji }}
                                                        </h4>
                                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->nama_penguji }}
                                                        </p>
                                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->tanggal }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a
                                                        href="{{ route('sertifikat.print', ['siswa_sertifikat_id' => $aktifitas_siswa_sertifikat->siswa_sertifikat->id]) }}">
                                                        <button
                                                            class="bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                                            <div class="h-6 w-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%"
                                                                    height="100%" fill="currentColor"
                                                                    class="bi bi-download text-white" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                    <path
                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <h4 class="mb-2 text-lg font-semibold text-gray-800 lg:text-xl">Belum Kompeten</h4>
                                @foreach ($data_aktifitas_siswa_sertifikat as $aktifitas_siswa_sertifikat)
                                    @if ($aktifitas_siswa_sertifikat->siswa_sertifikat->predikat == 'Belum Kompeten')
                                        <div class="mb-2 pb-2  border-b-2 border-gray-200">
                                            <div class="flex justify-between">
                                                <div class="flex">
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-800 lg:text-base">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->perusahaan_penguji }}
                                                        </h4>
                                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->nama_penguji }}
                                                        </p>
                                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                            {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->tanggal }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a
                                                        href="{{ route('sertifikat.print', ['siswa_sertifikat_id' => $aktifitas_siswa_sertifikat->siswa_sertifikat->id]) }}">
                                                        <button
                                                            class="bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                                            <div class="h-6 w-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%"
                                                                    height="100%" fill="currentColor"
                                                                    class="bi bi-download text-white" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                    <path
                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="mt-2 border-2 border-indigo-800 px-2 py-2 rounded-lg">
                                                <p class="text-sm font-medium text-gray-600 lg:text-base">
                                                    <span class="font-semibold text-gray-800">Catatan: </span>
                                                    {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->catatan ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
@elseif (auth()->user()->role == 'guru')
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z"
                                        class="text-white" />
                                </svg>
                                <span class="ml-2">Kembali</span>
                            </a>
                        </div>
                        <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8"
                            action="{{ route('sertifikat') }}" method="get">
                            <h4 class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl">Uji Sertifikasi</h4>

                            <div class="mb-8">
                                <div class="flex flex-wrap items-center -mx-2">
                                    <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                        <div class="flex flex-col">
                                            <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                                Tingkat
                                            </label>
                                            <select
                                                class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                                id="angkatan" name="angkatan">
                                                @if ($request->angkatan === 'X')
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
                                                Kelas / Jurusan
                                            </label>
                                            <select
                                                class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                                id="kelas" name="kelas">
                                                <option value="">Semua</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <button type="submit"
                                        class="mr-2 max-w-[140px] w-full bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                        CARI
                                    </button>
                                </div>
                            </div>
                            <div class="overflow-y-auto">
                                @if ($request->angkatan !== null || $request->kelas !== null)
                                    <table class="w-full border-collapse border border-white">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th
                                                    class="text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">
                                                    NIS</th>
                                                <th
                                                    class="text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">
                                                    Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-50">
                                            <?php $count = 1; ?>
                                            @foreach ($data_siswa as $key => $item)
                                                <tr>
                                                    <td
                                                        class="px-2 text-sm font-normal align-top text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">
                                                        {{ $item->nis }}</td>
                                                    <td class="px-2 border border-white whitespace-nowrap ">
                                                        <button type="button"
                                                            class="w-full flex justify-between items-center text-sm font-normal text-gray-600 lg:text-base"
                                                            onclick="showCertificate({{ $key + 1 }})">
                                                            <span>
                                                                {{ $item->nama }}
                                                            </span>
                                                            <span class="w-5 h-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%"
                                                                    height="100%" viewBox="0 0 24 24"
                                                                    class="text-gray-600">
                                                                    <g id="feArrowDown0" fill="none"
                                                                        fill-rule="evenodd" stroke="none"
                                                                        stroke-width="1">
                                                                        <g id="feArrowDown1" fill="currentColor">
                                                                            <path id="feArrowDown2"
                                                                                d="m6 7l6 6l6-6l2 2l-8 8l-8-8z" />
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                        <div id="certificate-{{ $key + 1 }}" class="hidden">
                                                            <div class="my-2">
                                                                <h4
                                                                    class="mb-0.5 text-sm font-semibold text-gray-800 lg:text-base">
                                                                    Kompeten</h4>
                                                                @foreach ($data_siswa_sertifikat->where('nis', $item->nis) as $siswa_sertifikat)
                                                                    @if ($siswa_sertifikat->predikat == 'Kompeten')
                                                                        <div class="mb-2 pb-2 border-b-2 border-gray-200">
                                                                            <div class="flex justify-between">
                                                                                <div class="flex">
                                                                                    <div>
                                                                                        <h4
                                                                                            class="text-sm font-medium text-gray-800 lg:text-base">
                                                                                            {{ $siswa_sertifikat->sertifikat->perusahaan_penguji }}
                                                                                        </h4>
                                                                                        <p
                                                                                            class="text-xs font-medium text-gray-600 lg:text-sm">
                                                                                            {{ $siswa_sertifikat->sertifikat->nama_penguji }}
                                                                                        </p>
                                                                                        <p
                                                                                            class="text-xs font-medium text-gray-600 lg:text-sm">
                                                                                            {{ $siswa_sertifikat->sertifikat->tanggal }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <a
                                                                                        href="{{ route('sertifikat.print', ['siswa_sertifikat_id' => $siswa_sertifikat->id]) }}">
                                                                                        <button type="button"
                                                                                            class="bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                                                                            <div class="h-6 w-6">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="100%"
                                                                                                    height="100%"
                                                                                                    fill="currentColor"
                                                                                                    class="bi bi-download text-white"
                                                                                                    viewBox="0 0 16 16">
                                                                                                    <path
                                                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                                    <path
                                                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="my-2">
                                                                <h4
                                                                    class="mb-0.5 text-sm font-semibold text-gray-800 lg:text-base">
                                                                    Belum Kompeten</h4>
                                                                @foreach ($data_siswa_sertifikat->where('nis', $item->nis) as $siswa_sertifikat)
                                                                    @if ($siswa_sertifikat->predikat == 'Belum Kompeten')
                                                                        <div class="mb-2 pb-2 border-b-2 border-gray-200">
                                                                            <div class="flex justify-between">
                                                                                <div class="flex">
                                                                                    <div>
                                                                                        <h4
                                                                                            class="text-sm font-medium text-gray-800 lg:text-base">
                                                                                            {{ $siswa_sertifikat->sertifikat->perusahaan_penguji }}
                                                                                        </h4>
                                                                                        <p
                                                                                            class="text-xs font-medium text-gray-600 lg:text-sm">
                                                                                            {{ $siswa_sertifikat->sertifikat->nama_penguji }}
                                                                                        </p>
                                                                                        <p
                                                                                            class="text-xs font-medium text-gray-600 lg:text-sm">
                                                                                            {{ $siswa_sertifikat->sertifikat->tanggal }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <a
                                                                                        href="{{ route('sertifikat.print', ['siswa_sertifikat_id' => $siswa_sertifikat->id]) }}">
                                                                                        <button type="button"
                                                                                            class="bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                                                                            <div class="h-6 w-6">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="100%"
                                                                                                    height="100%"
                                                                                                    fill="currentColor"
                                                                                                    class="bi bi-download text-white"
                                                                                                    viewBox="0 0 16 16">
                                                                                                    <path
                                                                                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                                                                    <path
                                                                                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="mt-2 border-2 border-indigo-800 px-2 py-2 rounded-lg">
                                                                                <p
                                                                                    class="text-sm font-medium text-gray-600 lg:text-base">
                                                                                    <span
                                                                                        class="font-semibold text-gray-800">Catatan:
                                                                                    </span>
                                                                                    {{ $siswa_sertifikat->catatan ?? '-' }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $count++; ?>
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

                    if (kelas[0] == 'X') {
                        classX.push(x.kelas);
                    } else if (kelas[0] == 'XI') {
                        classXI.push(x.kelas);
                    } else if (kelas[0] == 'XII') {
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

                if (kelasValue == 'X') {
                    @if ($request->kelas !== null)
                        elKelas.innerHTML += `<option>{{ $request->kelas }}</option>`
                    @endif

                    classX.map((x) => {
                        elKelas.innerHTML += `<option>${x}</option>`
                    })
                } else if (kelasValue == 'XI') {
                    @if ($request->kelas !== null)
                        elKelas.innerHTML += `<option>{{ $request->kelas }}</option>`
                    @endif

                    classXI.map((x) => {
                        elKelas.innerHTML += `<option>${x}</option>`
                    })
                } else if (kelasValue == 'XII') {
                    @if ($request->kelas !== null)
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

                @if ($request->kelas)
                    changeKelas();
                @endif
            }

            const showCertificate = (index) => {
                const elCertificate = document.getElementById(`certificate-${index}`);

                if (elCertificate.style.display == 'block') {
                    elCertificate.style.display = 'none';
                } else {
                    elCertificate.style.display = 'block';
                }
            }
        </script>
    @endsection

@endif
