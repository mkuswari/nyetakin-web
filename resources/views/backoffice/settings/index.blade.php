@extends('layouts.backoffice')

@section('title')
    Pengaturan Informasi Aplikasi
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <tr>
                    <td>Nama Kantor</td>
                    <td>:</td>
                    <td>{{ $setting->office_name }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $setting->address }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $setting->office_email }}</td>
                </tr>
                <tr>
                    <td>Nomor Whatsapp</td>
                    <td>:</td>
                    <td>{{ $setting->office_whatsapp }}</td>
                </tr>
            </table>
            <a href="{{ route('setting.update', [$setting->id]) }}" class="btn btn-warning btn-sm text-white"
                style="border-radius: 10px;">Update Informasi</a>
        </div>
    </div>

@endsection
