@extends('layouts.frontoffice')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">

        <div class="row d-flex justify-content-between">
            <div class="col-lg-8 col-sm-6">
                <h3>List Produk</h3>
            </div>
            <div class="col-lg-4 col-sm-6">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Nama Item">
                        <div class="input-group-append">
                            <button class="btn btn-primary shadow" type="button" id="button-addon2"><i
                                    class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row align-items-center latest_product_inner mt-3">
            @forelse ($products as $product)
                <div class="col-lg-3 col-sm-6">
                    <div class="single_product_item">
                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" alt="">
                        <div class="single_product_text">
                            <a href="{{ url('product/' . $product->slug) }}">
                                <h4>{{ $product->name }}</h4>
                            </a>
                            <h3>Rp. {{ number_format($product->selling_price) }}</h3>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-danger">
                    Produk belum ada
                </div>
            @endforelse
        </div>
    </div>

@endsection
