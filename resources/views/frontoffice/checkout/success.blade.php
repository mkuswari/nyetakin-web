@extends('layouts.frontoffice')

@section('title')
    Checkout Pesanan Berhasil
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner text-center">
                        <h1 class="font-weight-bold">Hore..!! Checkout Berhasil</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ confirmation part start =================-->
    <section class="confirmation_part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto text-center">
                    <img src="{{ asset("img/success-purchase.svg") }}" width="100%">
                    <p class="text-success font-weight-bold my-2">Checkout Berhasil, kami akan mengirimkan pesanan kamu setelah memverifikasi pembayaran kamu</p>
                    <a href="{{ route("home.order") }}" class="btn btn-primary shadow px-4" style="border-radius: 20px;">Pesanan Saya</a>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->

@endsection
