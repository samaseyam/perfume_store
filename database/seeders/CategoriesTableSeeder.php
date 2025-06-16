<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Men', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Women', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kids', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Natural', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
