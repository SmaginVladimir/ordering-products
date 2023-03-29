<?php

use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\CategoryInstitutionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\InstitutionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("category-products", CategoryProductController::class)->only(['index','show']);
Route::apiResource("category-institutions", CategoryInstitutionController::class)->only(['index','show']);
Route::apiResource("products", ProductController::class)->only(['index','show']);
Route::apiResource("institutions", InstitutionController::class)->only(['index','show']);
