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
                            <h4 class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl">Sertifikat Siswa</h4>
                            @foreach ($data_aktifitas_siswa_sertifikat as $aktifitas_siswa_sertifikat)
                                <div class="mb-2 pb-2 flex justify-between border-b-2 border-gray-200">
                                    <div class="flex">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-800 lg:text-base">
                                                {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->perusahaan_penguji }}
                                            </h4>
                                            <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->nama_penguji }}
                                            </p>
                                            <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                                {{ $aktifitas_siswa_sertifikat->siswa_sertifikat->sertifikat->tanggal }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/sertifikat/{{ $aktifitas_siswa_sertifikat->siswa_sertifikat->id }}/print">
                                            <button class="bg-indigo-600 px-2 py-2 text-base font-bold text-white rounded">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        fill="currentColor" class="bi bi-download text-white"
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
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
@endif
