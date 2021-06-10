@extends('layouts.frontoffice')

@section('title')
    Checkout Pesanan
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">
            <form class="row contact_form" action="{{ route('checkout') }}" method="post">
                @csrf
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3>Informasi Pengiriman</h3>
                            <div class="col-md-12 form-group">
                                <label for="name">Nama Penerima</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Nama Penerima" value="{{ Auth::user()->name }}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" placeholder="Nomor HP" value="{{ Auth::user()->phone }}" />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">E-mail Penerima</label>
                                <input type="text" class="form-control" id="email"
                                    name="email @error('email') is-invalid @enderror" placeholder="E-mail"
                                    value="{{ Auth::user()->email }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="province_destination">Provinsi</label>
                                <select
                                    class="form-control provinsi-tujuan @error('province_destination') is-invalid @enderror"
                                    name="province_destination" id="province_destination">
                                    <option value="0" selected disabled>--Pilih Provinsi--</option>
                                    @foreach ($provinces as $province => $value)
                                        <option value="{{ $province }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('province_destination')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="city_destination">Kota</label>
                                <select class="form-control kota-tujuan @error('city_destination') is-invalid @enderror"
                                    name="city_destination" id="city_destination" disabled>
                                    {{-- append from ajax --}}
                                </select>
                                @error('city_destination')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="address">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="3"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Alamat Lengkap"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="zip_code">Kode POS</label>
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                    id="zip_code" name="zip_code" placeholder="Kode POS" />
                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="courier">Jasa Pengiriman</label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <select class="form-control jasa-kirim @error('courier') is-invalid @enderror"
                                            name="courier" id="courier">
                                            <option value="0" selected disabled>--Pilih Kurir--</option>
                                            @foreach ($couriers as $courier => $value)
                                                <option value="{{ $courier }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('courier')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="{{ route('cek-ongkir') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary shadow btn-block btn-cek-ongkir"
                                                style="border-radius: 20px;">Cek Biaya Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star d-none" id="ongkir">
                                <label for="services">Jenis Layanan</label>
                                <select class="form-control @error('services')is-invalid @enderror" name="services"
                                    id="services">
                                    {{--  --}}
                                </select>
                                @error('services')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star d-none">
                                <label for="total_billing">Total Tagihan</label>
                                <input type="number" name="total_billing" id="total_billing" value="0">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="order_box">
                                <h2>Orderan Kamu</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Produk
                                            <span>Total</span>
                                        </a>
                                    </li>
                                    @php
                                        $subTotal = 0;
                                        $weight = 0;
                                    @endphp
                                    @foreach ($items as $item)
                                        <li>
                                            <a href="#">{{ $item->product->name }}
                                                <span class="middle">x {{ $item->quantity }}</span>
                                                <span class="last">Rp.
                                                    {{ $item->product->selling_price * $item->quantity }}</span>
                                            </a>
                                        </li>
                                        @php
                                            $subTotal = $subTotal + $item->product->selling_price * $item->quantity;
                                            $totalWeight = $weight + $item->product->weight * $item->quantity;
                                        @endphp
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Subtotal
                                            <span>Rp. <span id="subTotal">{{ $subTotal }}</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Berat
                                            <span>{{ $totalWeight }} Gram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Pengiriman
                                            <span>Rp. <span id="biayaKirim">0</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Total
                                            <span>Rp. <span id="totalTagihan">{{ $subTotal }}</span></span>
                                        </a>
                                    </li>
                                </ul>
                                <hr>

                                <input type="number" name="weight" id="weight" value="{{ $totalWeight }}" class="d-none">

                                <button type="submit" class="btn_3">Lanjutkan Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="province_destination"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/cities/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append(
                                '<option value="0" selected disabled>-- Pilih Kota --</option>'
                            );
                            $('select[name="city_destination"]').removeAttr('disabled');
                            $.each(response, function(key, value) {
                                $('select[name="city_destination"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="city_destination"]').append(
                        '<option value="0" selected disabled>-- Pilih Kota --</option>'
                    );
                }
            });

            // cek ongkir dan jasa kurir dengan ajax
            let isProcessing = false;
            $('.btn-cek-ongkir').click(function(e) {
                e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let city_origin = 23;
                let city_destination = $('select[name="city_destination"]').val();
                let courier = $('select[name="courier"]').val();
                let weight = $('#weight').val();

                if (isProcessing) {
                    return;
                }

                isProcessing = true;
                $.ajax({
                    url: '/cek-ongkir',
                    data: {
                        _token: token,
                        city_origin: city_origin,
                        city_destination: city_destination,
                        courier: courier,
                        weight: weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function(response) {
                        isProcessing = false;
                        if (response) {
                            $('#ongkir').removeClass('d-none');
                            $.each(response[0]['costs'], function(key, value) {
                                $('select[name="services"]').append(
                                    '<option value="' + value.cost[0]
                                    .value + '">' + response[0].code
                                    .toUpperCase() +
                                    ' | ' + value.service + '| Rp.' + value.cost[0]
                                    .value + ' | ' + value.cost[0].etd + ' ' +
                                    'Hari' +
                                    '</option>');
                            });
                        }
                    }
                })

            })

            $('select[name="services"]').on('change', function() {
                let subTotal = parseInt($('#subTotal').text(), 10);
                let totalBilling = $('#totalTagihan').val();
                let cost = parseInt($(this).val(), 10);
                let grandTotal = subTotal + cost;

                $('#biayaKirim').html(cost);
                $('#totalTagihan').html(grandTotal);
                $('#total_billing').val(grandTotal);
            });

        })

    </script>
@endpush
