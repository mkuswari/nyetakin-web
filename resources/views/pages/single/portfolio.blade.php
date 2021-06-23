@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Detail Portfolio
@endsection

@push('styles')
    <style>
        .portfolio-thumbnail {
            width: 100%;
            height: 450px;
            object-fit: cover;
            object-position: center;
            border-radius: 50px;
        }

        .designer-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
        }

    </style>
@endpush

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">{{ $portfolio->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_categories mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('uploads/portfolios/' . $portfolio->thumbnail) }}" class="portfolio-thumbnail">
                </div>
                <div class="col-sm-6 p-5">
                    <table class="table">
                        <tr>
                            <td>Nama Portfolio</td>
                            <td>:</td>
                            <td>{{ $portfolio->name }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>
                                @if ($portfolio->description)
                                    {{ $portfolio->description }}
                                @else
                                    Tidak ada deskripsi
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Desainer</td>
                            <td>:</td>
                            <td>
                                @if ($portfolio->user->avatar)
                                    <img src="{{ asset('uploads/avatars/' . $portfolio->user->avatar) }}"
                                        class="designer-thumbnail">
                                @else
                                    <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}"
                                        class="designer-thumbnail">
                                @endif
                                {{ $portfolio->user->name }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
