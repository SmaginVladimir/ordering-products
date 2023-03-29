<?php


namespace App\Services;


use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductService
{


    /**
     * @return ProductResource|AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection|ProductResource
    {
        return ProductResource::collection(Product::paginate(9));
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
