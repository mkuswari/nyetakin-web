@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Katalog Portfolio
@endsection

@push('styles')
    <style>
        .portfolio-thumbnail {
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
                        <h1 class="font-weight-bold">Katalog Portfolio</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_categories mt-5">
        <div class="container">
            <div class="row">
                @forelse ($portfolios as $portfolio)
                    <div class="col-sm-4 mb-4">
                        <a href="{{ url('portfolio/' . $portfolio->slug) }}" class="text-center">
                            <img src="{{ asset('uploads/portfolios/' . $portfolio->thumbnail) }}"
                                class="portfolio-thumbnail mb-3">
                            <h4>{{ $portfolio->name }}</h4>
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
