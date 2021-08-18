@extends('layouts.frontoffice')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <!--================Single Product Area =================-->
    <div class="product_image_area section_padding">
        <div class="container">
            <div class="row s_product_inner justify-content-between">
                <div class="col-lg-7 col-xl-7">
                    <div class="product_slider_img">
                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" class="rounded-lg">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 align-self-center">
                    <div class="s_product_text">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <h3>{{ $product->name }}</h3>
                        <h2>Rp. {{ number_format($product->selling_price) }}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Kategori</span> : {{ $product->category->name }}</a>
                            </li>
                            <li>
                                <a class="active" href="#">
                                    <span>Status</span> : @if ($product->status == 'active')
                                        <span class="badge badge-success text-white shadow">Tersedia</span>
                                    @else
                                        <span class="badge badge-danger text-white shadow">Tidak tersedia</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <p>
                            {{ $product->short_description }}
                        </p>
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="card_area d-flex justify-content-between align-items-center">
                                <div class="product_count">
                                    <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="text" name="quantity" value="1" min="1"
                                        max="{{ $product->stock }}" readonly>
                                    <span class="number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <button type="submit" class="btn_3">add to cart</button>
                                <a href="#" class="like_us"
                                    onclick="event.preventDefault(); document.getElementById('form-addToWishlist').submit();">
                                    <i class="ti-heart"></i> </a>
                            </div>
                            <div class="chat mt-3 text-center">
                                <p>Ada Pertanyaan / Butuh Cetak Custom?</p>
                                <a href="https://api.whatsapp.com/send?phone={{ $setting->office_whatsapp }}"
                                    class="btn btn-success"><i class="fas fa-phone"></i> Hubungi
                                    admin</a>
                            </div>
                        </form>
                        {{-- add to wishlist form --}}
                        <form action="{{ route('wishlist.add') }}" method="post" id="form-addToWishlist">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Deskripsi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                        aria-selected="false">Ulasan</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                        {{ $product->long_description }}
                    </p>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="review_list">
                                @forelse ($reviews as $review)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}"
                                                    width="50" class="rounded-circle" />
                                            </div>
                                            <div class="media-body">
                                                <h4>{{ $review->user->name }}</h4>
                                                @if ($review->rating == 1)
                                                    <i class="fa fa-star"></i>
                                                @elseif ($review->rating == 2)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($review->rating == 3)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($review->rating == 4)
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <p>
                                            {{ $review->review_contents }}
                                        </p>
                                    </div>
                                @empty
                                    <img src="{{ asset('img/empty-state.svg') }}">
                                    <p class="text-center">Jadilah yang pertama memberi ulasan.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Berikan Ulasan</h4>
                                <form class="row contact_form" action="{{ route('add-review') }}" method="post"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="col-md-12 mb-3">
                                        <span class="star-rating star-5">
                                            <input type="radio" name="rating" value="1"><i></i>
                                            <input type="radio" name="rating" value="2"><i></i>
                                            <input type="radio" name="rating" value="3"><i></i>
                                            <input type="radio" name="rating" value="4"><i></i>
                                            <input type="radio" name="rating" value="5"><i></i>
                                        </span>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="review_contents" rows="4"
                                                placeholder="Pesan Ulasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn_3 btn btn-block">
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!-- product_list part start-->
    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Produk Lainnya</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach ($products as $product)
                            <a href="{{ url('product/' . $product->slug) }}">
                                <div class="single_product_item">
                                    <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" class="rounded-lg">
                                    <div class="single_product_text">
                                        <h4>{{ $product->name }}</h4>
                                        <h3>Rp. {{ number_format($product->selling_price) }}</h3>
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

@endsection
