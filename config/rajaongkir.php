<?php

return [
    /*
     * Atur API key yang dibutuhkan untuk mengakses API Raja Ongkir.
     * Dapatkan API key dengan mengakses halaman panel akun Anda.
     */
    'api_key' => env('RAJAONGKIR_API_KEY', '8f4532962784db547179b66cf3e5a8b9'),

    /*
     * Atur tipe akun sesuai paket API yang Anda pilih di Raja Ongkir.
     * Pilihan yang tersedia: ['starter', 'basic', 'pro'].
     */
    'package' => env('RAJAONGKIR_PACKAGE', 'starter'),
];
