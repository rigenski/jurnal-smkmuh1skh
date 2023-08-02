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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z"
                                    class="text-white" />
                            </svg>
                            <span class="ml-2">Kembali</span>
                        </a>
                    </div>
                    <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8"
                        action="{{ route('kehadiran') }}" method="get">
                        <h4 class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl">Kehadiran</h4>
                        <div class="mb-8">
                            <div class="flex flex-wrap items-center -mx-2">
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                            Tanggal Awal
                                        </label>
                                        <input type="date"
                                            class="w-full border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                            name="search1" autocomplete="off" value="{{ $request->search1 }}" />
                                    </div>
                                </div>
                                <div class="w-full mb-4 w-full md:w-6/12 px-2">
                                    <div class="flex flex-col">
                                        <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                            Tanggal Akhir
                                        </label>
                                        <input type="date"
                                            class="w-full border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                            name="search2" autocomplete="off" value="{{ $request->search2 }}" />
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
                        <div class="mb-4 overflow-x-auto">
                            @if ($request->search1 !== null || $request->search2 !== null)
                                <table class="w-full border-collapse border border-white">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th
                                                class="px-4 text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">
                                                No</th>
                                            <th
                                                class="px-4 text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">
                                                Tanggal</th>
                                            <th
                                                class="px-4 text-sm font-medium text-gray-600 border border-white whitespace-nowrap lg:text-base">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-50">
                                        <?php $count = 1; ?>
                                        @foreach ($data_jurnal_guru_group as $tanggal => $data_jurnal_guru)
                                            <tr>
                                                <td
                                                    class="px-2 text-sm font-normal text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">
                                                    {{ $count }}</td>
                                                <td
                                                    class="px-2 text-sm font-normal text-gray-600 border border-white text-center whitespace-nowrap lg:text-base">
                                                    {{ $tanggal }}</td>

                                                <?php $status = 4; ?>

                                                @foreach ($data_jurnal_guru as $jurnal_guru)
                                                    @foreach ($jurnal_guru->siswa_pilihan as $siswa_pilihan)
                                                        @if ($siswa_pilihan->nama_siswa == auth()->user()->siswa->nama && $status == 4)
                                                            @if ($siswa_pilihan->status == 'Izin' || $siswa_pilihan->status == 'Sakit')
                                                                <?php $status = 2; ?>
                                                            @elseif($siswa_pilihan->status == 'Bolos' || $siswa_pilihan->status == 'Alfa')
                                                                <?php $status = 3; ?>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach

                                                @if (count($data_jurnal_guru) && $status == 4)
                                                    <?php $status = 1; ?>
                                                @endif


                                                @if ($status == 1)
                                                    <td
                                                        class="px-2 text-sm font-normal bg-green-400 border border-white text-center whitespace-nowrap lg:text-base">
                                                    </td>
                                                @elseif($status == 2)
                                                    <td
                                                        class="px-2 text-sm font-normal bg-yellow-400 border border-white text-center whitespace-nowrap lg:text-base">
                                                    </td>
                                                @elseif($status == 3)
                                                    <td
                                                        class="px-2 text-sm font-normal bg-red-400 border border-white text-center whitespace-nowrap lg:text-base">
                                                    </td>
                                                @elseif($status == 4)
                                                    <td
                                                        class="px-2 text-sm font-normal border border-white text-center whitespace-nowrap lg:text-base">
                                                    </td>
                                                @endif
                                            </tr>
                                            <?php $status = 4; ?>
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
                        <div>
                            <div class="mb-2 flex items-center">
                                <div class="mr-2 h-4 w-8 bg-green-400"></div>
                                <p class="text-sm font-normal text-gray-800">Hadir</p>
                            </div>
                            <div class="mb-2 flex items-center">
                                <div class="mr-2 h-4 w-8 bg-yellow-400"></div>
                                <p class="text-sm font-normal text-gray-800">Izin / Sakit</p>
                            </div>
                            <div class="mb-2 flex items-center">
                                <div class="mr-2 h-4 w-8 bg-red-400"></div>
                                <p class="text-sm font-normal text-gray-800">Alpa / Bolos</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script></script>
@endsection
