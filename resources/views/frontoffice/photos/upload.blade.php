@extends('layouts.frontoffice')

@section('title')
    Upload Pas Foto Wisuda Telkom University
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner text-center">
                        <h2 class="font-weight-bold">Form Upload Pas Foto</h2>
                        <p>Pastikan Format foto kamu telah sesuai dengan contoh yang diberikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-5">
                <div class="card shadow border-0" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="text-center">
                            <p>Mohon Lakukan pembayaran sebanyak</p>
                            <h2>Rp. 10.000,-</h2>
                        </div>
                        <img src="{{ asset('img/nyetakin_qrcode.jpeg') }}" class="p-5 my-n4">
                        <h5 class="text-center">nyetakin.com</h5>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <p>Menerima pembayaran melalui : </p>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_gopay.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_ovo.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_linkaja.png') }}" width="100%">
                            </div>
                            <div class="col-sm-3 align-self-center">
                                <img src="{{ asset('img/logo_dana.png') }}" width="100%">
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <p>Dipersembahkan Oleh</p>
                            <img src="{{ asset('frontoffice/img/logo.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card shadow border-0" style="border-radius: 25px;">
                    <div class="card-body">
                        <form action="{{ route('pasfoto.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap...">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                                <input type="text" name="nim" id="nim"
                                    class="form-control @error('nim') is-invalid @enderror"
                                    placeholder="Nomor Induk Mahasiswa...">
                                @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="faculty">Pilih Fakultas</label>
                                <select class="form-control fakultas @error('faculty') is-invalid @enderror" name="faculty"
                                    id="faculty">
                                    <option value="0" selected disabled>--Pilih Fakultas--</option>
                                    @foreach ($faculties as $faculty => $value)
                                        <option value="{{ $faculty }}">{{ $value }} ({{ $faculty }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('faculty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="major">Program Studi</label>
                                <select name="major" id="major"
                                    class="form-control jurusan @error('major') is-invalid @enderror" disabled>
                                    {{-- this data append from ajax --}}
                                </select>
                                @error('major')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Pas Foto</label>
                                <input type="file" name="file" id="file"
                                    class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">Nomor Whatsapp</label>
                                <input type="number" class="form-control @error('whatsapp') is-invalid @enderror"
                                    name="whatsapp" id="whatsapp">
                                <small class="text-muted">Nomor harus diawali dengan 62</small>
                                @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Bukti Pembayaran</label>
                                <input type="file" name="payment_slip" id="payment_slip"
                                    class="form-control @error('payment_slip') is-invalid @enderror">
                                @error('payment_slip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-action">
                                <button type="submit" class="btn_3">Upload Pas Foto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="faculty"]').on('change', function() {
                let facultyId = $(this).val();

                if (facultyId) {
                    $.ajax({
                        url: '/majors/' + facultyId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            $('select[name="major"]').empty();
                            $('select[name="major"]').append(
                                '<option value="0" selected disabled>--Pilih Jurusan--</option>'
                            );
                            $('select[name="major"]').removeAttr('disabled');
                            $.each(response, function(key, value) {
                                $('select[name="major"]').append(
                                    '<option value=" ' + key + ' ">' + value +
                                    '</option>'
                                );
                            });

                        }
                    })
                } else {
                    $('select[name="major"]').append(
                        '<option value="0" selected disabled>--Pilih Jurusan--</option>'
                    )
                }

            })
        })
    </script>
@endpush
