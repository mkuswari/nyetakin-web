@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Akun Saya
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
                        <h1 class="font-weight-bold">Akun Saya</h1>
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
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <div class="user-session text-center">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}" alt="user"
                                        class="rounded-circle" width="70" style="border: 2px solid #EBFDFF">
                                @else
                                    <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}" alt="user"
                                        class="rounded-circle" width="70" style="border: 2px solid #EBFDFF">
                                @endif
                                <p>Hai, {{ Auth::user()->name }}</p>
                                <small class="text-muted">{{ Auth::user()->email }}</small>
                            </div>
                            <hr>
                            <div class="single_footer_part">
                                <h5>Main Menu</h5>
                                <a href="">
                                    <div class="panel-link">
                                        <i class="fa fa-home"></i>
                                        <span>Home</span>
                                    </div>
                                </a>
                                <a href="">
                                    <div class="panel-link">
                                        <i class="fa fa-user-cog"></i>
                                        <span>Profile Saya</span>
                                    </div>
                                </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="panel-link text-danger">
                                        <i class="fa fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3>Dashboard</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
