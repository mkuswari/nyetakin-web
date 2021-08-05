@extends('layouts.frontoffice')

@section('title')
    Overview Pesanan
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Checkout Overview</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ confirmation part start =================-->
    <section class="confirmation_part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center mb-4">Rincian Pesanan</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Order Info</h4>
                        <ul>
                            <li>
                                <p>Nomor Invoice</p><span>: {{ Str::upper($detail->invoice_number) }}</span>
                            </li>
                            <li>
                                <p>Tanggal</p><span>: {{ $detail->created_at }}</span>
                            </li>
                            <li>
                                <p>Total Tagihan</p><span>: Rp. {{ number_format($detail->total_billing) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Alamat Pengiriman</h4>
                        <ul>
                            <li>
                                <p>Alamat</p><span>: {{ $detail->address }}</span>
                            </li>
                            <li>
                                <p>Kabupaten / Kota</p><span>: {{ $city }}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{ $province }}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{ $detail->zip_code }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>Rincian Pesanan</h3>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <th colspan="2"><span>{{ $item->product->name }}</span></th>
                                        <th>{{ $item->quantity }}</th>
                                        <th> <span>Rp.
                                                {{ number_format($item->product->selling_price * $item->quantity) }}</span>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" colspan="2"></th>
                                    <th scope="col">Biaya Pengiriman</th>
                                    <th scope="col">Rp. {{ number_format($detail->services) }}</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="2"></th>
                                    <th scope="col">Total Pembayaran</th>
                                    <th scope="col">Rp. {{ number_format($detail->total_billing) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="payment_section">
                        <div class="text-center">
                            <span class="text-success">Pesanan Kamu telah Kami terima. Silahkan lakukan pembayaran untuk
                                melanjutkan.</span>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-6">
                                <div class="card shadow border-0 mb-3" style="border-radius: 15px">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <h4>Transfer Bank</h4>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-sm-4">
                                                <img src="{{ asset('img/logo_btpn.svg') }}" width="100%">
                                            </div>
                                            <div class="col-sm-8 align-self-center">
                                                <h5>Dhiya Rifdah Afifah</h5>
                                                <h5>90130055181</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow border-0 mb-3" style="border-radius: 15px">
                                    <div class="card-body">
                                        <div class="text-center mb-2">
                                            <h4>Scan Barcode</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mx-auto">
                                                <img src="{{ asset('img/nyetakin_qrcode.jpeg') }}" alt="">
                                                <h5 class="text-center">nyetakin.com</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
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
                            </div>
                            <div class="col-sm-6">
                                <div class="payment_continue mt-3">
                                    <h4>Konfirmasi Pembayaran</h4>
                                    <hr>
                                    <form action="{{ route('checkout.payment') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $detail->id }}">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama Kamu">
                                        </div>
                                        <div class="form-group d-none">
                                            <label for="total_amount">Nominal Pembayaran</label>
                                            <input type="number" class="form-control" id="total_amount" name="total_amount"
                                                placeholder="Jumlah yang dibayar" value="{{ $detail->total_billing }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_slip">Bukti Pembayaran</label>
                                            <input type="file" class="form-control" id="payment_slip" name="payment_slip">
                                        </div>
                                        <p class="small text-muted">Note : Harap melampirkan bukti pembayaran. jika tidak,
                                            pesanan tidak akan kami proses.</p>
                                        <button type="submit" class="btn_3 mt-3">Konfirmasi Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->

@endsection
