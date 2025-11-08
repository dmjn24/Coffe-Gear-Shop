<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Hario V60',
                'slug' => 'hario-v60',
                'description' => 'Classic pour-over coffee brewer.',
                'price' => 25.00,
                'stock' => 50,
                'discount' => 10,
                'category_id' => DB::table('categories')->where('slug', 'brewers')->value('id'),
                'brand_id' => DB::table('brands')->where('slug', 'hario')->value('id'),
            ],
            [
                'name' => 'DeLonghi Espresso Machine',
                'slug' => 'delonghi-espresso-machine',
                'description' => 'Compact espresso machine for home use.',
                'price' => 350.00,
                'stock' => 15,
                'discount' => 5,
                'category_id' => DB::table('categories')->where('slug', 'espresso-machines')->value('id'),
                'brand_id' => DB::table('brands')->where('slug', 'delonghi')->value('id'),
            ],
            [
                'name' => 'Fellow Stagg Grinder',
                'slug' => 'fellow-stagg-grinder',
                'description' => 'Premium burr grinder with precision.',
                'price' => 200.00,
                'stock' => 20,
                'discount' => null,
                'category_id' => DB::table('categories')->where('slug', 'grinders')->value('id'),
                'brand_id' => DB::table('brands')->where('slug', 'fellow')->value('id'),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
