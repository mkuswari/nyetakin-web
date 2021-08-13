@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Katalog Produk
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Katalog Produk</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Category Product Area =================-->
    <section class="cat_product_area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-8 col-sm-6">
                            <h3>Temukan Produk yang Kamu Inginkan</h3>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <form action="{{ url('product') }}">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" id="keyword"
                                        placeholder="Cari Nama Item">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary shadow" type="button" id="button-addon2"><i
                                                class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row align-items-center latest_product_inner">
                        @forelse ($products as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{ url('product/' . $product->slug) }}">
                                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" alt="">
                                        <div class="single_product_text">
                                            <h4>{{ $product->name }}</h4>
                                            <h3>Rp. {{ number_format($product->selling_price) }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="mx-auto mt-5">
                                <img src="{{ asset('img/empty-state.svg') }}" width="550">
                                <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection
