@extends('layouts.backoffice')

@section('title')
    Kelola Cetak Pas Foto
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <form action="{{ route('photos.index') }}">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select name="termin_id" id="termin_id" class="form-control">
                                            <option value="0" disabled selected>--Pilih Termin--</option>
                                            @foreach ($termins as $termin)
                                                <option value="{{ $termin->id }}">{{ $termin->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="major" id="major" class="form-control">
                                            <option value="0" disabled selected>--Pilih Jurusan--</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->major_id }}">{{ $major->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="nim" id="nim" class="form-control"
                                            placeholder="Filter NIM">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary btn-block">Filter Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Termin</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Pas Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($photos as $photo)
                                <tr>
                                    <td>{{ $photo->termin->name }}</td>
                                    <td>{{ $photo->name }}</td>
                                    <td>{{ $photo->nim }}</td>
                                    <td>{{ $photo->faculty }}</td>
                                    <td>{{ $photo->major }}</td>
                                    <td>
                                        @if ($photo->status == 0)
                                            <span class="badge badge-warning">Perlu Dicetak</span>
                                        @else
                                            <span class="badge badge-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('uploads/pasfoto/' . $photo->file) }}">
                                            <img src="{{ asset('uploads/pasfoto/' . $photo->file) }}" width="120"
                                                class="d-block">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('photos.show', [$photo->id]) }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('photos.show', [$photo->id]) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('photos.destroy', [$photo->id]) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Hapus Pas Foto {{ $photo->name }} dari sistem secara permanent?')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
