<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryInstitutionAllResource;
use App\Http\Resources\CategoryInstitutionResource;
use App\Models\CategoryInstitution;
use App\Services\CategoryInstitutionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryInstitutionController extends Controller
{

    protected CategoryInstitutionService $categoryInstitutionService;

    /**
     * CategoryInstitutionController constructor.
     * @param CategoryInstitutionService $categoryInstitutionService
     */
    public function __construct(CategoryInstitutionService $categoryInstitutionService)
    {
        $this->categoryInstitutionService = $categoryInstitutionService;
    }


    /**
     * @return CategoryInstitutionResource|AnonymousResourceCollection
     */
    public function index(): CategoryInstitutionResource|AnonymousResourceCollection
    {
        return $this->categoryInstitutionService->all();
    }


    /**
     * Display the specified resource.
     *
     * @param CategoryInstitution $categoryInstitution
     * @return CategoryInstitutionAllResource
     */
    public function show(CategoryInstitution $categoryInstitution): CategoryInstitutionAllResource
    {
        return $this->categoryInstitutionService->show($categoryInstitution);
    }


}
