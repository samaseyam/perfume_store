<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1, // maryam
                'total_price' => 49.99,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Sarah
                'total_price' => 89.98,
                'status' => 'shipped',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Marah
                'total_price' => 29.99,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
