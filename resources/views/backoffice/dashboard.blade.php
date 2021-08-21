@extends('layouts.backoffice')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $total_users }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Pengguna</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $total_products }}
                                </h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Produk
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="shopping-bag"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $total_orders }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Pemesanan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="package"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $total_reviews }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Ulasan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="message-circle"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold mb-3">Pendapatan Bulan ini</h4>
                    <h1 class="font-weight-bold">Rp. 1.327.341,-</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold mb-3">Total Semua Pendapatan</h4>
                    <h1 class="font-weight-bold">Rp. 1.327.341,-</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold mb-3">Transaksi Terbaru</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <td>Invoice</td>
                                <td>Nama</td>
                                <td>Nomor HP</td>
                                <td>Total Tagihan</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ \Str::upper($order->invoice_number) }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>Rp. {{ number_format($order->total_billing) }}</td>
                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge badge-warning">Menunggu Pembayaran</span>
                                        @elseif($order->status == 1)
                                            <span class="badge badge-info">Sudah Dibayar</span>
                                        @elseif ($order->status == 2)
                                            <span class="badge badge-success">Sudah Dikirimkan</span>
                                        @else
                                            <span class="badge badge-success">Pembayaran Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', [$order->id]) }}" class="btn btn-info btn-sm"
                                            style="border-radius: 50px;"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
