<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "category_id" => 1,
                "name" => "Box Bolu Gulung Spesial",
                "slug" => \Str::slug("Box Bolu Gulung Spesial"),
                "thumbnail" => "box-bolu-gulung-spesial.jpg",
                "short_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta.",
                "long_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta. Maecenas ex ante, tristique ac diam quis, feugiat faucibus turpis. Vestibulum quam est, sagittis quis mauris at, varius semper augue. Integer pharetra, velit et pretium viverra, est dolor faucibus ex, at mollis quam justo at libero. Nulla congue porttitor ante et convallis. Morbi ut ex libero. Nullam ultricies accumsan augue ut lacinia. Etiam eu neque vitae nisi tincidunt tempor. Duis magna nibh, fermentum eu nisi et, dignissim interdum massa. Proin vel mauris quis risus vehicula feugiat eget nec orci. Cras placerat, velit quis rhoncus facilisis, nisl massa fermentum mi, vel mollis nisi urna eu ipsum.",
                "initial_price" => 2500,
                "selling_price" => 3800,
                "weight" => 120,
                "stock" => 99,
                "status" => "active",
            ],
            [
                "category_id" => 1,
                "name" => "Dus Martabak",
                "slug" => \Str::slug("Dus Martabak"),
                "thumbnail" => "dus-martabak.jpg",
                "short_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta.",
                "long_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta. Maecenas ex ante, tristique ac diam quis, feugiat faucibus turpis. Vestibulum quam est, sagittis quis mauris at, varius semper augue. Integer pharetra, velit et pretium viverra, est dolor faucibus ex, at mollis quam justo at libero. Nulla congue porttitor ante et convallis. Morbi ut ex libero. Nullam ultricies accumsan augue ut lacinia. Etiam eu neque vitae nisi tincidunt tempor. Duis magna nibh, fermentum eu nisi et, dignissim interdum massa. Proin vel mauris quis risus vehicula feugiat eget nec orci. Cras placerat, velit quis rhoncus facilisis, nisl massa fermentum mi, vel mollis nisi urna eu ipsum.",
                "initial_price" => 3500,
                "selling_price" => 5800,
                "weight" => 180,
                "stock" => 80,
                "status" => "active",
            ],
            [
                "category_id" => 1,
                "name" => "Kemasan Dus Brownis",
                "slug" => \Str::slug("Kemasan Dus Brownis"),
                "thumbnail" => "kemasan-dus-brownis.jpg",
                "short_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta.",
                "long_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta. Maecenas ex ante, tristique ac diam quis, feugiat faucibus turpis. Vestibulum quam est, sagittis quis mauris at, varius semper augue. Integer pharetra, velit et pretium viverra, est dolor faucibus ex, at mollis quam justo at libero. Nulla congue porttitor ante et convallis. Morbi ut ex libero. Nullam ultricies accumsan augue ut lacinia. Etiam eu neque vitae nisi tincidunt tempor. Duis magna nibh, fermentum eu nisi et, dignissim interdum massa. Proin vel mauris quis risus vehicula feugiat eget nec orci. Cras placerat, velit quis rhoncus facilisis, nisl massa fermentum mi, vel mollis nisi urna eu ipsum.",
                "initial_price" => 4500,
                "selling_price" => 8800,
                "weight" => 180,
                "stock" => 28,
                "status" => "active",
            ],
            [
                "category_id" => 1,
                "name" => "Kotak Nasi Premium",
                "slug" => \Str::slug("Kotak Nasi Premium"),
                "thumbnail" => "kotak-nasi-premium.jpg",
                "short_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta.",
                "long_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum posuere mi, id porttitor felis porta posuere. Maecenas mollis nisi vel est efficitur porta. Maecenas ex ante, tristique ac diam quis, feugiat faucibus turpis. Vestibulum quam est, sagittis quis mauris at, varius semper augue. Integer pharetra, velit et pretium viverra, est dolor faucibus ex, at mollis quam justo at libero. Nulla congue porttitor ante et convallis. Morbi ut ex libero. Nullam ultricies accumsan augue ut lacinia. Etiam eu neque vitae nisi tincidunt tempor. Duis magna nibh, fermentum eu nisi et, dignissim interdum massa. Proin vel mauris quis risus vehicula feugiat eget nec orci. Cras placerat, velit quis rhoncus facilisis, nisl massa fermentum mi, vel mollis nisi urna eu ipsum.",
                "initial_price" => 2500,
                "selling_price" => 3800,
                "weight" => 120,
                "stock" => 99,
                "status" => "active",
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
