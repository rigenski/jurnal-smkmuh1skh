@extends('layouts.app')

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
                <li class="@yield('dashboard')"><a class="nav-link" href="/admin"><i class="fas fa-home"></i>
                        <span>Dashboard</span></a></li>
                <li class="@yield('jurnal')"><a class="nav-link" href="/admin/jurnal"><i class="fas fa-book"></i>
                        <span>Jurnal</span></a></li>
                <li class="@yield('siswa')"><a class="nav-link" href="/admin/siswa"><i class="fas fa-users-cog"></i>
                        <span>Siswa</span></a></li>
                <li class="@yield('guru')"><a class="nav-link" href="/admin/guru"><i class="fas fa-users"></i>
                        <span>Guru</span></a></li>
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
            Jurnal Guru - SMK Muhammadiyah 1 Sukoharjo
        </div>
    </footer>
</div>
@endsection