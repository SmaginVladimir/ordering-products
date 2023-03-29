<?php

namespace Tests\Feature;

use App\Models\CategoryInstitution;
use App\Models\CategoryProduct;
use App\Models\Institution;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;

    protected mixed $products;
    protected mixed $product;
    protected mixed $institution;
    protected mixed $categoryProduct;
    protected mixed $categoryInstitution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryInstitution = CategoryInstitution::factory()->create();
        $this->categoryProduct = CategoryProduct::factory()->create();
        $this->institution = Institution::factory()->for(
            $this->categoryInstitution, 'category')->create();
        $this->products = Product::factory()->count(5)->for(
            $this->categoryProduct, 'category'
        )->for(
            $this->institution, 'institution'
        )->create()->map(function ($p) {
            return $p->only(['id', 'image', 'name', 'description', 'price']);
        });
        $this->product = Product::factory()->for(
            $this->categoryProduct, 'category'
        )->for(
            $this->institution, 'institution'
        )->create();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_institutions(): void
    {
        $this->get(route("products.index"))
            ->assertStatus(200)
            ->assertJson(["data" => $this->products->toArray()])
            ->assertJsonStructure(["data" => ["*" => ["id", "name", "description", "price", "category", "institution"]]]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_institution(): void
    {
        $this->get(route("products.show", $this->product->id))
            ->assertStatus(200);
    }
}
