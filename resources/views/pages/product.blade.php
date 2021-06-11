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
                    <div class="product_top_bar d-flex justify-content-between align-items-center">
                        <div class="single_product_menu">
                            <p>Temukan produk yang kamu inginkan</p>
                        </div>
                        <div class="single_product_menu">
                            <form action="{{ url('product') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="keyword"
                                        placeholder="Cari Item" aria-describedby="inputGroupPrepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="ti-search"></i></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row align-items-center latest_product_inner">
                        @foreach ($products as $product)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection
