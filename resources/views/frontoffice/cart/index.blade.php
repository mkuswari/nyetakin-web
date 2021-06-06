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
                    <div id="appendCartData">
                        {{-- load cart items --}}
                        @include('frontoffice.cart.items')
                    </div>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ url('/product') }}">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->

@endsection

@push('scripts')
    {{-- ajax code tu update qty item on cart --}}
    <script>
        // setup ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // update item cart
        $(document).on('click', '.btn-update', function() {
            if ($(this).hasClass('qty-minus')) {
                var quantity = $(this).next().val();
                if (quantity <= 1) {
                    alert('Jumlah item minimal 1');
                    return false;
                } else {
                    newQuantity = parseInt(quantity) - 1;
                }
            }
            if ($(this).hasClass('qty-plus')) {
                var quantity = $(this).prev().val();
                newQuantity = parseInt(quantity) + 1;
            }
            // alert(newQuantity);
            var cart = $(this).data('cart');
            // alert(cart);
            // start ajax proccess
            $.ajax({
                data: {
                    "cart": cart,
                    "qty": newQuantity,
                },
                url: '/cart/update',
                type: 'post',
                success: function(resp) {
                    if (resp.status == false) {
                        alert(resp.message);
                    }
                    $("#appendCartData").html(resp.view);
                },
                error: function() {
                    alert("error");
                }
            });
        });

        // $(document).on('click', '.btn-delete', function() {
        //     var cart = $(this).data('cart');
        //     $.ajax({
        //         data: {
        //             "cart": cart
        //         },
        //         url: "/cart/delete",
        //         type: "post",
        //         success: function(resp) {
        //             $('#appendCartData').html(resp.view);
        //         },
        //         error: function() {
        //             alert("error");
        //         }
        //     })
        // });

    </script>
@endpush
