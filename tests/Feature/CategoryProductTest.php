<?php

namespace Tests\Feature;

use App\Models\CategoryProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryProductTest extends TestCase
{

    use RefreshDatabase;

    protected mixed $categoryProducts;
    protected mixed $categoryProduct;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryProducts = CategoryProduct::factory()->count(5)->create()->map(function ($с) {
            return $с->only(['id', 'name', 'description',"image"]);
        });
        $this->categoryProduct = CategoryProduct::factory()->create();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_category_products(): void
    {
        $this->get(route("category-products.index"))
            ->assertStatus(200)
            ->assertJson(["data" => $this->categoryProducts->toArray()])
            ->assertJsonStructure(["data" => ["*" => ["id", "name", "description","image"]]]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_category_products(): void
    {
        $this->get(route("category-products.show", $this->categoryProduct->id))
            ->assertStatus(200);
    }
}
