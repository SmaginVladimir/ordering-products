<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryProductAllResource;
use App\Http\Resources\CategoryProductResource;
use App\Models\CategoryProduct;
use App\Services\CategoryProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryProductController extends Controller
{

    protected CategoryProductService $categoryProductService;

    /**
     * CategoryProductController constructor.
     * @param CategoryProductService $categoryProductService
     */
    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }


    /**
     * @return CategoryProductResource|AnonymousResourceCollection
     */
    public function index(): CategoryProductResource|AnonymousResourceCollection
    {
        return $this->categoryProductService->all();
    }


    /**
     * @param CategoryProduct $categoryProduct
     * @return CategoryProductAllResource
     */
    public function show(CategoryProduct $categoryProduct): CategoryProductAllResource
    {
        return $this->categoryProductService->show($categoryProduct);
    }



}
