<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\Institution;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            CategoryProduct::factory()->has(
                Product::factory()
                    ->count(5)->for(Institution::inRandomOrder()->first()), 'products'
            )->create();
        }
    }
}
