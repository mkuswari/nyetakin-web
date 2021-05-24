@extends('layouts.backoffice')

@section('title')
    Kelola Portfolio
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <style>
        .portfolio-thumbnail {
            width: 300px;
            height: 150px;
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

                    <a href="{{ route('portfolios.create') }}" class="btn btn-primary mb-3">Tambah Portfolio</a>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th width="300">Thumbnail</th>
                                    <th width="200">Judul</th>
                                    <th width="200">Deskripsi</th>
                                    <th width="200">Tanggal Dibuat</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/portfolios/' . $portfolio->thumbnail) }}"
                                                class="portfolio-thumbnail">
                                        </td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ $portfolio->description }}</td>
                                        <td>{{ $portfolio->created_at }}</td>
                                        <td>
                                            <a href="{{ route('portfolios.edit', [$portfolio->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- delete action --}}
                                            <form action="{{ route('portfolios.destroy', [$portfolio->id]) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Hapus Portfolio {{ $portfolio->title }} dari sistem secara permanent?')">
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
