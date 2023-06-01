@extends('layouts.app')

{{-- GURU --}}

@if (auth()->user()->role == 'guru')

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
            @if (session('success'))
                <div class="w-full h-[480px] bg-gradient-to-br from-emerald-500 to-emerald-700"></div>
            @else
                <div class="w-full h-[480px] bg-gradient-to-br from-rose-500 to-rose-700"></div>
            @endif
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
                            @if (session('success'))
                                <div class="py-24 flex flex-col justify-center items-center">
                                    <div class="mb-4">
                                        <lottie-player
                                            src="https://lottie.host/85bc158d-6c8c-491a-89d3-d5e767183c04/qb5d3sewMv.json"
                                            background="transparent" speed="1" style="width: 300px; height: 300px;"
                                            loop autoplay></lottie-player>
                                    </div>
                                    <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">
                                        Terimakasih !!!</h4>
                                    <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Selamat, formulir
                                        yang anda kirim telah berhasil dikirim</p>
                                </div>
                            @else
                                <div class="py-24 flex flex-col justify-center items-center">
                                    <div class="mb-4">
                                        <lottie-player
                                            src="https://lottie.host/ef2bec90-d792-4493-b64c-3ed91052c3f5/LMu94CrL61.json"
                                            background="transparent" speed="1" style="width: 300px; height: 300px;"
                                            loop autoplay></lottie-player>
                                    </div>
                                    <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Maaf !!!
                                    </h4>
                                    <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Mohon untuk
                                        mengisi formulir yang disediakan terlebih dahulu</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
        </main>
    @endsection

    @section('script')
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @endsection
@elseif (auth()->user()->role == 'siswa')
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
            @if (session('success'))
                <div class="w-full h-[480px] bg-gradient-to-br from-emerald-500 to-emerald-700"></div>
            @else
                <div class="w-full h-[480px] bg-gradient-to-br from-rose-500 to-rose-700"></div>
            @endif
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
                            @if (session('success'))
                                <div class="py-16 flex flex-col justify-center items-center">
                                    <div class="mb-4">
                                        <lottie-player
                                            src="https://lottie.host/85bc158d-6c8c-491a-89d3-d5e767183c04/qb5d3sewMv.json"
                                            background="transparent" speed="1" style="width: 300px; height: 300px;"
                                            loop autoplay></lottie-player>
                                    </div>
                                    <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">
                                        Terimakasih !!!</h4>
                                    @if ($is_complete)
                                        <p class="mb-4 text-sm font-normal text-gray-600 text-center lg:text-base">Silahkan tunjukan halaman ini kepada pengawas saat akan keluar ujian</p>
                                        @if (session('refleksi_siswa'))
                                            <div class="flex justify-center">
                                                <div class="rounded bg-emerald-50 p-4 border-2 border-emerald-500">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <th align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-gray-800">
                                                                        Nama
                                                                    </span>
                                                                </th>
                                                                <td align="left" class="pl-1 pr-2 align-top">:</td>
                                                                <td align="left" class="align-top">
                                                                    <span class="text-base font-normal text-gray-800">
                                                                        {{ session('refleksi_siswa')->nama }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-gray-800">
                                                                        Kelas
                                                                    </span>
                                                                </th>
                                                                <td align="left" class="pl-1 pr-2 align-top">:</td>
                                                                <td align="left" class="align-top">
                                                                    <span class="text-base font-normal text-gray-800">
                                                                        {{ session('refleksi_siswa')->kelas }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-gray-800">
                                                                        Guru
                                                                    </span>
                                                                </th>
                                                                <td align="left" class="pl-1 pr-2 align-top">:</td>
                                                                <td align="left" class="align-top">
                                                                    <span class="text-base font-normal text-gray-800">
                                                                        {{ session('refleksi_siswa')->guru }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-gray-800">
                                                                        Mata Pelajaran
                                                                    </span>
                                                                </th>
                                                                <td align="left" class="pl-1 pr-2 align-top">:</td>
                                                                <td align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-emerald-800">
                                                                        {{ session('refleksi_siswa')->mata_pelajaran }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-gray-800">
                                                                        Tanggal
                                                                    </span>
                                                                </th>
                                                                <td align="left" class="pl-1 pr-2 align-top">:</td>
                                                                <td align="left" class="align-top">
                                                                    <span class="text-base font-semibold text-emerald-800">
                                                                        {{ session('tanggal') }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <p class="mb-4 text-sm font-normal text-gray-600 text-center lg:text-base">Mohon
                                            isi
                                            lagi
                                            formulir dengan mata pelajaran @if ($mata_pelajaran)
                                                <span class="font-semibold">"{{ $mata_pelajaran->nama }}"</span>
                                            @else
                                                yang sama
                                            @endif
                                            tetapi dengan guru yang berbeda, karena ada 2 guru atau lebih yang mengajar
                                            dikelasmu dengan mata pelajaran yang sama
                                        </p>
                                        <div class="mt-8">
                                            <a href={{ route('refleksi') }}
                                                class="min-w-[140px] bg-indigo-600 px-8 py-2 text-base font-bold text-white rounded">
                                                ISI REFLEKSI
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="py-16 flex flex-col justify-center items-center">
                                    <div class="mb-4">
                                        <lottie-player
                                            src="https://lottie.host/ef2bec90-d792-4493-b64c-3ed91052c3f5/LMu94CrL61.json"
                                            background="transparent" speed="1" style="width: 300px; height: 300px;"
                                            loop autoplay></lottie-player>
                                    </div>
                                    <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Maaf !!!
                                    </h4>
                                    <p class="mb-4 text-sm font-normal text-gray-600 text-center lg:text-base">Mohon untuk
                                        mengisi formulir yang disediakan terlebih dahulu</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
        </main>
    @endsection

    @section('script')
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @endsection
@endif
