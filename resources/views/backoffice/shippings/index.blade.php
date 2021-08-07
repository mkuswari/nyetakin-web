@extends('layouts.backoffice')

@section('title')
    Data Pengiriman
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
                                    <th>Nomor Invoice</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat</th>
                                    <th>Jasa Pengiriman</th>
                                    <th>Nomor Resi</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shippings as $shipping)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Str::upper($shipping->order->invoice_number) }}</td>
                                    <td>{{ $shipping->order->name }}</td>
                                    <td>{{ $shipping->order->address }}</td>
                                    <td>{{ $shipping->order->courier }}</td>
                                    <td>{{ $shipping->receipt_number }}</td>
                                    <td>
                                        <a href="{{ route("shippings.show", [$shipping->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('shippings.destroy', [$shipping->id]) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus Pengiriman {{ $shipping->order->invoice_number }} dari sistem secara permanent?')">
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
