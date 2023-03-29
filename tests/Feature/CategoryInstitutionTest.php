<?php

namespace Tests\Feature;

use App\Models\CategoryInstitution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryInstitutionTest extends TestCase
{
    use RefreshDatabase;


    protected mixed $categoryInstitutions;
    protected mixed $categoryInstitution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryInstitutions = CategoryInstitution::factory()->count(5)->create()->map(function ($с) {
            return $с->only(['id', 'name', 'description']);
        });
        $this->categoryInstitution = CategoryInstitution::factory()->create();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_category_institutions(): void
    {
        $this->get(route("category-institutions.index"))
            ->assertStatus(200)
            ->assertJson(["data" => $this->categoryInstitutions->toArray()])
            ->assertJsonStructure(["data" => ["*" => ["id", "name", "description"]]]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_category_institutions(): void
    {
        $this->get(route("category-institutions.show", $this->categoryInstitution->id))
            ->assertStatus(200);
    }
}

