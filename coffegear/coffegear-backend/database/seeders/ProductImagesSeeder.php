<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['product_id' => 1, 'image_url' => 'https://procoffeegear.com/cdn/shop/files/ProCoffeeGear_r1_770A0093.jpg?v=1758580470'],
            ['product_id' => 2, 'image_url' => 'https://procoffeegear.com/cdn/shop/products/AstoriaPraticAvantXTRASAE_b3909364-db13-4512-8d1b-8eae0caf916a.jpg?v=1759254658'],
            ['product_id' => 3, 'image_url' => 'https://procoffeegear.com/cdn/shop/files/ZoeCompact02_1024x1024.jpg?v=1758581322'],
        ];

        DB::table('product_images')->insert($images);
    }
}
