@extends('layouts.app')

@section('main')
<nav class="relative w-full z-40 py-4">
  <div class="flex justify-center">
      <div class="container max-w-6xl px-4">
          <div class="flex justify-between items-center">
              <a href={{ route('home') }} class="text-xl font-semibold text-white lg:text-2xl">
                SiMa-Ku
              </a>
              <p class="text-base font-semibold text-white">
                Hi, {{ auth()->user()->guru->nama }}
              </p>
          </div>
      </div>
  </div>
</nav>
<main class="-mt-[64px]">
  <div> 
    <img src="{{asset('/img/bg-app.png')}}" alt="" class="w-full h-[480px] object-cover object-bottom" >
  </div>
  <div class="-mt-[400px] pb-24 flex justify-center md:-mt-[320px] relative">
      <div class="container px-4 max-w-6xl">
          <div class="-mx-0 flex flex-wrap md:-mx-8">
            <div class="mb-8 w-full px-0 md:w-6/12 md:mb-0 md:px-8">
              <div>
                <h2 class="mb-2 text-3xl font-bold text-white lg:text-5xl">Layanan</h2>
                <h2 class="mb-4 text-3xl font-bold text-white lg:text-5xl">Simaku Jurnal</h2>
                <p class="max-w-md text-sm font-normal text-white md:text-base">Sivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac</p>
              </div>
            </div>
            <div class="mb-8 w-full px-0 md:w-6/12 md:mb-0 md:px-8">
              <div class="flex flex-wrap -mx-2">
                <div class="w-6/12 px-2 mb-4">
                  <a href="{{ route('jurnal') }}" class="w-full">
                    <div class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                      <div class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-blue-500 to-blue-700 flex justify-center items-center rounded-full">
                        <div class="h-6 w-6">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 448 512" class="text-white"><path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7c-4.2-15.4-4.2-59.3 0-74.7c5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32c0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"/></svg>
                        </div>
                      </div>
                        <p class="text-base font-bold text-gray-600 lg:text-xl">Jurnal</p>
                    </div>
                  </a>
                </div>
                <div class="w-6/12 px-2 mb-4">
                  <a href="{{ route('izin') }}" class="w-full">
                    <div class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                      <div class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-amber-500 to-amber-700 flex justify-center items-center rounded-full">
                        <div class="h-6 w-6">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 640 512" class="text-white"><path fill="currentColor" d="M624 448h-80V113.45C544 86.19 522.47 64 496 64H384v64h96v384h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM312.24 1.01l-192 49.74C105.99 54.44 96 67.7 96 82.92V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h336V33.18c0-21.58-19.56-37.41-39.76-32.17zM264 288c-13.25 0-24-14.33-24-32s10.75-32 24-32s24 14.33 24 32s-10.75 32-24 32z"/></svg>
                        </div>
                      </div>
                        <p class="text-base font-bold text-gray-600 lg:text-xl">Izin</p>
                    </div>
                  </a>
                </div>
                <div class="w-6/12 px-2 mb-4">
                  <a href="{{ route('refleksi') }}" class="w-full">
                    <div class="p-4 bg-white rounded-lg w-full flex flex-col justify-center items-center shadow-lg">
                      <div class="mb-2 p-2 h-12 w-12 bg-gradient-to-br from-cyan-500 to-cyan-700 flex justify-center items-center rounded-full">
                        <div class="h-6 w-6">
                          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 384 512" class="text-white"><path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400L0 512z"/></svg>
                        </div>
                      </div>
                        <p class="text-base font-bold text-gray-600 lg:text-xl">Refleksi</p>
                    </div>
                  </a>
                </div>
              <div>
            <div>
          </div>
      </div>
  </main>
@endsection