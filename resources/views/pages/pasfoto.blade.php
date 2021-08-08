@extends('layouts.frontoffice')

@section('title')
    Layanan Cetak Pas Foto Telkom University
@endsection

@section('content')
    <section class="home padding_top" style="background-color: #EBFDFF; padding-bottom: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="tracking_box_inner text-center">
                        <h1 class="font-weight-bold">Cetak Pas Foto Telkom University</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="text-center">
                <div class="panduan py-3">
                    <p>Gaess, untuk kalian Mahasiswa <b>Telkom University</b> yang akan mencetak foto ijazah <br>
                        Silahkan mengikuti petunjuk dibawah ini, atau download panduan melalui link berikut.</p>
                    <a href="{{ asset('docs/prosedur_cetak_foto.pdf') }}" target="_blank"
                        class="btn btn-primary shadow mt-2" style="border-radius: 50px;">Unduh Panduan</a>
                </div>
                <div class="contact py-3">
                    <p>Jika ada pertanyaan silahkan hubungi kami melalui link dibawah</p>
                    <a href="" class="btn btn-success" style="border-radius: 50px;" }><i class="fas fa-phone"></i> Hubungi
                        via Whatsapp</a>
                </div>
            </div>
            <img src="{{ asset('img/prosedur_cetakfoto.gif') }}" class="mt-4" style="border-radius: 25px;"
                class="shadow-lg">

            <div class="row justify-content-center mt-5">
                <div class="col-sm-6">
                    <h4 class="text-uppercase text-center">Ketentuan Foto Ijazah Calon Wisudawan / Wisudawati <br>
                        <b>Universitas Telkom</b>
                    </h4>
                    <ol>
                        <li>Foto Hitam Putih dengan Background Putih</li>
                        <li>Foto Berukuran 4x6</li>
                        <li>Foto Memiliki kualitas baik yang siap cetak</li>
                        <li>Muka terlihat dengan jelas</li>
                        <li>Wanita : Menggunakan pakaian baju Nasional berwarna terang</li>
                        <li>Pria : Menggunakan pakaian jas formal terang dan berdasi</li>
                    </ol>
                </div>
                <div class="col-sm-6 text-center">
                    <h4 class="text-uppercase">Contoh Pas Foto sesuai ketentuan</h4>
                    <img src="{{ asset('img/contoh-pasfoto.png') }}" width="200">
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-sm-6 text-center">
                    <a href="{{ url('/cetak-pasfoto/form') }}" class="btn btn-primary shadow btn-block"
                        style="border-radius: 50px;">Saya mengerti, dan
                        lanjutkan</a>
                </div>
            </div>

        </div>
    </section>

@endsection
