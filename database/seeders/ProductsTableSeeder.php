<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_category_id' => 1, 
                'name' => 'Smartphone',
                'price' => 5000,
                'image' => '',
            ],
            [
                'product_category_id' => 2, 
                'name' => 'Java Starter',
                'price' => 3000,
                'image' => '',
            ],
            [
                'product_category_id' => 3, 
                'name' => 'T-Shirt',
                'price' => 200,
                'image' => '',
            ],
        ]);
    }
}
