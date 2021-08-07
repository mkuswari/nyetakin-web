@extends('layouts.frontoffice')

@section('title')
    Detail {{ \Str::upper($detail->invoice_number) }}
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
                        <h1 class="font-weight-bold">Pesanan Saya</h1>
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
                    @if ($detail->status == 0)
                    <div class="alert alert-danger text-center">
                        <p>Pesanan ini menunggu pembayaran, <a href="{{ route("checkout.overview", $detail->id) }}">Bayar Sekarang</a></p>
                    </div>

                    @elseif ($detail->status == 1)
                    <div class="alert alert-warning text-center">
                        <p>Pembayaran kamu sedang diverifikasi, kami akan mengirimkan pesanan kamu setelah pembayaran berhasil terverifikasi</p>
                    </div>
                    @endif
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3>Detail Transaksi</h3>
                            <table class="table">
                                <tr>
                                    <td>Tanggal Pemesanan</td>
                                    <td>:</td>
                                    <td>{{ $detail->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Invoice</td>
                                    <td>:</td>
                                    <td>{{ \Str::upper($detail->invoice_number) }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $detail->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td>:</td>
                                    <td>{{ $detail->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $detail->email }}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td>{{ $province }}</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td>{{ $city }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pengiriman</td>
                                    <td>:</td>
                                    <td>{{ $detail->address }}</td>
                                </tr>
                                <tr>
                                    <td>Kode POS</td>
                                    <td>:</td>
                                    <td>{{ $detail->zip_code }}</td>
                                </tr>
                                <tr>
                                    <td>Kurir</td>
                                    <td>:</td>
                                    <td>{{ \Str::upper($detail->courier) }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Kirim</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($detail->services) }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Harus Dibayar</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($detail->total_billing) }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pesanan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($detail->status == 0)
                                            <span class="badge badge-warning">Menunggu Pembayaran</span>
                                        @elseif($detail->status == 1)
                                            <span class="badge badge-info">Sudah Dibayar</span>
                                        @elseif ($detail->status == 2)
                                            <span class="badge badge-success">Pesanan Dikirimkan</span>
                                        @else
                                            <span class="badge badge-success">Pembayaran Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                @if ($detail->status == 2)
                                    <tr>
                                        <td>Nomor Resi</td>
                                        <td>:</td>
                                        <td>{{ \Str::upper($shipping->receipt_number) }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3>Rincian Item</h3>
                            <table class="table">
                                <tr>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                                @php
                                    $subTotal = 0;
                                @endphp
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/products/' . $item->product->thumbnail) }}"
                                                style="width: 64px; height:64px; border-radius:10px;">
                                            {{ $item->product->name }}
                                        </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                            Rp. {{ number_format($item->quantity * $item->product->selling_price) }}
                                        </td>
                                    </tr>

                                    @php
                                        $subTotal = $subTotal + $item->quantity * $item->product->selling_price;
                                    @endphp

                                @endforeach
                                <tr>
                                    <td colspan="1"></td>
                                    <td>Ongkos Kirim</td>
                                    <td>Rp. {{ number_format($detail->services) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1"></td>
                                    <td>Subtotal</td>
                                    <td>Rp. {{ number_format($subTotal + $detail->services) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
