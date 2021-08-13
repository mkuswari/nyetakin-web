@extends('layouts.frontoffice')

@section('title')
    Nyetakin | Jasa Percetakan Online dan Percetakan Custom
@endsection

@push('styles')
    <style>
        .about-image {
            border-radius: 50px;
        }

        .category-link {
            text-align: center;
        }

        .category-thumbnail {
            height: 180px;
            object-fit: cover;
            object-position: center;
            border-radius: 20px;
            margin-bottom: 8px;
        }

        .category-thumbnail:hover {
            opacity: 0.5;
        }

    </style>
@endpush

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
                                            <h2>Memberikan Solusi Desain & Cetak pada Media Secara Online</h2>
                                            <p>Di era new normal ini, nikmati kemudahan dalam membuat desain ataupun
                                                mencetak pada media secara online. Lebih aman, nyaman dan cepat.
                                                Nyetakin.com menyediakan berbagai layanan dan produk dengan harga yang
                                                terjangkau
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
                                            <h2>Jasa Design Custom</h2>
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
                                            <h2>Mudah dan Murah</h2>
                                            <p>Rasakan kemudahan dan tarif murah serta kemudahan pembayaran yang kami
                                                berikan,
                                                kepuasan anda adalah
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

    {{-- section about nyetakin --}}
    <section class="about_nyetakin py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <img src="{{ asset('img/home-slide.gif') }}" class="about-image shadow-sm">
                </div>
                <div class="col-lg-7 px-5 mt-3">
                    <div class="section_title">
                        <p class="text-danger">Tentang Kami</p>
                        <h2 class="py-3">Nyetakin - Platform <br>
                            "All in One Services" <br>
                            Design dan Cetak</h2>
                        <p class="py-3">Kini anda tidak perlu lagi kesulitan sehingga akan memudahkan anda dalam proses
                            design dan cetak mencetak.</p>
                    </div>
                    <div class="row py-3">
                        <div class="col-sm-6">
                            <h3 class="font-weight-bold text-danger">1000+</h3>
                            <h4>File kami cetak</h4>
                            <p>Saat ini sudah sekitar 1000 file yang sudah dan sedang kami cetak</p>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="font-weight-bold text-success">23+</h3>
                            <h4>Mitra Designer & Cetak</h4>
                            <p>Kami bekerjasama dengan banyak designer dan percetakan berbagai media print yang siap
                                melayani kebutuhan anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end of section about nyetakin --}}

    <!-- product_list part start-->
    <section class="product_list best_seller py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h2>Kategori Produk</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @forelse ($categories as $category)
                            <a href="{{ url('category/' . $category->slug) }}" class="category-link">
                                <div class="single_product_item">
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                        class="category-thumbnail">
                                    <div class="category-text">
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
    <section class="product_list py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb-4">
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
                                    <a href="{{ url('product/' . $product->slug) }}">
                                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" alt="">
                                        <div class="single_product_text">
                                            <h4>{{ $product->name }}</h4>
                                            <h3>IDR. {{ number_format($product->selling_price) }}</h3>
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
