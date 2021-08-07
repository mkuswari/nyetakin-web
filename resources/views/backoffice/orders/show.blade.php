@extends('layouts.backoffice')

@section('title')
    Detail Pesanan {{ \Str::upper($detail->invoice_number) }}
@endsection

@push('styles')
    <style>
        .payment-slip-image {
            height: 200px;
            width: 200px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
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
                                    <span class="badge badge-success">Sudah Dikirimkan</span>
                                @else
                                    <span class="badge badge-danger">Pembayaran Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Rincian Produk</h3>
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

            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Bukti Pembayaran</h3>
                    <hr>
                    @if ($detail->status == 0)
                        <div class="text-center">
                            <p class="text-danger">Pesanan belum dibayar</p>
                        </div>
                    @else
                        <table class="table">
                            <tr>
                                <td>Nama Pengirim</td>
                                <td>:</td>
                                <td>{{ $payment->name }}</td>
                            </tr>
                            <tr>
                                <td>Nominal Pembayaran</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($payment->total_amount) }}</td>
                            </tr>
                            <tr>
                                <td>Bukti Pembayaran</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('uploads/payments/' . $payment->payment_slip) }}"
                                        class="payment-slip-image d-block">
                                    <a href="{{ asset('uploads/payments/' . $payment->payment_slip) }}"
                                        download
                                        class="btn btn-warning btn-sm text-white mt-2" style="border-radius: 5px;">Unduh
                                        Bukti
                                        Pembayaran</a>
                                </td>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
