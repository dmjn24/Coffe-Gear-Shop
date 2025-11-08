<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Hario', 'slug' => 'hario'],
            ['name' => 'DeLonghi', 'slug' => 'delonghi'],
            ['name' => 'Fellow', 'slug' => 'fellow'],
            ['name' => 'Bodum', 'slug' => 'bodum'],
        ];

        DB::table('brands')->insert($brands);
    }
}
