<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            [
                'faculty_id' => 'FIT',
                'major_id' => 'SI',
                'name' => 'D3 Sistem Informasi'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'SIA',
                'name' => 'D3 Sistem Informasi Akuntansi'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'TK',
                'name' => 'D3 Teknik Komputer'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'RPLA',
                'name' => 'D3 Rekayasa Perangkat Lunak Aplikasi'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'PH',
                'name' => 'D3 Perhotelan'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'TT',
                'name' => 'D3 Teknik Telekomunikasi',
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'MP',
                'name' => 'D3 Manajemen Pemasaran'
            ],
            [
                'faculty_id' => 'FIT',
                'major_id' => 'TRM',
                'name' => 'D4 Teknologi Rekayasa Multimedia'
            ],
            [
                'faculty_id' => 'FKB',
                'major_id' => 'AdBis',
                'name' => 'S1 Administrasi dan Bisnis',
            ],
            [
                'faculty_id' => 'FKB',
                'major_id' => 'AdBisINT',
                'name' => 'S1 Administrasi dan Bisnis Internasional'
            ],
            [
                'faculty_id' => 'FKB',
                'major_id' => 'Ikom',
                'name' => 'S1 Ilmu Komunikasi'
            ],
            [
                'faculty_id' => 'FKB',
                'major_id' => 'IkomINT',
                'name' => 'S1 Ilmu Komunikasi Internasional'
            ],
            [
                'faculty_id' => 'FKB',
                'major_id' => 'DPR',
                'name' => 'S1 Digital Public Relation'
            ],
            [
                'faculty_id' => 'FEB',
                'major_id' => 'Aktns',
                'name' => 'S1 Akuntansi',
            ],
            [
                'faculty_id' => 'FEB',
                'major_id' => 'MBTI',
                'name' => 'S1 Manajemen Bisnis Telekomunikasi dan Informatika'
            ],
            [
                'faculty_id' => 'FEB',
                'major_id' => 'ICT',
                'name' => 'S1 Manajemen Bisnis Telekomunikasi dan Informatika Internasional'
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'TT',
                'name' => 'S1 Teknik Telekomunikasi',
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'TTINT',
                'name' => 'S1 Teknik Telekomunikasi Internasional',
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'EL',
                'name' => 'S1 Elektro'
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'ELINT',
                'name' => 'S1 Elektro Internasional'
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'TF',
                'name' => 'S1 Teknik Fisika',
            ],
            [
                'faculty_id' => 'FTE',
                'major_id' => 'Tk',
                'name' => 'S1 Teknik Komunikasi'
            ],
            [
                'faculty_id' => 'FIF',
                'major_id' => 'IF',
                'name' => 'S1 Teknik Informatika'
            ],
            [
                'faculty_id' => 'FIF',
                'major_id' => 'IFINT',
                'name' => 'S1 Teknik Informatika Internasional'
            ],
            [
                'faculty_id' => 'FIF',
                'major_id' => 'TIF',
                'name' => 'S1 Teknologi Informasi',
            ],
            [
                'faculty_id' => 'FIF',
                'major_id' => 'RPL',
                'name' => 'S1 Rekayasa Perangkat Lunak'
            ],
            [
                'faculty_id' => 'FRI',
                'major_id' => 'TI',
                'name' => 'S1 Teknik Industri'
            ],
            [
                'faculty_id' => 'FRI',
                'major_id' => 'FRIINT',
                'name' => 'S1 Teknik Industri Internasional'
            ],
            [
                'faculty_id' => 'FRI',
                'major_id' => 'SI',
                'name' => 'S1 Sistem Informasi'
            ],
            [
                'faculty_id' => 'FRI',
                'major_id' => 'SIINT',
                'name' => 'S1 Sistem Informasi Internasional'
            ],
            [
                'faculty_id' => 'FRI',
                'major_id' => 'TL',
                'name' => 'S1 Teknik Logistik'
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'DKV',
                'name' => 'S1 Desain Komunikasi Visual'
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'DKVINT',
                'name' => 'S1 Desain Komunikasi Visual Internasional'
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'DI',
                'name' => 'S1 Desain Interior',
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'DP',
                'name' => 'S1 Desain Produk',
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'KTM',
                'name' => 'S1 Kriya Tekstil dan Mode'
            ],
            [
                'faculty_id' => 'FIK',
                'major_id' => 'SR',
                'name' => 'S1 Seni Rupa'
            ]
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
