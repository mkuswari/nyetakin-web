@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Pesanan Saya
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
                    <div class="card mb-3 shadow border-0">
                        <div class="card-body">
                            <h3>List Pesanan</h3>
                            <hr>
                            <table class="table">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kode Invoice</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ \Str::upper($order->invoice_number) }}</td>
                                        <td>Rp. {{ number_format($order->total_billing) }}</td>
                                        <td>
                                            @if ($order->status == 0)
                                                <span class="badge badge-warning">Menunggu Pembayaran</span>
                                            @elseif($order->status == 1)
                                                <span class="badge badge-info">Sudah Dibayar</span>
                                            @elseif ($order->status == 2)
                                                <span class="badge badge-success">Pesanan Dikirimkan</span>
                                            @else
                                                <span class="badge badge-danger">Pembayaran Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('home.order.detail', [$order->id]) }}"
                                                class="btn btn-info btn-sm shadow">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
