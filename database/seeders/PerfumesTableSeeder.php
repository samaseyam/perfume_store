<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfumesTableSeeder extends Seeder
{
    public function run()
    {
      DB::table('perfumes')->insert([
            [
                'name' => 'Luxury Rose',
                'description' => 'A luxurious rose scent for all occasions.',
                'price' => 49.99,
                'quantity' => 20,
                'image_url' => 'perfumes/luxury_rose.jpg',
                'category_id' => 2,  // Women
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fresh Citrus',
                'description' => 'A refreshing citrus fragrance perfect for men.',
                'price' => 39.99,
                'quantity' => 15,
                'image_url' => 'perfumes/fresh_citrus.jpg',
                'category_id' => 1,  // Men
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kids Fun',
                'description' => 'A playful and light scent for kids.',
                'price' => 29.99,
                'quantity' => 30,
                'image_url' => 'perfumes/kids_fun.jpg',
                'category_id' => 3,  // Kids
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Natural Essence',
                'description' => 'Pure and natural fragrance.',
                'price' => 59.99,
                'quantity' => 10,
                'image_url' => 'perfumes/natural_essence.jpg',
                'category_id' => 4,  // Natural
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
