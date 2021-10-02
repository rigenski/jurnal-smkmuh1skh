@extends('layouts.app')

@section('main')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="empty-state" data-height="400" style="height: 400px;">
        @if(session('success'))
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_qlmzlzeq.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        <h2 class="text-success">Terima Kasih ✨</h2>
        <p class="lead">
            Selamat <span class="font-weight-bold text-primary">{{ auth()->user()->name }}</span> , data jurnal yang
            anda kirim telah berhasil dikirim
        </p>
        @else
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_d4y2uivj.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        <h2 class="text-danger">Silahkan Kembali 📑</h2>
        <p class="lead">
            Maaf <span class="font-weight-bold text-primary">{{ auth()->user()->name }}</span> , mohon isi formulir
            data jurnal terlebih dahulu
        </p>
        @endif
        <a href="{{ route('home') }}" class="btn btn-success mt-4">Kembali</a>
        <a href="{{ route('logout') }}" class="mt-4 font-weight-bold border-bottom border-danger text-danger">Logout</a>
    </div>
</div>
@endsection