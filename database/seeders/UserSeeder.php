<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Site Admin',
                'email' => 'admin@example.test',
                'email_verified_at' => now(),
                'password' => bcrypt('admin'),
                'phone' => '6281939448487',
                'role' => 'admin',
            ],
            [
                'name' => 'Site Designer',
                'email' => 'designer@example.test',
                'email_verified_at' => now(),
                'password' => bcrypt('designer'),
                'phone' => '6281939448487',
                'role' => 'designer',
            ],
            [
                'name' => 'Site Customer',
                'email' => 'customer@example.test',
                'email_verified_at' => now(),
                'password' => bcrypt('customer'),
                'phone' => '6281939448487',
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
