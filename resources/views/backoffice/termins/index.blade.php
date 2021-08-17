@extends('layouts.backoffice')

@section('title')
    Kelola Termin Cetak Foto
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
@endpush

@section('content')


    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <a href="{{ route('termins.create') }}" class="btn btn-primary">Tambah Periode Baru</a>
            <div class="table-responsive mt-3">
                <table id="zero_config" class="table table-striped table-bordered display no-wrap" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th>Periode</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Keterangan</th>
                            <th width="50">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($termins as $termin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $termin->name }}</td>
                                <td>{{ $termin->start }}</td>
                                <td>{{ $termin->end }}</td>
                                <td>{{ $termin->notes }}</td>
                                <td>
                                    <a href="{{ route('termins.edit', [$termin->id]) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    {{-- delete action --}}
                                    <form action="{{ route('termins.destroy', [$termin->id]) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Hapus Data Termin dari sistem secara permanent?')">
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
@endsection

@push('scripts')
    <script src="{{ asset('backoffice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
