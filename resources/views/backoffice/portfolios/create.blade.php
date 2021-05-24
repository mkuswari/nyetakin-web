@extends('layouts.backoffice')

@section('title')
    Tambah Portfolio
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('portfolios.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" id="title" placeholder="Judul Portfolio"
                                            class="form-control @error('title') is-invalid @enderror}"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="thumbnail" id="thumbnail"
                                            class="form-control @error('thumbnail') is-invalid @enderror">
                                        @error('thumbnail')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="5"
                                            class="form-control"></textarea>
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
