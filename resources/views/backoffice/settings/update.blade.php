@extends('layouts.backoffice')

@section('title')
    Pengaturan Informasi Aplikasi
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('setting.update', [$setting->id]) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="office_name">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('office_name') is-invalid @enderror"
                        placeholder="Nama Perusahaan..." name="office_name" id="office_name"
                        value="{{ $setting->office_name }}">
                    @error('office_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Alamat Perusahaan</label>
                    <textarea name="address" id="address" rows="2"
                        class="form-control @error('address') is-invalid` @enderror">{{ $setting->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="office_email">Email Perusahaan</label>
                    <input type="text" class="form-control @error('office_email') is-invalid @enderror" name="office_email"
                        id="office_email" placeholder="Email Perusahaan..." value={{ $setting->office_email }}>
                    @error('office_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="office_whatsapp">Whatsapp Perusahaan</label>
                    <input type="number" class="form-control @error('office_whatsapp') is-invalid @enderror"
                        placeholder="Whatsapp Perusahaan..." name="office_whatsapp" id="office_whatsapp"
                        value={{ $setting->office_whatsapp }}>
                    @error('office_whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small class="text-muted">Nomor Harus diawali dengan angka 62</small>
                </div>
                <div class="form-action mt-2">
                    <button type="submit" class="btn btn-primary">Update Detail Aplikasi</button>
                </div>
            </form>
        </div>
    </div>

@endsection
