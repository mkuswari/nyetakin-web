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
                        <h2 class="font-weight-bold">{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
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
                <div class="mx-auto mt-5">
                    <img src="{{ asset('img/empty-state.svg') }}" width="550">
                    <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                </div>
            @endforelse
        </div>
    </div>

@endsection
