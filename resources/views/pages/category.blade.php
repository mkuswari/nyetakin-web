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
                        <h1 class="font-weight-bold">Katalog Kategori</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_categories mt-5">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-sm-4">
                        <a href="{{ url('category/' . $category->slug) }}" class="text-center">
                            <img src="{{ asset('uploads/categories/' . $category->image) }}"
                                class="category-image shadow mb-3">
                            <h4>{{ $category->name }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
