@extends('layouts.frontoffice')

@section('title')
    Nyetakin | Jasa Percetakan Online dan Percetakan Custom
@endsection

@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth
                                                Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/banner_img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth & Wood
                                                Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/banner_img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth
                                                Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/banner_img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth $ Wood Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/banner_img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Kategori Produk</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($categories as $category)
                            <a href="{{ url('category/' . $category->slug) }}">
                                <div class="single_product_item">
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}" class="rounded-lg category-thumbnail">
                                    <div class="single_product_text">
                                        <h4>{{ $category->name }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Katalog Produk</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" alt="">
                                    <div class="single_product_text">
                                        <a href="{{ url('product/' . $product->slug) }}">
                                            <h4>{{ $product->name }}</h4>
                                        </a>
                                        <h3>IDR. {{ number_format($product->selling_price) }}</h3>
                                        <a href="#" class="add_cart"><i class="ti-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Desainer kami</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="{{ asset('frontoffice/img/product/product_1.png') }}" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="{{ asset('frontoffice/img/product/product_2.png') }}" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="{{ asset('frontoffice/img/product/product_3.png') }}" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="{{ asset('frontoffice/img/product/product_4.png') }}" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="{{ asset('frontoffice/img/product/product_5.png') }}" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

@endsection
