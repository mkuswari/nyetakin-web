@extends('layouts.auth')

@section('title')
    Register
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 mx-auto">
            <div class="login_part_form">
                <div class="login_part_form_iner">


                    <div class="text-center">
                        <img src="{{ asset('frontoffice/img/logo.png') }}" alt="Logo Nyetakin">
                        <h3 class="mt-4">Register</h3>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form class="row contact_form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Nama" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <small class="text-muted">Password harus terdiri dari minimal 1 Huruf Kapital, dan 1 Angka</small>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn_3">
                                Register
                            </button>
                            <div class="text-center">
                                <span>Sudah punya akun? <a href="{{ route('login') }}">Login</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
