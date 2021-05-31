@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Profile Saya
@endsection

@push('styles')
    <style>
        .panel-link {
            color: black;
            padding: 15px;
            background-color: #EBFDFF;
            margin-bottom: 8px;
        }

    </style>
@endpush

@section('content')
    <!--================Tracking Box Area =================-->
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Profile Saya</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->

    <section class="home-content mt-n5">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    {{-- include side menu --}}
                    @include('layouts.components.frontoffice.sidemenu')
                </div>
                <div class="col-sm-9">
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
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3 class="mb-4">Informasi Personal</h3>
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="phone" id="phone"
                                            value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-3 col-form-label">Avatar</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="avatar" id="avatar">
                                        <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                    </div>
                                </div>
                                <div class="form-action row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary shadow rounded-0">Update
                                            Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3 class="mb-4">Ganti Password</h3>
                            <form action="{{ route('profile.password') }}" method="post">
                                @csrf
                                @method("PATCH")
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-3 col-form-label">Password
                                        Sekarang</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" id="current_password" placeholder="Current Password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-3 col-form-label">Password baru</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" id="new_password" placeholder="New Password">
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password_confirm" class="col-sm-3 col-form-label">Konfirmasi
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                            class="form-control @error('new_password_confirm') is-invalid @enderror"
                                            name="new_password_confirm" id="new_password_confirm"
                                            placeholder="Current Password">
                                        @error('new_password_confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-action row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary shadow rounded-0">Ganti
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
