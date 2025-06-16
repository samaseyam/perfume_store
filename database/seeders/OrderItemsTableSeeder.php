<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'perfume_id' => 1,
                'quantity' => 1,
                'price' => 49.99,
            ],
            [
                'order_id' => 2,
                'perfume_id' => 1,
                'quantity' => 1,
                'price' => 49.99,
            ],
            [
                'order_id' => 2,
                'perfume_id' => 2,
                'quantity' => 1,
                'price' => 39.99,
            ],
            [
                'order_id' => 3,
                'perfume_id' => 3,
                'quantity' => 1,
                'price' => 29.99,
            ],
        ]);
    }
}
