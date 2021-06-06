@extends('layouts.frontoffice')

@section('title')
    Wishlist Saya
@endsection

@push('styles')
    <style>
        .cart-item-thumbnail {
            width: 120px;
            height: 120px;
            object-fit: cover;
            object-position: center;
            border-radius: 25px !important;
        }

    </style>
@endpush

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Wishlist Saya</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Cart Area =================-->
    <section class="cart_area mt-5">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <div id="appendCartData">
                        {{-- load cart items --}}
                        @include('frontoffice.wishlists.items')
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
