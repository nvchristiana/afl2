<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 38; $i++) {

            if ($i <= 14) {
                $category = 1;
                $price = rand(50000, 100000);
            } elseif ($i <= 28) {
                $category = 2;
                $price = rand(70000, 120000);
            } else {
                $category = 3;
                $price = rand(80000, 130000);
            }

            Product::create([
                'name'        => "Artwork #{$i}",
                'price'       => $price,
                'description' => "Karya seni nomor {$i}.",
                'image'       => "{$i}.jpg",
                'category_id' => $category,
            ]);
        }
    }
}
