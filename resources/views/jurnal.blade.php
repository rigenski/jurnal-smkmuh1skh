@extends('layouts.app')

{{-- GURU --}}

@section('main')
    <nav class="top-0 sticky w-full p-4">
        <div class="flex justify-center items-center">
            
        </div>
    </nav>
  <main class="pb-24 bg-slate-50">
    <div class="w-full h-96 bg-indigo-600"></div>
    <div class="-mt-48 flex justify-center">
        <form class="mx-4 p-4 w-full max-w-2xl bg-white rounded shadow-lg md:p-8">
            <h4 class="mb-2 text-3xl font-semibold text-slate-800">Jurnal Guru</h4>
            <p class="mb-8 text-base font-normal text-slate-600">Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt!</p>
            <div class="w-full">
                <div class="mb-2 flex flex-col md:mb-4">
                  <label class="mb-2 text-sm font-light text-slate-600">
                   1. Tanggal <span class="text-red-600">*</span>
                  </label>
                  <input
                    type="date"
                    class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md"
                  />
                  <small class="mt-2 text-xs font-normal text-slate-400">Contoh Penulisan : 2004-05-15</small>
                  </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            2. Kelas <span class="text-red-600">*</span>
                        </label>
                        <select class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                        <small class="mt-2 text-xs font-normal text-slate-400">Pilih Tingkat</small>
                        <select class="mt-2 border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                        <small class="mt-2 text-xs font-normal text-slate-400">Pilih Kelas</small>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            3. Mengajar Jam Ke-  <span class="text-red-600">*</span>
                        </label>
                        <select class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            4. Sampai Jam Ke-  <span class="text-red-600">*</span>
                        </label>
                        <select class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            5. Mata Pelajaran  <span class="text-red-600">*</span>
                        </label>
                        <select class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            6. Deskripsi kegiatan belajar mengajar <span class="text-red-600">*</span>
                        </label>
                        <input
                        type="text"
                        class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md"
                        />
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            7. Siswa Tidak Hadir <span class="text-red-600">*</span>
                        </label>
                        <div class="mx-4 py-0.5 flex justify-between border-t-2 border-b-2 border-slate-50">
                            <p class="mr-2 text-base font-normal text-slate-800">- Rigen Maulana</p>
                            <select class="px-2 py-0.5 text-base font-normal text-slate-800">
                                <option>Hadir</option>
                                <option>Izin</option>
                                <option>Alfa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="mb-2 flex flex-col md:mb-4">
                        <label class="mb-2 text-sm font-light text-slate-600">
                            8. Catatan Khusus Siswa
                        </label>
                        <input
                        type="text"
                        class="border px-4 py-1.5 text-base font-normal text-slate-800 rounded-md"
                        />
                        <small class="mt-2 text-xs font-normal text-slate-400">Contoh Penulisan : Siswa yang bernama Ahmad tidak masuk 3 kali berturut turut</small>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @endsection