@extends('layouts.backoffice')

@section('title')
    Tambah Produk
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" placeholder="Nama Kategori"
                                            class="form-control @error('name') is-invalid @enderror}"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="" disabled selected>--Pilih Kategori--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail Produk</label>
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
                                    <label for="short_description" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" id="short_description" rows="2"
                                            class="form-control @error('short_description') is-invalid @enderror"
                                            placeholder="Deskripsi produk">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="long_description" class="col-sm-2 col-form-label">Deskripsi Lengkap</label>
                                    <div class="col-sm-10">
                                        <textarea name="long_description" id="long_description" rows="5"
                                            class="form-control"
                                            placeholder="Deskripsi produk">{{ old('long_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="initial_price" class="col-sm-2 col-form-label">Harga Awal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            </div>
                                            <input type="number" name="initial_price" id="initial_price"
                                                class="form-control @error('production-price') is-invalid @enderror"
                                                placeholder="Harga Produksi...">
                                            @error('initial_price')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selling_price" class="col-sm-2 col-form-label">Harga Jual</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            </div>
                                            <input type="number" name="selling_price" id="selling_price"
                                                class="form-control @error('selling-price') is-invalid @enderror"
                                                placeholder="Harga Jual...">
                                            @error('selling-price')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="weight" class="col-sm-2 col-form-label">Berat Produk</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Gram</span>
                                            </div>
                                            <input type="number" name="weight" id="weight"
                                                class="form-control @error('weight') is-invalid @enderror"
                                                placeholder="Berat Produk...">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" selected>Aktif</option>
                                            <option value="inactive">Nonaktif</option>
                                        </select>
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
