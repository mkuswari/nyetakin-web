@extends('layouts.backoffice')

@section('title')
    Detail Produk {{ $product->name }}
@endsection

@push('styles')
    <style>
        .product-thumbnail {
            width: 100%;
            height: 400px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ asset('uploads/products/' . $product->thumbnail) }}"
                                    class="product-thumbnail">
                            </div>
                            <div class="col-sm-8">
                                <b>Nama Produk : </b>
                                <p>{{ $product->name }}</p>
                                <b>Kategori Produk : </b>
                                <p>{{ $product->category->name }}</p>
                                <b>Deskripsi : </b>
                                <p>{{ $product->description }}</p>
                                <b>Harga Produksi : </b>
                                <p>Rp. {{ $product->production_price }}</p>
                                <b>Harga Jual : </b>
                                <p>Rp. {{ $product->selling_price }}</p>
                                <b>Berat : </b>
                                <p>{{ $product->weight }}</p>
                                <b>Stok Barang : </b>
                                <p>{{ $product->stock }}</p>
                                <b>Status : </b>
                                <p>
                                    @if ($product->status == 'active')
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-warning">Nonaktif</span>
                                    @endif
                                </p>
                                <b>Tanggal Ditambahkan : </b>
                                <p>
                                    {{ $product->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
