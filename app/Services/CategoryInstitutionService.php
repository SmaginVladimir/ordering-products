<?php


namespace App\Services;


use App\Http\Resources\CategoryInstitutionAllResource;
use App\Http\Resources\CategoryInstitutionResource;
use App\Models\CategoryInstitution;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryInstitutionService
{


    /**
     * @return CategoryInstitutionResource|AnonymousResourceCollection
     */
    public function all(): CategoryInstitutionResource|AnonymousResourceCollection
    {
        return CategoryInstitutionResource::collection(CategoryInstitution::paginate(9));
    }


    /**
     * Display the specified resource.
     *
     * @param CategoryInstitution $categoryInstitution
     * @return CategoryInstitutionAllResource
     */
    public function show(CategoryInstitution $categoryInstitution): CategoryInstitutionAllResource
    {
        return new CategoryInstitutionAllResource($categoryInstitution);
    }


}
