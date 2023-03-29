<?php

namespace Tests\Feature;

use App\Models\CategoryInstitution;
use App\Models\Institution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstitutionTest extends TestCase
{
    use RefreshDatabase;

    protected mixed $institutions;
    protected mixed $institution;
    protected mixed $categoryInstitution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryInstitution = CategoryInstitution::factory()->create();
        $this->institutions = Institution::factory()->count(5)->for(
            $this->categoryInstitution, 'category'
        )->create()->map(function ($i) {
            return $i->only(['id', 'image', 'name', 'description', 'address']);
        });
        $this->institution = Institution::factory()->for(
            $this->categoryInstitution, 'category'
        )->create();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_institutions(): void
    {
        $this->get(route("institutions.index"))
            ->assertStatus(200)
            ->assertJson(["data" => $this->institutions->toArray()])
            ->assertJsonStructure(["data" => ["*" => ["id", "name", 'image', "description", "address", "category"]]]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_institution(): void
    {
        $this->get(route("institutions.show", $this->institution->id))
            ->assertStatus(200);
    }
}
