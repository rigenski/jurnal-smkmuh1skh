@extends('layouts.base')

@section('main')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ asset('/img/logo-jurnal.svg')}}" alt="logo" width="80" class="shadow-light">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('postLogin') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text"
                                    class="form-control {{ $errors->has('mess') || session('error') ? 'is-invalid' : '' }}"
                                    name="username" tabindex="1" required autofocus>
                                @error('username')
                                <div class="invalid-feedback">
                                    * {{$message}}
                                </div>
                                @enderror
                                @if(session('error'))
                                <div class="invalid-feedback">
                                    * {{ session('error') }}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    name="password" tabindex="2" required>
                                @error('password')
                                <div class="invalid-feedback">
                                    * {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection