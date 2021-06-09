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
            <form class="row contact_form" action="{{ route('cek-ongkir') }}" method="post">
                @csrf
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3>Informasi Pengiriman</h3>
                            <div class="col-md-12 form-group">
                                <label for="name">Nama Penerima</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Penerima"
                                    value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor HP"
                                    value="{{ Auth::user()->phone }}" />
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">E-mail Penerima</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail"
                                    value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="province_destination">Provinsi</label>
                                <select class="form-control provinsi-tujuan" name="province_destination"
                                    id="province_destination">
                                    <option value="0" selected disabled>--Pilih Provinsi--</option>
                                    @foreach ($provinces as $province => $value)
                                        <option value="{{ $province }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="city_destination">Kota</label>
                                <select class="form-control kota-tujuan" name="city_destination" id="city_destination">
                                    {{-- append from ajax --}}
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="courier">Jasa Pengiriman</label>
                                <select class="form-control" name="courier" id="courier">
                                    <option value="0" selected disabled>--Pilih Kurir--</option>
                                    @foreach ($couriers as $courier => $value)
                                        <option value="{{ $courier }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star d-none">
                                <label for="courier">Jenis Layanan</label>
                                <select class="country_select">
                                    <option value="0" selected disabled>--Pilih Kurir--</option>
                                    @foreach ($couriers as $courier => $value)
                                        <option value="{{ $courier }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="address">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="3" class="form-control"
                                    placeholder="Alamat Lengkap"></textarea>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="zip_code">Kode POS</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                    placeholder="Kode POS" />
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
                                                    {{ number_format($item->product->selling_price * $item->quantity) }}</span>
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
                                            <span>Rp. {{ number_format($subTotal) }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Berat
                                            <span>{{ $totalWeight }} Gram</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Pengiriman
                                            <span>Rp. 25,000</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Total
                                            <span>Rp. {{ number_format($subTotal + 25000) }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr>

                                <input type="number" name="weight" id="weight" value="{{ $totalWeight }}" class="d-none">

                                <button type="submit" class="btn_3">Lanjutkan Pesanan</button>
                                {{-- <a class="btn_3" href="#">Proses Pesanan</a> --}}
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
            })

            // //ajax check ongkir
            // let isProcessing = false;
            // $('.btn-check').click(function(e) {
            //     e.preventDefault();

            //     let token = $("meta[name='csrf-token']").attr("content");
            //     let city_origin = 23;
            //     let city_destination = $('select[name=city_destination]').val();
            //     let courier = $('select[name=courier]').val();
            //     let weight = $('#weight').val();

            //     if (isProcessing) {
            //         return;
            //     }

            //     isProcessing = true;
            //     jQuery.ajax({
            //         url: "/cek-ongkir",
            //         data: {
            //             _token: token,
            //             city_origin: city_origin,
            //             city_destination: city_destination,
            //             courier: courier,
            //             weight: weight,
            //         },
            //         dataType: "JSON",
            //         type: "POST",
            //         success: function(response) {
            //             isProcessing = false;
            //             if (response) {
            //                 $('#ongkir').empty();
            //                 $('.ongkir').addClass('d-block');
            //                 $.each(response[0]['costs'], function(key, value) {
            //                     $('#ongkir').append('<li class="list-group-item">' +
            //                         response[0].code.toUpperCase() + ' : <strong>' +
            //                         value.service + '</strong> - Rp. ' + value.cost[
            //                             0].value + ' (' + value.cost[0].etd +
            //                         ' hari)</li>')
            //                 });

            //             }
            //         }
            //     });

            // });

        })

    </script>
@endpush
