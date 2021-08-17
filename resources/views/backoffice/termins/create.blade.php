@extends('layouts.backoffice')

@section('title')
    Tambah Data Periode Cetak Pas Foto
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('termins.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Periode</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama Periode...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start">Tanggal Mulai</label>
                            <input type="date" name="start" id="start"
                                class="form-control @error('start') is-invalid @enderror" placeholder="Tanggal Mulai...">
                            @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="end">Tanggal Berakhir</label>
                            <input type="date" name="end" id="end" class="form-control @error('end') is-invalid @enderror"
                                placeholder="Tanggal Berakhir">
                            @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notes">Keterangan <sup>Opsional</sup></label>
                            <textarea name="notes" id="notes" rows="2" class="form-control"
                                placeholder="Keterangan"></textarea>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
