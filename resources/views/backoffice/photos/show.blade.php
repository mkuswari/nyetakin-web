@extends('layouts.backoffice')

@section('title')
    Detail Data
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $photo->name }}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{ $photo->nim }}</td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td>{{ $faculty->name }}</td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>{{ $major->name }}</td>
                </tr>
                <tr>
                    <td>No. Whatsapp</td>
                    <td>:</td>
                    <td>{{ $photo->whatsapp }}</td>
                </tr>
                <tr>
                    <td>Pas Foto</td>
                    <td>:</td>
                    <td>
                        <img src="{{ asset('uploads/pasfoto/' . $photo->file) }}" width="200">
                    </td>
                </tr>
                <tr>
                    <td>Bukti Pembayaran</td>
                    <td>:</td>
                    <td>
                        <img src="{{ asset('uploads/pasfoto_payments/' . $photo->payment_slip) }}" width="150">
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($photo->status == 0)
                            <span class="badge badge-warning">Perlu Dicetak</span>
                        @else
                            <span class="badge badge-success">Selesai</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('photos.update', [$photo->id]) }}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="status">Status Cetak</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{ $photo->status == 0 ? 'selected' : '' }}>Perlu Dicetak</option>
                        <option value="1" {{ $photo->status == 1 ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="form-action">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    @if ($photo->status == 1)
                        <a href="https://api.whatsapp.com/send?phone={{ $photo->whatsapp }}&text=------------NYETAKIN-----------%0AHai%2C%20{{ $photo->name }}%20%F0%9F%91%8B.%0APas%20Foto%20kamu%20telah%20selesai%20kami%20cetak.%0ATerimakasih%20banyak%20telah%20menggunakan%20jasa%20nyetakin.com"
                            target="_blank" class="btn btn-success">Konfirmasi Pelanggan</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
