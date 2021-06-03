@extends('layouts.backoffice')

@section('title')
    Update Portfolio {{ $portfolio->name }}
@endsection

@push('styles')
    <style>
        .portfolio-thumbnail {
            height: 250px;
            width: 350px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('portfolios.update', [$portfolio->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-label">Nama Portfolio</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" placeholder="Judul"
                                            class="form-control @error('name') is-invalid @enderror}"
                                            value="{{ old('name') ?? $portfolio->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ $portfolio->slug }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset('uploads/portfolios/' . $portfolio->thumbnail) }}"
                                            class="portfolio-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Ganti Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="5"
                                            class="form-control">{{ $portfolio->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-action row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                                        <button type="reset" class="btn btn-warning">Reset Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
