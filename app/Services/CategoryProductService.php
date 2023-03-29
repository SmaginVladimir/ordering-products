<?php


namespace App\Services;


use App\Http\Resources\CategoryProductAllResource;
use App\Http\Resources\CategoryProductResource;
use App\Models\CategoryProduct;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryProductService
{

    /**
     * @return CategoryProductResource|AnonymousResourceCollection
     */
    public function all(): CategoryProductResource|AnonymousResourceCollection
    {
        return CategoryProductResource::collection(CategoryProduct::paginate(9));
    }


    /**
     * Display the specified resource.
     *
     * @param CategoryProduct $categoryProduct
     * @return CategoryProductAllResource
     */
    public function show(CategoryProduct $categoryProduct): CategoryProductAllResource
    {
        return new CategoryProductAllResource($categoryProduct);
    }


}
