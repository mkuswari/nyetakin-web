@extends('layouts.frontoffice')

@section('title')
    Pembayaran Cetak Pas Foto
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner text-center">
                        <h2 class="font-weight-bold">Horee Pembayaran Berhasil</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6 mx-auto">

                <div class="text-center">
                    <img src="{{ asset('img/success-purchase.svg') }}" width="50%">
                    <h2>Hi, {{ Auth::user()->name }}</h2>
                    <p>Pembayaran Kamu Telah Berhasil, kami akan menghubungi kamu ketika foto sudah dicetak yaa.</p>
                    <a href="{{ route('home') }}" class="btn_3 mt-5">Kembali ke Home</a>
                </div>

            </div>
        </div>

    </div>


@endsection
