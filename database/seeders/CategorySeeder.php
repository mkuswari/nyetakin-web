<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "Kemasan Makanan",
                "slug" => \Str::slug("Kemasan Makanan"),
                "image" => "kemasan-makanan.jpg",
            ],
            [
                "name" => "Akrilik Print",
                "slug" => \Str::slug("Akrilik Print"),
                "image" => "akrilik-print.jpg",
            ],
            [
                "name" => "Angpao Lebaran",
                "slug" => \Str::slug("Angpao Lebaran"),
                "image" => "angpao-lebaran.jpg",
            ],
            [
                "name" => "Stiker",
                "slug" => \Str::slug("Stiker"),
                "image" => "stiker.jpg",
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
