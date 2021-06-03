@extends('layouts.backoffice')

@section('title')
    Tambah Produk
@endsection

@push('styles')
    <style>
        .product-thumbnail {
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
                            <form action="{{ route('products.update', [$product->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" placeholder="Nama Kategori"
                                            class="form-control @error('name') is-invalid @enderror}"
                                            value="{{ old('name') ?? $product->name }}">
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
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
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
                                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}"
                                            class="product-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Ganti Thumbnail</label>
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
                                    <label for="short_description" class="col-sm-2 col-form-label">Deskripsi
                                        Singkat</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" id="short_description" rows="2"
                                            class="form-control @error('short_description') is-invalid @enderror"
                                            placeholder="Deskripsi produk">{{ old('short_description') ?? $product->short_description }}</textarea>
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
                                            placeholder="Deskripsi produk">{{ old('long_description') ?? $product->long_description }}</textarea>
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
                                                placeholder="Harga Produksi..."
                                                value="{{ old('initial_price') ?? $product->initial_price }}">
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
                                                placeholder="Harga Jual..."
                                                value="{{ old('selling_price') ?? $product->selling_price }}">
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
                                                <span class="input-group-text" id="basic-addon1">Kg.</span>
                                            </div>
                                            <input type="number" name="weight" id="weight"
                                                class="form-control @error('weight') is-invalid @enderror"
                                                placeholder="Berat Produk..."
                                                value="{{ old('weight') ?? $product->weight }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stock" class="col-sm-2 col-form-label">Stok Barang</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="stock" id="stock"
                                            class="form-control @error('stock') is-invalid @enderror"
                                            placeholder="Stok Barang..." value="{{ old('stock') ?? $product->stock }}">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>
                                                Active</option>Aktif</option>
                                            <option value="inactive"
                                                {{ $product->status == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
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
