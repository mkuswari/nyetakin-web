@extends('layouts.backoffice')

@section('title')
    Kelola Bukti Pembayaran
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <style>
        .payment-slip-image {
            width: 200px;
            height: 250px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

    </style>
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
                                    <th>Nama Pengirim</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ \Str::upper($payment->order->invoice_number) }}
                                        </td>
                                        <td>{{ $payment->name }}</td>
                                        <td>Rp. {{ number_format($payment->total_amount) }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/payments/' . $payment->payment_slip) }}"
                                                class="payment-slip-image">
                                        </td>
                                        <td>
                                            <a href="{{ route('payments.show', [$payment->id]) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('payments.edit', [$payment->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- delete action --}}
                                            <form action="{{ route('payments.destroy', [$payment->id]) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Hapus Pembayaran {{ $payment->invoice_number }} dari sistem secara permanent?')">
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
