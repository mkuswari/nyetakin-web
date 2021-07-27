@extends('layouts.backoffice')

@section('title')
    Kelola Pesanan
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th>Tanggal Order</th>
                                    <th>Kode Invoice</th>
                                    <th>Nama</th>
                                    <th>Nomor HP</th>
                                    <th>E-mail</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            {{ \Str::upper($order->invoice_number) }}
                                        </td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>
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
                                            <a href="{{ route('orders.show', [$order->id]) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('orders.edit', [$order->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- delete action --}}
                                            <form action="{{ route('orders.destroy', [$order->id]) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Hapus Order {{ $order->invoice_number }} dari sistem secara permanent?')">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backoffice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
