<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategories = [
            ['name' => 'Grinders', 'slug' => 'grinders', 'parent_id' => null],
            ['name' => 'Accessories', 'slug' => 'accessories', 'parent_id' => null],
            ['name' => 'Brewers', 'slug' => 'brewers', 'parent_id' => null],
            ['name' => 'Cups & Mugs', 'slug' => 'cups-mugs', 'parent_id' => null],
        ];

        DB::table('categories')->insert($mainCategories);

        $brewerId = DB::table('categories')->where('slug', 'brewers')->value('id');

        $subCategories = [
            ['name' => 'Espresso Machines', 'slug' => 'espresso-machines', 'parent_id' => $brewerId],
            ['name' => 'Cold Brew', 'slug' => 'cold-brew', 'parent_id' => $brewerId],
            ['name' => 'French Press', 'slug' => 'french-press', 'parent_id' => $brewerId],
        ];

        DB::table('categories')->insert($subCategories);
    }
}
