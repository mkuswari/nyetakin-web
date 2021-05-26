@extends('layouts.frontoffice')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner">
                        <h1 class="font-weight-bold">{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
