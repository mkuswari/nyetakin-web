<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'jne',
                'name' => 'JNE',
            ],
            [
                'code' => 'pos',
                'name' => 'POS',
            ],
            [
                'code' => 'tiki',
                'name' => 'TIKI',
            ],
        ];
        Courier::insert($data);
    }
}
