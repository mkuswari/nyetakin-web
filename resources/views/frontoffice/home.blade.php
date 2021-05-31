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
                    {{-- include side menu --}}
                    @include('layouts.components.frontoffice.sidemenu')
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
