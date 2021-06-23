@extends('layouts.frontoffice')

@section('title')
    Nyetakin - Desainer Kami
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">Desainer Kami</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_categories mt-5">
        <div class="container">
            <div class="row">
                @forelse ($designers as $designer)
                    <div class="col-sm-3 mb-4">
                        <a href="#" class="text-center">
                            @if ($designer->avatar)
                                <img src="{{ asset('uploads/avatars/' . $designer->avatar) }}"
                                    class="designer-avatar rounded-circle shadow-sm mb-3">
                            @else
                                <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}"
                                    class="designer-avatar rounded-circle shadow-sm mb-3">
                            @endif
                            <h4>{{ $designer->name }}</h4>
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
