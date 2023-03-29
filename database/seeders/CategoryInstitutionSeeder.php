<?php

namespace Database\Seeders;

use App\Models\CategoryInstitution;
use App\Models\Institution;
use Illuminate\Database\Seeder;

class CategoryInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryInstitution::factory()->count(5)->has(
            Institution::factory()
                ->count(5), 'institutions'
        )->create();
    }
}
