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
                    <img alt="image"
                        src="https://images.unsplash.com/photo-1512054502232-10a0a035d672?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                        class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
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