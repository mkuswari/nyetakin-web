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
    <section class="confirmation_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Terimakasih. Pesanan kamu telah kami terima, mohon lakukan pembayaran untuk
                            melanjutkan.</span>
                        <div class="payment_continue text-center mt-3">
                            <form action="">
                                @csrf
                                <button type="submit" class="btn_3">Bayar Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
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
        </div>
    </section>
    <!--================ confirmation part end =================-->

@endsection
