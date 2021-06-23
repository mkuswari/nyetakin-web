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
                                            <h1>Beragam Kebutuhan</h1>
                                            <p>Temukan beragam kebutuhan percetakan dan cetak custom kamu hanya di nyetakin
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/sliders/slide-1.svg') }}" style="width: 500px;">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Jasa Design Custom</h1>
                                            <p>Ingin mencetak sesuatu sesuai dengan selera kamu? kami juga menyediakan jasa
                                                cetak custom loh.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/sliders/slide-2.svg') }}" style="width: 500px;">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Mudah dan Murah</h1>
                                            <p>Rasakan kemudahan dan tarif mudah yang kami berikan, kepuasan anda adalah
                                                prestasi bagi kami.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="{{ asset('frontoffice/img/sliders/slide-3.svg') }}" style="width: 500px;">
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
    <section class="product_list best_seller py-5">
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
                        @forelse ($categories as $category)
                            <a href="{{ url('category/' . $category->slug) }}">
                                <div class="single_product_item">
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                        class="rounded-lg category-thumbnail">
                                    <div class="single_product_text">
                                        <h4>{{ $category->name }}</h4>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="mx-auto mt-5">
                                <img src="{{ asset('img/empty-state.svg') }}" width="550">
                                <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ url('category') }}">Lihat semua kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

    <!-- product_list start-->
    <section class="product_list bg-light py-5">
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
                        @forelse ($products as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item text-center">
                                    <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" alt="">
                                    <div class="single_product_text">
                                        <a href="{{ url('product/' . $product->slug) }}">
                                            <h4>{{ $product->name }}</h4>
                                        </a>
                                        <h3>IDR. {{ number_format($product->selling_price) }}</h3>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="mx-auto mt-5">
                                <img src="{{ asset('img/empty-state.svg') }}" width="550">
                                <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ url('product') }}">Lihat semua produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller py-5">
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
                        @forelse ($designers as $designer)
                            <div class="single_product_item">
                                @if (!$designer->avatar)
                                    <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}"
                                        class="rounded-circle">
                                @else
                                    <img src="{{ asset('uploads/avatars/' . $designer->avatar) }}"
                                        class="rounded-circle">
                                @endif
                                <div class="single_product_text text-center">
                                    <h4 class="font-weight-normal">{{ $designer->name }}</h4>
                                </div>
                            </div>
                        @empty
                            <div class="mx-auto mt-5">
                                <img src="{{ asset('img/empty-state.svg') }}" width="550">
                                <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ url('designer') }}">Lihat semua Desainer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->

@endsection
