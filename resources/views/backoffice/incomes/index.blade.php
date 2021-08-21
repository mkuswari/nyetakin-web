@extends('layouts.backoffice')

@section('title')
    History Pendapatan
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
                                    <th>Tanggal</th>
                                    <th>Nomor Invoice</th>
                                    <th>Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomes as $income)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $income->order->created_at }}</td>
                                        <td>{{ $income->order->invoice_number }}</td>
                                        <td>Rp. {{ number_format($income->income) }}</td>
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
