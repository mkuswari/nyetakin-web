@extends('layouts.backoffice')

@section('title')
    Edit Data Pesanan
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('orders.update', [$order->id]) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="created_at" class="col-sm-2 form-label">Tanggal Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="created_at" id="created_at" placeholder="Nama Kategori"
                                            class="form-control" value="{{ $order->created_at }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="invoice_number" class="col-sm-2 form-label">Nomor Invoice</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="invoice_number" id="invoice_number"
                                            placeholder="Nomor Invoice" class="form-control"
                                            value="{{ \Str::upper($order->invoice_number) }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 form-label">Status Pemesanan</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Menunggu
                                                Pembayaran</option>
                                            <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Perlu Verifikasi
                                            </option>
                                            <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Sudah Dibayar
                                            </option>
                                            <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Pesanan
                                                Dikirimkan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Status Pesanan</button>
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
