@extends('layouts.base')

@section('main')
<div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                            class="fas fa-search"></i></a></li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <i class="fas fa-user mr-2"></i>
                    <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href={{ route('admin') }}>Jurnalmu</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="@yield('dashboard')"><a class="nav-link" href="{{ route('admin') }}"><i
                            class="fas fa-home"></i>
                        <span>Dashboard</span></a></li>

                <li class="menu-header">MENU</li>
                <li class="@yield('jurnal_guru')"><a class="nav-link" href="{{ route('admin.jurnal_guru') }}">
                        <i class="fas fa-book"></i>
                        <span>Jurnal Guru</span></a></li>
                <li class="@yield('jurnal_karyawan')"><a class="nav-link" href="{{ route('admin.jurnal_karyawan') }}">
                        <i class="fas fa-book"></i>
                        <span>Jurnal Karyawan</span></a></li>
                </li>
                <li class="@yield('izin_guru')"><a class="nav-link" href="{{ route('admin.izin_guru') }}">
                        <i class="fas fa-door-open"></i>
                        <span>Izin Guru</span></a></li>
                <li class="@yield('refleksi_guru')"><a class="nav-link" href="{{ route('admin.refleksi_guru') }}">
                        <i class="fas fa-bookmark"></i>
                        <span>Refleksi Guru</span></a></li>
                <li class="menu-header">Tambahan</li>
                <li class="@yield('mata_pelajaran')"><a class="nav-link" href="{{ route('admin.mata_pelajaran') }}"><i
                            class="fas fa-book"></i>
                        <span>Mata Pelajaran</span></a></li>
                <li class="@yield('unit_kerja')"><a class="nav-link" href="{{ route('admin.unit_kerja') }}"><i
                            class="fas fa-cog"></i>
                        <span>Unit Kerja</span></a></li>

                <li class="@yield('siswa')"><a class="nav-link" href="{{ route('admin.siswa') }}"><i
                            class="fas fa-users"></i>
                        <span>Siswa</span></a></li>
                <li class="@yield('guru')"><a class="nav-link" href="{{ route('admin.guru') }}"><i
                            class="fas fa-users"></i>
                        <span>Guru</span></a></li>
                <li class="@yield('karyawan')"><a class="nav-link" href="{{ route('admin.karyawan') }}"><i
                            class="fas fa-users"></i>
                        <span>Karyawan</span></a></li>
            </ul>
        </aside>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
            </div>
            <div class="section-body">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            Jurnal - SMK Muhammadiyah 1 Sukoharjo
        </div>
    </footer>
</div>
@endsection