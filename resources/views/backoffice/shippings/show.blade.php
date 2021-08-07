@extends('layouts.backoffice')

@section('title')
    Detail Pengiriman
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <table class="table">
            <tr>
                <td>Nomor Invoice</td>
                <td>:</td>
                <td>{{ \Str::upper($order->invoice_number) }}</td>
            </tr>
            <tr>
                <td>Nama Penerima</td>
                <td>:</td>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Provinsi Tujuan</td>
                <td>:</td>
                <td>{{ $province }}</td>
            </tr>
            <tr>
                <td>Kota/Kabupaten Tujuan</td>
                <td>:</td>
                <td>{{ $city }}</td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <td>Kode POS</td>
                <td>:</td>
                <td>{{ $order->zip_code }}</td>
            </tr>
            <tr>
                <td>Kurir Pengiriman</td>
                <td>:</td>
                <td>{{ \Str::upper($order->courier) }}</td>
            </tr>
            <tr>
                <td>Resi Pengiriman</td>
                <td>:</td>
                <td>{{ \Str::upper($shipping->receipt_number) }}</td>
            </tr>
        </table>
        <a href="{{ route("shippings.index") }}" class="btn btn-warning px-5 text-white" style="border-radius: 10px;">Kembali</a>
    </div>
</div>
@endsection
