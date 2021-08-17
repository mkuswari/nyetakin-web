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
                        <h2 class="font-weight-bold">Halaman Pembayaran</h2>
                        <p>Silahkan lakukan pembayaran dengan QRIS dibawah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="card shadow border-0" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="text-center">
                            <p>Mohon Lakukan pembayaran sebanyak</p>
                            <h2>Rp. 10.000,-</h2>
                        </div>
                        <img src="{{ asset('img/nyetakin_qrcode.jpeg') }}" class="p-5 my-n4">
                        <h5 class="text-center">nyetakin.com</h5>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <p>Menerima pembayaran melalui : </p>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_gopay.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_ovo.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_linkaja.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_dana.png') }}" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3 shadow border-0" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="payment_slip"><b class="text-dark">Bukti Pembayaran</b></label>
                                <input type="file" name="payment_slip" id="payment_slip" class="form-control">
                                <small class="text-muted">Pastikan jumlah pembayaran sesuai dengan nominal
                                    pembayaran</small>
                            </div>
                            <div class="form-action">
                                <button class="btn_3 btn-block">Konfirmasi Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection
