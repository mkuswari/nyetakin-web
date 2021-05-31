@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 mx-auto">
            <div class="login_part_form">
                <div class="login_part_form_iner">


                    <div class="text-center">
                        <img src="{{ asset('frontoffice/img/logo.png') }}" alt="Logo Nyetakin">
                        <h3 class="mt-4">Login</h3>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form class="row contact_form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Masukkan E-mail" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="password" class="form-control @error('email') is-invalid @enderror" id="password"
                                name="password" placeholder="Masukkan Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account d-flex align-items-center justify-content-between">
                                <div class="remember">
                                    <input type="checkbox" id="remember" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Remember me</label>
                                </div>
                                <div class="forgo-pass">
                                    <a href="" class="text-muted">Lupa Password?</a>
                                </div>
                            </div>
                            <button type="submit" value="submit" class="btn_3">
                                Login
                            </button>
                            <div class="text-center">
                                <span>Belum punya akun? <a href="{{ route('register') }}">Buat Akun</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
