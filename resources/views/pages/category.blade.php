@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Katalog Kategori
@endsection

@push('styles')
    <style>
        .category-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
            border-radius: 50px;
        }

    </style>
@endpush

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h2 class="font-weight-bold">Katalog Kategori</h2>
                        <p>Cari Apa yang kamu mau berdasarkan kategori</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_categories mt-5">
        <div class="container">
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-sm-4">
                        <a href="{{ url('category/' . $category->slug) }}" class="text-center">
                            <img src="{{ asset('uploads/categories/' . $category->image) }}" class="category-image mb-3">
                            <h4>{{ $category->name }}</h4>
                        </a>
                    </div>
                @empty
                    <div class="mx-auto mt-5">
                        <img src="{{ asset('img/empty-state.svg') }}" width="550">
                        <h3 class="text-center mt-3">Uppss! Item belum tersedia.</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
