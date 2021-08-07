@extends('layouts.backoffice')

@section('title')
    Pengiriman Baru
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('shippings.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <input type="text" name="order_id" value="{{ request()->route('id') }}" class="d-none">
                                    <label for="receipt_number" class="col-sm-2 form-label">Nomor Resi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="receipt_number" id="receipt_number" placeholder="Masukkan Resi Pengiriman..."
                                            class="form-control @error('receipt_number') is-invalid @enderror}"
                                            value="{{ old('receipt_number') }}">
                                        @error('receipt_number')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
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
