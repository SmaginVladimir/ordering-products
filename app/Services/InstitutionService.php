<?php


namespace App\Services;


use App\Http\Resources\InstitutionProductAllResource;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InstitutionService
{


    /**
     * @return InstitutionResource|AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection|InstitutionResource
    {
        return InstitutionResource::collection(Institution::paginate(9));
    }


    /**
     * Display the specified resource.
     *
     * @param Institution $institution
     * @return InstitutionProductAllResource
     */
    public function show(Institution $institution): InstitutionProductAllResource
    {
        return new InstitutionProductAllResource($institution);
    }
}
