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
                        <form class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8"
                            action="{{ route('sertifikat.info') }}" method="get">
                            <h4 class="mb-4 text-2xl font-semibold text-gray-800 lg:text-3xl">Informasi Sertifikasi</h4>

                            <div class="mb-8">
                                <div class="flex flex-wrap items-center -mx-2">
                                    <div class="w-full mb-4 w-full md:w-full px-2">
                                        <div class="flex flex-col">
                                            <label class="mb-2 text-sm font-light text-gray-600" for="deskripsi">
                                                Tingkat
                                            </label>
                                            <select
                                                class="border px-4 py-1.5 text-base font-normal text-gray-800 rounded-md"
                                                id="angkatan" name="angkatan">
                                                @if ($request->angkatan === 'X')
                                                    <option selected>X</option>
                                                    <option>XI</option>
                                                    <option>XII</option>
                                                @elseif($request->angkatan === 'XI')
                                                    <option selected>XI</option>
                                                    <option>X</option>
                                                    <option>XII</option>
                                                @elseif($request->angkatan === 'XII')
                                                    <option selected>XII</option>
                                                    <option>X</option>
                                                    <option>XI</option>
                                                @else
                                                    <option>X</option>
                                                    <option>XI</option>
                                                    <option>XII</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="class-x">
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X TO
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Alat Ukur</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Persiapan alat dan perlengkapan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pengukuran dengan jangka sorong (vernier calliper)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pengukuran dengan micrometer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pengukuran dengan dial indicator
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pengukuran dengan feeler gauge (thickness gauge)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pengukuran dengan avo meter
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pengukuran
                                            (Measurement)</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Persiapan alat dan perlengkapan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memeriksa dan membersihkan cylinder bore
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengukur diameter cylinder dengan vernier caliper
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pemilihan range micrometer yang tepat
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi micrometer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menyetel micrometer ke dimensi pengukuran vernier caliper
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Perakitan cylinder bore gauge
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan kalibrasi cylinder bore gauge ke micrometer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pembacaan ke cylinder block
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Gambar perspektif keausan cylinder bore
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan pengukuran kerataan permukaan block cylinder
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merapikan kembali alat dan bahan
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X TE
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pemrograman Dasar
                                            Mikrokontroler</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengidentifikasi potensi bahaya dan risiko kecelakaan kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengendalikan bahaya dan risiko kecelakaan kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memanfaatkan tipe data
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Membuat fungsi dan prosedur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Membuat program sederhana
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mempersiapkan RAM Programming
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan RAM Programming
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Hardware Design dan
                                            Assembly</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengidentifikasi potensi bahaya dan risiko kecelakaan kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengendalikan bahaya dan risiko kecelakaan kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Meningkatkan kepedulian terhadap pelaksanaan K3
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menyiapkan peralatan tangan untuk kerja kelistrikan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan peralatan tangan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menyiapkan gambar teknik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Membaca gambar teknik
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X TM
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Menggunakan Alat Ukur
                                            dan Gambar Teknik</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melaksanakan Kegiatan K3 Di Tempat Kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menerapkan Prinsip-Prinsip K3 Kerja Di Lingkungan Kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengukur dengan menggunakan alat ukur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengukur dengan alat ukur mekanik presisi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan Peralatan Pembandingan Dan/Atau Alat Ukur Dasar
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi Alat Ukur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Membaca Gambar Teknik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mempersiapkan gambar teknik (dasar)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merancang Gambar Tehnik Secara Rinci (Dasar)
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Holder Insert</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melaksanakan Kegiatan K3 Di Tempat Kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menerapkan Prinsip-Prinsip K3 Kerja Di Lingkungan Kerja
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengukur dengan menggunakan alat ukur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengukur dengan alat ukur mekanik presisi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan Peralatan Pembandingan Dan/Atau Alat Ukur Dasar
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi Alat Ukur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Membaca Gambar Teknik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mempersiapkan gambar teknik (dasar)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merancang Gambar Tehnik Secara Rinci (Dasar)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan perkakas tangan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan perkakas bertenaga/operasi digenggam
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan perkakas untuk pekerjaan presisi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Bekerja dengan mesin umum
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan Mesin untuk Operasi Dasar
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengeset mesin (untuk pekerjaan sehari-hari)
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan pekerjaan dengan mesin frais
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan proses pemanasan/quenching, tempering, dan annealing dasar
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Pekerjaan perlakuan awal sebelum pelapisan permukaan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Bekerja secara aman dengan bahan kimia dan material industri
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X TJKT
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">IT Essentials</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Introduction to Personal Computer Hardware
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - PC Assembly
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Advanced Computer Hardware
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Preventive Maintenance and Troubleshooting
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Networking Concepts
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Applied Networking
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Laptops and Other Mobile Devices
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">IT Essentials
                                            (Lanjutan)</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Advanced Laptops and Portable Devices
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Printers and Scanners
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Networks
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Security
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - The IT Professional
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Advanced Troubleshooting
                                        </p>

                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X PPLG
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Jaringan Dan Komputer
                                            Dasar</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengumpulkan Data Peralatan Jaringan Dengan Teknologi yang Sesuai
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menyiapkan Kabel Jaringan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memasang Kabel Jaringan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menentukan Spesifikasi Perangkat Jaringan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memasang Jaringan Nirkabel
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengidentifikasi Perangkat Penyusun Komputer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengidentifikasi Spesifikasi Perangkat Komputer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merumuskan Kebutuhan Pengguna
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merancang Spesifikasi Sesuai dengan Fungsi dan Kebutuhan Pengguna
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merencanakan Perawatan Komputer dan Perangkat Penunjang
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Instalasi Hardware Komputer
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Setting BIOS
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Instalasi Sistem Operasi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Instalasi Software Aplikasi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Recovery Data
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Merawat Sistem Operasi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Restore Sistem Operasi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Backup Data dan Sistem
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pemrograman Dasar</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan Struktur Data
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengimplementasikan User Interface
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Instalasi Software Tools Pemrograman
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Pengaturan Software Tools Pemrograman
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengimplementasikan Pemrograman Terstruktur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengimplementaslkan Algoritma Pemrograman
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Melakukan Debugging
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        X TO (TSM)
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Alat Ukur</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menyiapkan alat ukur sesuai dengan fungsi dan kegunaannya
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi alat ukur mekanik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi alat ukur Pneumatik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi alat ukur Hidrolik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mengkalibrasi alat ukur elektrik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan alat ukur mekanik sesuai jenis fungsi dan manual perbaikan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan alat ukur pneumatic sesuai jenis fungsi dan manual perbaikan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan alat ukur hidrolik sesuai jenis fungsi dan manual perbaikan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Menggunakan alat ukur elektrik sesuai jenis fungsi dan manual perbaikan
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Overhaul Chassis dan
                                            Listrik</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada sistem kemudi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada sistem rem
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada sistem suspensi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada roda dan ban
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada sistem pengapian, starter, dan pengisian
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Mendiagnosis gangguan pada sistem penerangan, sinyal, dan instrumen
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada sistem kemudi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada sistem rem
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada sistem suspensi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada roda dan ban
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada sistem pengapian, starter, dan pengisian
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">
                                            - Memperbaiki kerusakan pada sistem penerangan, sinyal, dan instrumen
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="class-xi" class="hidden">
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI TKR
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Service Berkala 10.000
                                        </h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca perintah kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Kelengkapan K-3
                                            (APD), Tools, SST, Equipment</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Kebersihan alat, bahan dan
                                            area Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang pelindung
                                            kendaraan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Oli Mesin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan cairan
                                            pendingin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Busi (celah
                                            busi)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Baterai</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kelistrikan
                                            bodi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan ketinggian dan
                                            jarak bebas pedal Kopling</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan minyak rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan ketinggian dan
                                            jarak bebas pedal rem, pemeriksaan rem parkir</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kekencangan
                                            baut roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kondisi ban &
                                            tekanan ban</p>

                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Perawatan Berkala
                                            20.000 KM</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca perintah kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Persiapan alat dan
                                            perlengkapan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Oli Mesin /
                                            Penggantian Oli Mesin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan saringan udara
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan sistem
                                            pendingin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan saluran gas
                                            buang dan dudukan pipa gas buang</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan busi (celah
                                            busi)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Baterai</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Sistem kopling</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan pedal rem dan
                                            rem parker</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan teromol rem dan
                                            pelapis sepatu rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan pad dan
                                            piringan rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan minyak rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan sistem rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan roda kemudi dan
                                            lengan penghubung kemudi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kondisi ball
                                            joint dan karet penutup debu</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan sepatu drive
                                            shaft</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kondisi
                                            suspensi depan dan belakang</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kondisi ban dan
                                            tekanan ban</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan system
                                            penerangan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan saringan udara
                                            AC</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI TSM
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Overhoul Engine</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            sistem bahan bakar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            sistem kopling</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            sistem penggerak roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            head cylinder</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            block silinder</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            sistem bahan bakar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            sistem kopling</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            sistem penggerak roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            head cylinder</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            block silinder</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Troubleshooting</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            sistem transmisi manual</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mendiagnosis gangguan pada
                                            sistem transmisi otomatis</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            sistem transmisi manual</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki kerusakan pada
                                            sistem transmisi otomatis</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI TEI
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pemrograman PLC 1</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengidentifikasi potensi
                                            bahaya dan resiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengevaluasi bahaya dan
                                            resiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengendalikan bahaya dan
                                            resiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Meningkatkan kepedulian
                                            terhadap pelaksanaan K3</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menyiapkan peralatan ukur
                                            dan uji kerja kelistrikan/ elektronika</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memanfaatkan tipe data</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat fungsi dan prosedur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan peralatan
                                            tangan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeliharaan/servis pada
                                            peralatan dan perlengkapan tempat kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengertian Relay logig</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengertian dan membuat
                                            leader PLC</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Wiring dan commissioning
                                            rangkaian kendali PLC</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemrograman rangkaian
                                            kendali PLC</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan PLC Zelio
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengecek/memeriksa kondisi
                                            Zelio soft 2</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memeriksa kondisi trainer
                                            PLC Zelio</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguji dan mengoperasikan
                                            PLC Zelio</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengembalikan area kerja ke
                                            kondisi semula</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Hardware dan Software
                                            Design, Assembly</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengidentifikasi potensi
                                            bahaya dan risiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengevaluasi bahaya dan
                                            risiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengendalikan bahaya dan
                                            risiko kecelakaan kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Meningkatkan kepedulian
                                            terhadap pelaksanaan K3</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memanfaatkan tipe data</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat fungsi dan prosedur
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mempersiapkan RAM
                                            Programming</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan RAM Programming
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menyiapkan peralatan tangan
                                            untuk kerja kelistrikan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan peralatan
                                            tangan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menyiapkan gambar teknik
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca gambar teknik</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI TP
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Bushing 3 Crank</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan Kegiatan K3 Di
                                            Tempat Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Prinsip-Prinsip
                                            K3 Kerja Di Lingkungan Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar dan membaca
                                            sketsa</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca gambar teknik</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mempersiapkan gambar teknik
                                            (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Merancang Gambar Tehnik
                                            Secara Rinci (Dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar 2D Dengan Sistem
                                            CAD</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan menggunakan
                                            alat ukur</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan alat ukur
                                            mekanik presisi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Sistem Mutu</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Peralatan
                                            Pembandingan Dan/Atau Alat Ukur Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas tangan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas
                                            bertenaga/operasi digenggam</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas untuk
                                            pekerjaan presisi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Bekerja dengan mesin umum
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Mesin untuk
                                            Operasi Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset mesin (untuk
                                            pekerjaan sehari-hari)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin bubut</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin frais</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin grinda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan dan
                                            mengamati mesin/proses</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggerinda pahat dan alat
                                            potong mesin/proses</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Komputer</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasukkan Dan Mengganti
                                            Parameter Operasional Pengontrol Yang Dapat Diprogram</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Persiapan Program
                                            Pengendali Yang Dapat Diprogram</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset Mesin dan program
                                            mesin NC/CNC (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset dan mengedit
                                            program mesin/process NC/CNC</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram mesin NC/CNC
                                            (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram Mesin NC/CNC
                                            Machining Centre</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Mesin NC/CNC
                                            (Dasar)</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Face Mill</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan Kegiatan K3 Di
                                            Tempat Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Prinsip-Prinsip
                                            K3 Kerja Di Lingkungan Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar dan membaca
                                            sketsa</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca gambar teknik</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mempersiapkan gambar teknik
                                            (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Merancang Gambar Tehnik
                                            Secara Rinci (Dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar 2D Dengan Sistem
                                            CAD</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan menggunakan
                                            alat ukur</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan alat ukur
                                            mekanik presisi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Sistem Mutu</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Peralatan
                                            Pembandingan Dan/Atau Alat Ukur Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas tangan
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas
                                            bertenaga/operasi digenggam</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas untuk
                                            pekerjaan presisi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Bekerja dengan mesin umum
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Mesin untuk
                                            Operasi Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset mesin (untuk
                                            pekerjaan sehari-hari)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin bubut</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin frais</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin grinda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan dan
                                            mengamati mesin/proses</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggerinda pahat dan alat
                                            potong mesin/proses</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Komputer</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasukkan Dan Mengganti
                                            Parameter Operasional Pengontrol Yang Dapat Diprogram</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Persiapan Program
                                            Pengendali Yang Dapat Diprogram</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset Mesin dan program
                                            mesin NC/CNC (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset dan mengedit
                                            program mesin/process NC/CNC</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram mesin NC/CNC
                                            (dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram Mesin NC/CNC
                                            Machining Centre</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Mesin NC/CNC
                                            (Dasar)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan proses
                                            pemanasan/quenching, tempering dan annealing dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pekerjaan perlakuan awal
                                            sebelum pelapisan permukaan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Bekerja secara aman dengan
                                            bahan kimia dan material industri</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI TKJ
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>

                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XI RPL
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Front End - Database
                                        </h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat Algoritma
                                            Pemrograman Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Spesifikasi
                                            Program</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menulis program Dasar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengembangkan User
                                            interface</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan debuging Program
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat Program dengan
                                            HTML, CSS sesuai spesifikasi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan dasar – dasar
                                            Pembuatan web statik & dinamis Dasar</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Back End - Database
                                        </h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Struktur Data
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengimplementasikan User
                                            Interface</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menulis program menggunakan
                                            framework</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengembangkan Database</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan debugging Program
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat Program dengan
                                            Framework sesuai spesifikasi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan dasar – dasar
                                            Pembuatan web statik & dinamis Dasar</p>
                                    </div>
                                </div>
                            </div>
                            <div id="class-xii" class="hidden">
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII TKR
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Perawatan Berkala
                                            40.000 KM</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca perintah kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Persiapan alat dan
                                            perlengkapan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Fungsi dan
                                            Kinerja Rem Parkir</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan tinggi pedal
                                            rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan tinggi pedal
                                            kopling (manual)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan & Penggantian
                                            Minyak rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan & Penggantian
                                            Oli mesin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kuantitas air
                                            baterai</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kuantitas air
                                            radiator (reservoir tank)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan kuantitas air
                                            washer</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengurasan dan pengisian
                                            oli mesin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemasangan drain plug</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Penggantian oil filter
                                            berdasarkan tipe mesin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Penggantian Fluida
                                            Transaxle Manual</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Penggantian oli diferensial
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan karet lengan
                                            kemudi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan ketebalan pad
                                            rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Keolengan (run
                                            out) disc</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan celah brake
                                            shoe</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan ketebalan
                                            kanvas rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Diameter dalam
                                            tromol</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan saluran rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguras, mengisi, dan
                                            bleeding rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Rotasi dan pemasangan roda
                                            (sesuai tipe kendaraan)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan Tekanan Ban</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Torsi Mur Roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengisian oli mesin sesuai
                                            spesifikasi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Penggantian Busi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Periksa tegangan baterai
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Periksa Berat Jenis
                                            electrolit</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memeriksa kekencangan semua
                                            drain plug</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeriksaan emisi gas buang
                                            (idle)</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pemeliharaan Sistem
                                            Injeksi, Servis Chasis, Sistem Elektrical dan Sistem AC pada Kendaraan</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan
                                            Pemeliharaan/Servis Komponen</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca dan memahami gambar
                                            Teknik</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan Memelihara
                                            alat Ukur</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengikuti prosedur
                                            Keselamatan dan Kesehatan Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan Memelihara
                                            Peralatan, Perlengkapan Tempat Keria</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Kontribusi Komunikasi di
                                            Tempat Kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan Operasi
                                            Penanganan Secara Manual</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeliharaan/Servis Sistem
                                            Kontrol Emisi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Perakitan dan pemasangan
                                            sistem rem dan komponen-komponennya</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeliharan/Servis Sistem
                                            Rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Perbaikan Sistem Rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Overhaul Sistem Rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara/Servis Sistem
                                            Kemudi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara/Servis Sistem
                                            Suspensi</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melepas, Memasang dan
                                            Menyetel Roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Perbaikan Ringan pada
                                            Rangkaian/Sistem Kelistrikan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang, Menguji dan
                                            Memperbaiki Sistem Penerangan dan Wiring</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang, Menguji dan
                                            Memperbaiki Sistem Pengaman Kelistrikan dan Komponennya</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang Perlengkapan
                                            Kelistrikan Tambahan (Asesories)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki Sistem
                                            Pengapian</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara/Servis dan
                                            Memperbaiki Engine Management System</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang Sistem A/C (Air
                                            Conditioner)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Overhaul Komponen Sistem
                                            A/C (Air Conditioner)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki/Retrofit Sistem
                                            A/C (Air Conditioner)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara/Servis Sistem
                                            A/C (Air Conditioner)</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII TSM
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Perawatan Berkala
                                            Konvensional</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengikuti prosedur
                                            keselamatan, kesehatan kerja, dan lingkungan</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca dan memahami gambar
                                            teknik</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan memelihara
                                            peralatan dan perlengkapan di tempat kerja</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan memelihara
                                            alat ukur</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara engine berikut
                                            komponen-komponennya</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem pendingin
                                            berikut komponen-komponennya</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem bahan
                                            bakar</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki dan melakukan
                                            overhaul komponen sistem bahan bakar bensin</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara unit kopling
                                            manual dan otomatik berikut komponen-komponen sistem pengoperasiannya</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki sistem
                                            pengapian</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem rem</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem kemudi
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melepas, memasang, dan
                                            menyetel roda</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara rantai/chain</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguji, memelihara dan
                                            mengganti baterai</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang, menguji dan
                                            memperbaiki sistem penerangan dan wiring</p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Perawatan Berkala
                                            Injeksi:</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengikuti Prosedur
                                            Keselamatan, Kesehatan Kerja, dan Lingkungan.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca dan memahami gambar
                                            teknik (Wiring Diagram).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan memelihara
                                            peralatan dan perlengkapan di tempat kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan dan memelihara
                                            alat ukur.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara engine beserta
                                            komponen-komponennya.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem pendingin
                                            beserta komponen-komponennya.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem bahan
                                            bakar.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki dan melakukan
                                            overhaul komponen sistem bahan bakar bensin.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara unit kopling
                                            manual dan otomatis beserta komponen-komponen sistem pengoperasiannya.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memperbaiki sistem
                                            pengapian.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara sistem rem.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memeriksa sistem kemudi.
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melepas, memasang, dan
                                            menyetel roda.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara rantai/chain.
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguji, memelihara, dan
                                            mengganti baterai.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasang, menguji, dan
                                            memperbaiki sistem penerangan dan wiring.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memelihara dan memperbaiki
                                            sistem manajemen engine.</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII TEI
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">PLC dan Pneumatik
                                            (program dan Wiring):</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengidentifikasi potensi
                                            bahaya dan risiko kecelakaan kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengevaluasi bahaya dan
                                            risiko kecelakaan kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengendalikan bahaya dan
                                            risiko kecelakaan kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Meningkatkan kepedulian
                                            terhadap pelaksanaan K3.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menyiapkan peralatan ukur
                                            dan uji kerja kelistrikan/elektronika.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memanfaatkan tipe data.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat fungsi dan
                                            prosedur.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan peralatan
                                            tangan.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemeliharaan/servis pada
                                            peralatan dan perlengkapan tempat kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengertian Relay logic.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pengertian dan membuat
                                            ladder PLC.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Wiring dan commissioning
                                            rangkaian kendali PLC.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Pemrograman rangkaian
                                            kendali PLC.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan PLC Zelio.
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengecek/memeriksa kondisi
                                            Zelio Soft 2.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memeriksa kondisi trainer
                                            PLC Zelio.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguji dan mengoperasikan
                                            PLC Zelio.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengembalikan area kerja ke
                                            kondisi semula.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan peralatan
                                            pneumatik.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengecek kondisi rangkaian
                                            peralatan dan komponen pneumatik/elektropneumatik.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan set-up tekanan
                                            udara.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menguji dan mengoperasikan
                                            peralatan dan komponen pneumatik.</p>

                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Uji Mandiri dan Uji
                                            Sertifikasi Industri</h4>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII TP
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Melaksanakan Kegiatan
                                            K3 Di Tempat Kerja:</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Prinsip-Prinsip
                                            K3 Kerja Di Lingkungan Kerja.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar dan membaca
                                            sketsa.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membaca gambar teknik.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mempersiapkan gambar teknik
                                            (dasar).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Merancang Gambar Teknik
                                            Secara Rinci (Dasar).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggambar 2D Dengan Sistem
                                            CAD.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan menggunakan
                                            alat ukur.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengukur dengan alat ukur
                                            mekanik presisi.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Sistem Mutu.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Peralatan
                                            Pembandingan Dan/Atau Alat Ukur Dasar.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas
                                            tangan.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas
                                            bertenaga/operasi digenggam.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan perkakas untuk
                                            pekerjaan presisi.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Bekerja dengan mesin umum.
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan Mesin untuk
                                            Operasi Dasar.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset mesin (untuk
                                            pekerjaan sehari-hari).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin bubut.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin frais.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan pekerjaan dengan
                                            mesin grinda.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan dan
                                            mengamati mesin/proses.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggerinda pahat dan alat
                                            potong mesin/proses.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memfrais (kompleks).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Komputer.
                                        </p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memodifikasi sistem
                                            control.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memasukkan dan Mengganti
                                            Parameter Operasional Pengontrol Yang Dapat Diprogram.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Persiapan Program
                                            Pengendali Yang Dapat Diprogram.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset Mesin dan program
                                            mesin NC/CNC (dasar).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengeset dan mengedit
                                            program mesin/process NC/CNC.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram mesin NC/CNC
                                            (dasar).</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Memprogram Mesin NC/CNC
                                            Machining Centre.</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengoperasikan Mesin NC/CNC
                                            (Dasar).</p>

                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII TKJ
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">UKK Mandiri</h4>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 text-center lg:text-xl">
                                        XII RPL
                                    </h4>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 1
                                        </h4>
                                        <h4 class="text-sm font-semibold text-gray-800 lg:text-base">Pemrograman
                                            Berorientasi Obyek</h4>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengimplementasikan User
                                            Interface</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Perintah
                                            Eksekusi Bahasa, Pemrograman Berbasis Teks, Grafik, dan Multimedia</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan Pengaturan
                                            Software Tools Pemrograman</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Mengimplementasikan
                                            Pemrograman Berorientasi Objek</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menggunakan SQL</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Membuat Dokumen Kode
                                            Program</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Menerapkan Pemrograman
                                            Multimedia</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan Pengujian Unit
                                            Program</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melaksanakan Konfigurasi
                                            Perangkat Lunak Sesuai Environment Development, Staging, Production)</p>
                                        <p class="text-xs font-medium text-gray-600 lg:text-sm">Melakukan Logging Aplikasi
                                        </p>
                                    </div>
                                    <div class="mb-2">
                                        <h4 class="text-sm font-normal text-gray-800 lg:text-base text-center">Semester 2
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection

    @section('script')
        <script>
            // declare element variable
            let elKelasContainer = document.getElementById('angkatan');
            let elKelasXContainer = document.getElementById('class-x');
            let elKelasXIContainer = document.getElementById('class-xi');
            let elKelasXIIContainer = document.getElementById('class-xii');

            // if kelas on change
            const changeKelas = (value) => {
                const kelasValue = elKelasContainer.value;

                if (kelasValue == 'X') {
                    elKelasXContainer.style.display = 'block';
                    elKelasXIContainer.style.display = 'none';
                    elKelasXIIContainer.style.display = 'none';
                } else if (kelasValue == 'XI') {
                    elKelasXContainer.style.display = 'none';
                    elKelasXIContainer.style.display = 'block';
                    elKelasXIIContainer.style.display = 'none';
                } else if (kelasValue == 'XII') {
                    elKelasXContainer.style.display = 'none';
                    elKelasXIContainer.style.display = 'none';
                    elKelasXIIContainer.style.display = 'block';
                }
            }


            elKelasContainer.addEventListener('change', () => {
                changeKelas();
            })
        </script>
    @endsection

@endif
