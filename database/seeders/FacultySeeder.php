<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            [
                'faculty_id' => 'FIT',
                'name' => 'Fakultas Ilmu Terapan',
            ],
            [
                'faculty_id' => 'FKB',
                'name' => 'Fakultas Komunikasi dan Bisnis',
            ],
            [
                'faculty_id' => 'FEB',
                'name' => 'Fakultas Ekonomi dan Bisnis',
            ],
            [
                'faculty_id' => 'FTE',
                'name' => 'Fakultas Teknik Elektro',
            ],
            [
                'faculty_id' => 'FIF',
                'name' => 'Fakultas Informatika'
            ],
            [
                'faculty_id' => 'FRI',
                'name' => 'Fakultas Rekayasa Industri'
            ],
            [
                'faculty_id' => 'FIK',
                'name' => 'Fakultas Industri Kreatif'
            ]
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
