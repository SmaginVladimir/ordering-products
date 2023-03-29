<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstitutionProductAllResource;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;
use App\Services\InstitutionService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InstitutionController extends Controller
{

    protected InstitutionService $institutionService;

    /**
     * InstitutionController constructor.
     * @param InstitutionService $institutionService
     */
    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }


    /**
     * @return InstitutionResource|AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection|InstitutionResource
    {
        return $this->institutionService->all();
    }


    /**
     * Display the specified resource.
     *
     * @param Institution $institution
     * @return InstitutionProductAllResource
     */
    public function show(Institution $institution): InstitutionProductAllResource
    {
        return $this->institutionService->show($institution);
    }

}
