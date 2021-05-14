@extends('layouts.backoffice')

@section('title')
    Kelola Users
@endsection

@push('styles')
    <link href="{{ asset('backoffice/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">
    <style>
        .avatar-thumbnail-small {
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th width="65">Foto Profil</th>
                                    <th width="200">Nama</th>
                                    <th width="200">Email</th>
                                    <th width="200">Nomor HP</th>
                                    <th width="150">Hak Akses</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!$user->avatar)
                                                <img src="{{ asset('uploads/avatars/default/placeholder.jpg') }}"
                                                    class="avatar-thumbnail-small">
                                            @else
                                                <img src="{{ asset('uploads/avatars/' . $user->avatar) }}"
                                                    class="avatar-thumbnail-small">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->role == 'admin')
                                                <span class="badge badge-success">Admin</span>
                                            @elseif ($user->role == 'designer')
                                                <span class="badge badge-info">Designer</span>
                                            @else
                                                <span class="badge badge-warning">Customer</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', [$user->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- delete action --}}
                                            <form action="{{ route('users.destroy', [$user->id]) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Hapus User {{ $user->name }} dari sistem secara permanent?')">
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
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backoffice/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
