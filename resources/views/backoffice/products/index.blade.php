@extends('layouts.backoffice')

@section('title')
    Kelola Produk
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <style>
        .product-thumbnail {
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

                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th width="300">Thumbnail</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <td>Berat</td>
                                    <td>Status</td>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Terakhir Diperbarui</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/products/' . $product->thumbnail) }}"
                                                class="product-thumbnail">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp. {{ number_format($product->selling_price) }}</td>
                                        <td>{{ $product->weight }} Kg</td>
                                        <td>
                                            @if ($product->status == 'active')
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('products.show', [$product->id]) }}"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('products.edit', [$product->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- delete action --}}
                                            <form action="{{ route('products.destroy', [$product->id]) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Hapus Produk {{ $product->name }} dari sistem secara permanent?')">
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
