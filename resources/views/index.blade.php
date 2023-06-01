@extends('layouts.app')

@section('main')
    <nav class="relative w-full z-40 py-4">
        <div class="flex justify-center">
            <div class="container max-w-6xl px-4">
                <div class="flex justify-between items-center">
                    <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                        SiMa-Ku
                    </a>
                    <a href={{ route('logout') }} class="flex items-center text-sm font-normal text-white md:text-base"
                        id="modal-open">
                        <span class="mr-2">Keluar</span>
                        <div class="h-5 w-5 md:h-6 md:w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8l-8 8Z" />
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
            <div class="container px-4 max-w-6xl">
                <div class="-mx-0 flex flex-wrap md:-mx-4">
                    <div class="mb-8 w-full px-0 md:w-6/12 md:mb-0 md:px-4">
                        <div>
                            <p class="mb-4 max-w-md text-base font-medium text-white md:text-base">Hi,
                                @if (auth()->user()->role === 'guru')
                                    {{ auth()->user()->guru->nama }}
                                @elseif(auth()->user()->role === 'karyawan')
                                    {{ auth()->user()->karyawan->nama }}
                                @elseif(auth()->user()->role === 'siswa')
                                    {{ auth()->user()->siswa->nama }}
                                @endif
                            </p>
                            <h2 class="mb-2 text-3xl font-bold text-white lg:text-5xl">Layanan</h2>
                            <h2 class="mb-4 text-3xl font-bold text-white lg:text-5xl">Simaku Jurnal</h2>
                            <p class="max-w-md text-sm font-normal text-white md:text-base">Menyediakan berbagai layanan
                                untuk kebutuhan kurikulum guna mempermudah aktifitas guru dan karyawan dalam kegiatan
                                belajar mengajar.</p>
                        </div>
                    </div>
                    <div class="mb-8 w-full px-0 md:w-6/12 md:mb-0 md:px-4">
                        @if (auth()->user()->role === 'guru')
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('jurnal') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-emerald-500 to-emerald-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 448 512" class="text-white">
                                                        <path fill="currentColor"
                                                            d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7c-4.2-15.4-4.2-59.3 0-74.7c5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32c0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Jurnal</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('izin') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-amber-500 to-amber-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 640 512" class="text-white">
                                                        <path fill="currentColor"
                                                            d="M624 448h-80V113.45C544 86.19 522.47 64 496 64H384v64h96v384h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM312.24 1.01l-192 49.74C105.99 54.44 96 67.7 96 82.92V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h336V33.18c0-21.58-19.56-37.41-39.76-32.17zM264 288c-13.25 0-24-14.33-24-32s10.75-32 24-32s24 14.33 24 32s-10.75 32-24 32z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Izin</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('refleksi') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-cyan-500 to-cyan-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 384 512" class="text-white">
                                                        <path fill="currentColor"
                                                            d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400L0 512z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Refleksi</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('rekap') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-fuchsia-500 to-fuchsia-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 24 24" class="text-white">
                                                        <g fill="none">
                                                            <path fill="currentColor"
                                                                d="M21 7c0 2.21-4.03 4-9 4S3 9.21 3 7s4.03-4 9-4s9 1.79 9 4z" />
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M21 7c0 2.21-4.03 4-9 4S3 9.21 3 7m18 0c0-2.21-4.03-4-9-4S3 4.79 3 7m18 0v5M3 7v5m18 0c0 2.21-4.03 4-9 4s-9-1.79-9-4m18 0v5c0 2.21-4.03 4-9 4s-9-1.79-9-4v-5" />
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Rekap</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif (auth()->user()->role === 'karyawan')
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('jurnal') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-emerald-500 to-emerald-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 448 512" class="text-white">
                                                        <path fill="currentColor"
                                                            d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7c-4.2-15.4-4.2-59.3 0-74.7c5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32c0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Jurnal</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif(auth()->user()->role === 'siswa')
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('refleksi') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-cyan-500 to-cyan-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        viewBox="0 0 384 512" class="text-white">
                                                        <path fill="currentColor"
                                                            d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400L0 512z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Refleksi</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="w-6/12 p-2">
                                    <a href="{{ route('sertifikat') }}" class="w-full">
                                        <div
                                            class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                                            <div
                                                class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-orange-500 to-orange-700 flex justify-center items-center rounded-full">
                                                <div class="h-6 w-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        fill="currentColor" class="text-white" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path
                                                            d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <p class="text-base font-bold text-gray-600 lg:text-xl">Sertifikat</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
