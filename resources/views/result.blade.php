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
        @if(session('success'))
        <div class="w-full h-[480px] bg-gradient-to-br from-emerald-500 to-emerald-700"></div>
        @else
        <div class="w-full h-[480px] bg-gradient-to-br from-rose-500 to-rose-700"></div>
        @endif
        <div class="-mt-[400px] pb-24 flex justify-center md:-mt-[360px]">
            <div class="container px-4 max-w-2xl">
                <div>
                    <div class="flex justify-start mb-4">
                        <a href={{ route('home') }} class="flex items-center text-base font-normal text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2H7.825l5.6 5.6L12 20Z" class="text-white"/></svg>
                            <span class="ml-2">Kembali</span>
                        </a>
                    </div>
                    <div class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg md:p-8" >
                        @if(session('success'))
                        <div class="py-24 flex flex-col justify-center items-center">
                            <div class="mb-4">
                                <lottie-player src="https://lottie.host/85bc158d-6c8c-491a-89d3-d5e767183c04/qb5d3sewMv.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                            </div>
                            <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Terimakasih !!!</h4>
                            <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Selamat, formulir yang anda kirim telah berhasil dikirim</p>
                        </div>
                        @else
                        <div class="py-24 flex flex-col justify-center items-center">
                            <div class="mb-4">
                                <lottie-player src="https://lottie.host/ef2bec90-d792-4493-b64c-3ed91052c3f5/LMu94CrL61.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                            </div>
                                <h4 class="mb-0.5 text-lg font-semibold text-gray-800 text-center lg:text-2xl">Maaf !!!</h4>
                            <p class="text-sm font-normal text-gray-600 text-center lg:text-base">Mohon untuk mengisi formulir yang disediakan terlebih dahulu</p>
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