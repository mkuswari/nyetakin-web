@extends('layouts.frontoffice')

@section('title')
    Keranjang Belanja Saya
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
                        <h1 class="font-weight-bold">Keranjang Saya</h1>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('uploads/products/' . $cart->product->thumbnail) }}"
                                                    class="cart-item-thumbnail" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $cart->product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rp. {{ number_format($cart->product->selling_price) }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                                            <input class="input-number" type="text" value="{{ $cart->quantity }}" min="0"
                                                max="10">
                                            <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rp. {{ number_format($cart->product->selling_price * $cart->quantity) }}</h5>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    {{-- <h5>Rp. {{ $cart-> }}</h5> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ url('/product') }}">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
